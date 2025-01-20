<?php

namespace App\Listeners\ProductCreated;

use App\Events\Dashboard\ProductCreated;
use App\Models\Features;
use Feature;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreProductFeatures
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
            $event->product->features()->delete();
        }
        foreach ($event->features as $feature) {
            Features::create([
                'prod_id' => $event->product->id,
                "title" =>
                json_encode(
                    [
                        "en" => $feature['title_en'],
                        "ar" => $feature['title_ar'],
                    ]
                ),
            ]);
        }
    }
}
