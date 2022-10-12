<?php

namespace App\Console\Commands\Subescriber;

use App\Events\Website\WebsiteSubScribeEvent;
use App\Models\SubeScribe;
use Illuminate\Console\Command;

class SubescriberDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subescriber:delete {id}';

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
            $subscriber = SubeScribe::where(['id' => $id])->first();
            if ($subscriber) {
                return $subscriber->delete();
            }

            return $this->line('Subscriber Not found or already deleted');
        }
    }
}
