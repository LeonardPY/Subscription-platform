<?php

namespace App\Services;


use App\Events\Website\WebsiteSubScribeEvent;
use App\Models\SubeScribe;
use App\Models\WebSite;
use Illuminate\Http\Request;

class SubscriberService
{

    public function createSubscriber(Request $request)
    {
        $subscriber = SubeScribe::create([
            'email' => $request->email,
            'website_id' => $request->website_id,
        ]);

        WebsiteSubScribeEvent::dispatch($subscriber);
        return $subscriber;

    }

    public function deleteSubscriber(Request $request)
    {

        $subscriber = SubeScribe::where(['id' => $request->id])->first();
        if ($subscriber) {
            return $subscriber->delete();
        }
        return 'Subscriber Not found or already deleted';
    }

}
