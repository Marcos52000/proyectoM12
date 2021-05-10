<?php

namespace App\Exports;

use App\Categoria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Categoria::all();
    }
    public function headings(): array
    {
        return ["Id","Categoria","Estat","Create_user_id","Edit_user_id","Createt_at","Updatet_at"];
    }
}
