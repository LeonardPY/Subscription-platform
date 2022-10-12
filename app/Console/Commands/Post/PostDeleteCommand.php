<?php

namespace App\Console\Commands\Post;

use App\Jobs\Post\PostSendEmailJob;
use App\Models\Post;
use App\Models\WebSite;
use Illuminate\Console\Command;

class PostDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:delete {id}';

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
            $post = Post::where(['id' => $id])->first();
            if ($post) {
                return $post->delete();;
            }
            $this->line('Post Not found or already deleted');
            return 0;
        }else {
            $this->line('Need id attribute');
            return 0;
        }

    }
}
