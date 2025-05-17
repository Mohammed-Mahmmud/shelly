<?php

namespace App\Actions\Settings;

use App\Models\Setting;
use Illuminate\Http\Request;

class StoreSettingAction
{
    /**
     * Execute the action to store a new setting.
     *
     * @param array $data
     * @return \App\Models\Setting
     */
    public function execute(array $data): Setting
    {
        return Setting::create([
            'name' => $data['name'],
            'value' => $data['value'] ?? null,
        ]);
    }
}
