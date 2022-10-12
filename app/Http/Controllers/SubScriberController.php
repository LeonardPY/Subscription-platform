<?php

namespace App\Http\Controllers;

use App\Events\Website\WebsiteSubScribeEvent;
use App\Http\Requests\SubScriber\CreateSubScriberRequest;
use App\Http\Requests\SubScriber\DelateSubScriberRequest;
use App\Mail\SubeScribe\SubeScribeNameMail;
use App\Models\SubeScribe;
use App\Services\SubscriberService;
use Illuminate\Support\Facades\Mail;


class SubScriberController extends Controller
{

    public function create(CreateSubScriberRequest $request)
    {
        /** @var SubscriberService $service */
        $service = resolve(SubscriberService::class);
        return $service->createSubscriber($request);
    }

    public function delete(DelateSubScriberRequest $request)
    {

        /** @var SubscriberService $service */
        $service = resolve(SubscriberService::class);
        return $service->deleteSubscriber($request);
    }
}
