<?php

namespace App\Exports;

use App\Models\Areas;
use Maatwebsite\Excel\Concerns\FromCollection;

class AreasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return Areas::all();
    }
}
