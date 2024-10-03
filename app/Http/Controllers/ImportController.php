<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CompaniesImport;
use App\Models\company;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ImportController extends Controller
{
    public function showImportForm()
    {
        return view('import');
    }

    public function importCSV(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('csv_file');

        Excel::import(new CompaniesImport, $file);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    // public function importCSV(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'csv_file' => 'required|mimes:csv,txt|max:2048',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $file = $request->file('csv_file');

    //     if (($handle = fopen($file->getRealPath(), 'r')) !== false) {
    //         fgetcsv($handle);

    //         while (($data = fgetcsv($handle, 1000, ',')) !== false) {
    //             company::create([
    //                 'id'=> $data[0],
    //                 'c_name' => $data[1],
    //                 'c_email' => $data[2],
    //                 'c_phone_no' => $data[3],
    //                 'c_address' => $data[4],
    //                 'city' => $data[5],
    //                 'country' => $data[6],
    //             ]);
    //         }
    //         fclose($handle);
    //     }

    //     return redirect()->back()->with('success', 'Data imported successfully!');
    // }
}
