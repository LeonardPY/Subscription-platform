<?php

namespace App\Console\Commands\Post;

use App\Jobs\Post\PostSendEmailJob;
use App\Models\Post;
use App\Models\WebSite;
use Illuminate\Console\Command;

class PostCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:create {title} {description} {website_id}';

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
        $title = $this->argument('title');
        $description = $this->argument('description');
        $website_id = $this->argument('website_id');
        if($title && $description && $website_id)
        {
            $post = Post::where([
                'title' => $title,
                'website_id' => $website_id
            ])->first();
            if ($post) {
                $this->line('Post with this title already exists');
                return 0;
            }
            $post = Post::create([
                'title' => $title,
                'description' => $description,
                'website_id' => $website_id,
            ]);
            $website = WebSite::find($post->website_id);
            foreach ($website->subscribers as $subscriber) {
                $email = $subscriber->email;
                dispatch(new PostSendEmailJob($email, $post));
            }
            return 0;
        }else {
            $this->line('Need title, description and website_id attributes');
            return 0;
        }

    }
}
