<?php

namespace App\Console\Commands\Post;

use App\Jobs\Post\PostSendEmailJob;
use App\Models\Post;
use App\Models\WebSite;
use Illuminate\Console\Command;

class PostUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:update {id} {title} {description}';

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
        $title = $this->argument('title');
        $description = $this->argument('description');
        if($id && $description && $title)
        {
            $post = Post::find($id);
            return $post->update([
                'title' => $title,
                'description' => $description
            ]);
        }else {
            $this->line('Need id title, and description  attributes');
            return 0;
        }

    }
}
