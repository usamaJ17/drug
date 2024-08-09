<?php

namespace App\Imports;

use App\Models\Drugs;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DrugsImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Drugs([
            'date_dispensed' => Date::excelToDateTimeObject($row['date_dispensed'])->format('Y-m-d'),
            'name' => $row['drug_name'],
            'ndc' => $row['drug_ndc'],
            'qty' => $row['qty'],
            'insurance' => $row['insurance'],
            'bin' => $row['bin'],
            'primary_ins_pay' => $row['primary_ins_pay'],
            'customer_group' => $row['customer_group_number'],
            'net_profit'   => $row['net_profit'],
        ]);
    }
}
