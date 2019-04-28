<?php

namespace Litepost\Console;

use Illuminate\Console\Command;
use Litepost\Models\PostType;
use Litepost\Models\Post;
use Spatie\Sitemap\Sitemap;
use Spatie\Tags\Url;

class SitemapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'litepost:sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Sitemap';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param  \App\DripEmailer  $drip
     * @return mixed
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $postTypes = PostType::all();
        $appURL = env('APP_URL');

        foreach($postTypes as $postType) {
            $posts = $postType->posts()->where('status', 'published')->get();

            foreach($posts as $post) {
                $sitemap->add("{$appURL}/{$postType->slug}/{$post->slug}");
            }     
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $file = file_get_contents(public_path('sitemap.xml'));
    }
}