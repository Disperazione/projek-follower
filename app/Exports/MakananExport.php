<?php

namespace App\Exports;

use App\Models\OrderMakanan;
use Maatwebsite\Excel\Concerns\FromCollection;

class MakananExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OrderMakanan::all();
    }
}
