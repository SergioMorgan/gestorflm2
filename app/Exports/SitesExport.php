<?php

namespace App\Exports;

use App\Models\Site;
use Maatwebsite\Excel\Concerns\FromCollection;

class SitesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Site::all();
    }
}
