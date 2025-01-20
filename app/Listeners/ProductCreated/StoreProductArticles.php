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
        if ($event->type === 'edit') {
            $event->product->articles()->delete();
        }
        foreach ($event->articles as $article) {
            Article::create([
                'prod_id' => $event->product->id,
                "title" => json_encode(
                    [
                        "en" => $article['title_en'],
                        "ar" => $article['title_ar']
                    ]
                ),
                "desc" => json_encode([
                    "en" => $article['desc_en'],
                    "ar" => $article['desc_ar']
                ]),
            ]);
        }
    }
}
