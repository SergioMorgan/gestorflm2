<?php

namespace App\Exports;

use App\Models\Osticket;
use Maatwebsite\Excel\Concerns\FromCollection;

class OsticketsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Osticket::all();
    }
}
