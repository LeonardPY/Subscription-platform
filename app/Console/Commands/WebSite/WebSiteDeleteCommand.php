<?php

namespace App\Console\Commands\WebSite;

use App\Models\WebSite;
use Illuminate\Console\Command;

class WebSiteDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:delete {id}';

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
        if($id)
        {
            $website = WebSite::find($id);
            if ($website) {
                return $website->delete();
            }
            $this->line('Website Not found or already deleted');
            return 0;
        }
    }
}
