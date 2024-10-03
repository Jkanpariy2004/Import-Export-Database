<?php

namespace App\Imports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompaniesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Company([
            'id' => $row['id'],
            'c_name' => $row['name'],
            'c_email' => $row['email'],
            'c_phone_no' => $row['phone'],
            'c_address' => $row['address'],
            'city' => $row['city'],
            'country' => $row['country'],
        ]);
    }
}
