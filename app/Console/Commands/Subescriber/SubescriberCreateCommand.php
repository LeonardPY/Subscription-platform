<?php

namespace App\Console\Commands\Subescriber;

use App\Events\Website\WebsiteSubScribeEvent;
use App\Models\SubeScribe;
use Illuminate\Console\Command;

class SubescriberCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subescriber:create {email} {website_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $website_id = $this->argument('website_id');
        if($email && $website_id)
        {
            $subscriber = SubeScribe::create([
                'email' => $email,
                'website_id' => $website_id,
            ]);
            WebsiteSubScribeEvent::dispatch($subscriber);
            return 0;
        }
    }
}
