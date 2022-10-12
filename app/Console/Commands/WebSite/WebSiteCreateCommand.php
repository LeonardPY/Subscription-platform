<?php

namespace App\Console\Commands\WebSite;

use App\Models\WebSite;
use Illuminate\Console\Command;

class WebSiteCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:create {name} {email}';

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
        $name = $this->argument('name');
        if($email && $name)
        {
            $webSite = WebSite::where(['name' => $name])->first();
            if ($webSite) {
                $this->line('Website with this title already exists');
                return 0;
            }
            WebSite::create([
                'email' => $email,
                'name' => $name,
            ]);
            return 0;
        }
    }
}
