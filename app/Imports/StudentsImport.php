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

        // dd($row);

        // Parse the date_of_birth field to the correct format
        $dateOfBirth = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_birth'])->format('Y-m-d');

        $dateOfAdmission = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_admission'])->format('Y-m-d');

        return new Students([
            'institute_id' => $row['institute_id'],
            'gr_no' => $row['gr_no'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'name' => $row['first_name'].' '.$row['last_name'],
            'email' => $row['email'],
            'contact_no' => $row['contact_no'],
            'alternate_no' => $row['alternate_no'],
            'whatsapp' => $row['whatsapp'],
            'date_of_birth'=>$dateOfBirth,
            'gender'=>$row['gender'],
            'blood_group'=>$row['blood_group'],
            'date_of_birth'=>$dateOfAdmission,
            'father_name'=>$row['father_name'],
            'mother_name'=>$row['mother_name'],
            'father_occupation'=>$row['father_occupation'],
            'mother_occupation'=>$row['mother_occupation'],
        ]);
    }
}
