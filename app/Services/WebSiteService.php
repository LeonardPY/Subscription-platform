<?php

namespace App\Services;


use App\Models\WebSite;
use Illuminate\Http\Request;

class WebSiteService
{

    public function createWebSite(Request $request)
    {

        $webSite = WebSite::where(['name' => $request->name])->first();
        if ($webSite) {
            return 'Website with this title already exists';
        }
        return WebSite::create([
            'email' => $request->email,
            'name' => $request->name,
        ]);
    }

    public function updateWebSite(Request $request)
    {
        $website = WebSite::find($request->id);
        if($website)
        {
            $website['name'] = $request->name;
            return $website->save();
        }
        return 'Website Not found or already deleted';
    }

    public function deleteWebSite(Request $request)
    {

        $website = WebSite::find($request->id);
        if ($website) {
            return $website->delete();
        }
        return 'Website Not found or already deleted';
    }

}
