<?php

namespace App\Actions\Settings;

use App\Models\Setting;

class UpdateSettingAction
{
    /**
     * Execute the action to update a setting.
     *
     * @param \App\Models\Setting $setting
     * @param array $data
     * @return \App\Models\Setting
     */
    public function execute(Setting $setting, array $data): Setting
    {
        $setting->update([
            'name' => $data['name'],
            'value' => $data['value'] ?? null,
        ]);

        return $setting;
    }
}
