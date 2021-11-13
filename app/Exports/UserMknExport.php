<?php

namespace App\Exports;

use App\Models\OrderMakanan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserMknExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return OrderMakanan::where('nama', Auth::user()->name)->get();
    }
}
