<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebSite\CreateWebSiteRequest;
use App\Http\Requests\WebSite\DelateWebSiteRequest;
use App\Http\Requests\WebSite\UpdateWebSiteRequest;
use App\Models\WebSite;
use App\Services\WebSiteService;

class WebSiteController extends Controller
{
    public function create(CreateWebSiteRequest $request)
    {
        /** @var WebSiteService $service */
        $service = resolve(WebSiteService::class);
        return $service->createWebSite($request);
    }


    public function update(UpdateWebSiteRequest $request)
    {
        /** @var WebSiteService $service */
        $service = resolve(WebSiteService::class);
        return $service->updateWebSite($request);
    }


    public function delete(DelateWebSiteRequest $request)
    {
        /** @var WebSiteService $service */
        $service = resolve(WebSiteService::class);
        return $service->deleteWebSite($request);
    }
}
