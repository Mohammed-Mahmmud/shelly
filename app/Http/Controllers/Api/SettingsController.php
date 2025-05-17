<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SettingsController extends Controller
{
    /**
     * Get all settings or a specific setting by name
     *
     * @param string|null $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(string $name = null): JsonResponse
    {
        if ($name) {
            $setting = Setting::where('name', $name)->first();

            if (!$setting) {
                return response()->json([
                    'success' => false,
                    'message' => 'Setting not found',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $setting,
            ]);
        }

        $settings = Setting::all();

        return response()->json([
            'success' => true,
            'data' => $settings,
        ]);
    }

    /**
     * Update a setting value (requires authentication)
     *
     * @param Request $request
     * @param string $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $name): JsonResponse
    {
        $request->validate([
            'value' => 'required|string',
        ]);

        $setting = Setting::where('name', $name)->first();

        if (!$setting) {
            return response()->json([
                'success' => false,
                'message' => 'Setting not found',
            ], 404);
        }

        $setting->update([
            'value' => $request->value,
        ]);

        return response()->json([
            'success' => true,
            'data' => $setting,
            'message' => 'Setting updated successfully',
        ]);
    }
}
