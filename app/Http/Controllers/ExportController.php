<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    public function exportPDF()
    {
        ini_set('memory_limit', '1024M');
        set_time_limit(1200);

        $pdf = new Dompdf();

        $html = '';

        Company::chunk(100, function ($companies) use (&$html) {
            $html .= view('pdf.export', compact('companies'))->render();
        });

        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->stream('companies.pdf');
    }

    public function exportCsv()
    {
        $companies = Company::all();

        $filename = 'company.csv';
        $handle = fopen('php://output', 'w');

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        fputcsv($handle, ['ID', 'Name', 'Email', 'Phone No', 'Address', 'City', 'Country']);

        foreach ($companies as $company) {
            fputcsv($handle, [
                $company->id,
                $company->c_name,
                $company->c_email,
                $company->c_phone_no,
                $company->c_address,
                $company->city,
                $company->country,
            ]);
        }

        fclose($handle);
        exit();
    }

    public function exportExcel()
    {
        $companies = Company::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ['ID', 'Name', 'Email', 'Phone No', 'Address', 'City', 'Country'];
        $sheet->fromArray($headers, null, 'A1');

        $row = 2;
        foreach ($companies as $company) {
            $sheet->setCellValue('A' . $row, $company->id);
            $sheet->setCellValue('B' . $row, $company->c_name);
            $sheet->setCellValue('C' . $row, $company->c_email);
            $sheet->setCellValue('D' . $row, $company->c_phone_no);
            $sheet->setCellValue('E' . $row, $company->c_address);
            $sheet->setCellValue('F' . $row, $company->city);
            $sheet->setCellValue('G' . $row, $company->country);
            $row++;
        }

        foreach (range('A', 'G') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'companies.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }

    public function print()
    {
        $companies = Company::all();

        return view('print.export', compact('companies'));
    }
}
