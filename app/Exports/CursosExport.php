<?php

namespace App\Exports;

use App\Curs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CursosExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Curs::all();
    }
    public function headings(): array
    {
        return ["Id","Curs","Create_user_id","Edit_user_id","Estat","Createt_at","Updatet_at"];
    }
}
