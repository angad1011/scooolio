<?php

namespace App\Imports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // Parse the date_of_birth field to the correct format
        $dateOfBirth = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_birth'])->format('Y-m-d');

        return new Students([
            'institute_id' => $row['institute_id'],
            'gr_no' => $row['gr_no'],
            'name' => $row['name'],
            'email' => $row['email'],
            'contact_no' => $row['contact_no'],
            'date_of_birth'=>$dateOfBirth,
            'gender'=>$row['gender'],
            'blood_group'=>$row['blood_group'],
            'father_name'=>$row['father_name'],
            'mother_name'=>$row['mother_name'],
            'father_qualification'=>$row['father_qualification'],
            'mother_qualification'=>$row['mother_qualification'],
        ]);
    }
}
