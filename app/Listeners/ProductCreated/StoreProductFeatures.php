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
        // Remove old features if editing
        if ($event->type === 'edit') {
            $event->product->features()->delete();
        }

        // Prepare new features data
        $features = collect($event->features)->map(function ($feature) use ($event) {
            return [
                'prod_id' => $event->product->id,
                'title' => json_encode([
                    'en' => $feature['title_en'],
                    'ar' => $feature['title_ar'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();

        // Bulk insert new features
        Features::insert($features);
    }
}
