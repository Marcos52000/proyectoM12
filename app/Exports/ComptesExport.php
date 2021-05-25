<?php

namespace App\Exports;

use App\Compte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ComptesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Compte::all();
    }
    public function headings(): array
    {
        return ["Id","Compte","Fuc","Clau","Estat","Create_user_id","Edit_user_id","Createt_at","Updatet_at"];
    }
}
