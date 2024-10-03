<?php

namespace App\Exports;

use App\Models\company;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompaniesExportCSV implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return company::all();
    }
}
