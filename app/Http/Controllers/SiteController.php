<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Http\Requests\StoreSite;

class SiteController extends Controller
{


    public function index () {
        return view('sites.index');
    }

    public function create () {
        return view('sites.create');    }

    public function edit(Site $site) {
        return view('sites.edit', ['site' => $site]);
    }

    public function update(StoreSite $request, Site $site) {
        $site->update($request->all());
        return redirect()->route('sites.index', $site);
        

    }

    public function destroy(Site $site){
        // $site->delete();
        // return view('sites.index');
        return view('sites.edit', ['site' => $site]);

        // return redirect()->route('sites.edit', $site);
    }
}
