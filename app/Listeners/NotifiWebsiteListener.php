<?php

namespace App\Listeners;

use App\Events\Website\WebsiteSubScribeEvent;
use App\Mail\SubeScribe\SubeScribeNameMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifiWebsiteListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Website\WebsiteSubScribeEvent  $event
     * @return void
     */
    public function handle(WebsiteSubScribeEvent $event)
    {
        $email = $event->data->website->email;
        Mail::to($email)->send(new SubeScribeNameMail($event->data->email));
    }
}
