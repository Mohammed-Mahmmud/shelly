<?php

namespace App\Actions\Settings;

use App\Models\Setting;

class DeleteSettingAction
{
    /**
     * Execute the action to delete a setting.
     *
     * @param \App\Models\Setting $setting
     * @return bool
     */
    public function execute(Setting $setting): bool
    {
        return $setting->delete();
    }
}
