<?php

namespace App\Console\Commands\WebSite;

use App\Models\WebSite;
use Illuminate\Console\Command;

class WebSiteUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:update {id} {name}';

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
        $id = $this->argument('id');
        $name = $this->argument('name');
        if($id && $name)
        {
            $website = WebSite::find($id);
            if($website)
            {
                $website['name'] = $name;
                return $website->save();
            }
            $this->line('Website Not found or already update');
            return 0;
        }
    }
}
