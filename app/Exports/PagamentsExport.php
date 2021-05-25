<?php

namespace App\Exports;

use App\Pagaments;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PagamentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pagaments::all();
    }
    public function headings(): array
    {
        return ["Id","Categoria_id","Compte_id","Curs_id","Nivell","Titol","Descripcio","Preu","Data_inici","Data_fi","Estat","Create_user_id","Edit_user_id","Createt_at","Updatet_at"];
    }
}
