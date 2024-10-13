<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Excel;
use Illuminate\Support\Facades\Hash;


class ExcelImport implements ToCollection, ToModel
{
    private $current = 0;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
    }

    public function model(array $row)
    {
        $this->current++;
        if($this->current >1){
            // dd($row);
            $count = Excel::where('email', '=',$row[1] ) ->count();//condition for as email can not be duplicate
            if(empty($count)){
                $excel = new Excel;
                $excel ->name = $row[0];
                $excel ->email = $row[1];
                $excel ->password = Hash::make ($row[2]);
                $excel ->save();
            }


        }

    }
}
