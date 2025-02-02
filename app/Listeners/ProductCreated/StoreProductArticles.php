<?php

namespace App\Listeners\ProductCreated;

use App\Events\Dashboard\ProductCreated;
use App\Models\Article;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreProductArticles
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreated $event): void
    {
        // Remove old articles if editing
        if ($event->type === 'edit') {
            $event->product->articles()->delete();
        }

        // Prepare new articles data
        $articles = collect($event->articles)->map(function ($article) use ($event) {
            return [
                'prod_id' => $event->product->id,
                'title' => json_encode([
                    'en' => $article['title_en'],
                    'ar' => $article['title_ar'],
                ]),
                'desc' => json_encode([
                    'en' => $article['desc_en'],
                    'ar' => $article['desc_ar'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();

        // Bulk insert new articles
        Article::insert($articles);
    }
}
