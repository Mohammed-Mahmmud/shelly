<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Settings\DeleteSettingAction;
use App\Actions\Settings\StoreSettingAction;
use App\Actions\Settings\UpdateSettingAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Settings\StoreSettingRequest;
use App\Http\Requests\Dashboard\Settings\UpdateSettingRequest;
use App\Models\Setting;
use App\ViewModels\Settings\SettingViewModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $model, $view, $indexRoute;
    public function __construct()
    {
        $this->model = new Setting();
        $this->view = 'settings';
        $this->indexRoute = 'admin.settings.index';
    }
    public function index()
    {
        try {
            $data = $this->model::orderBy('id', 'desc')->get();
            return view("dashboard.pages.$this->view.view", get_defined_vars());
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $setting = new $this->model;
            $viewModel = new SettingViewModel($setting, 'create');
            return view("dashboard.pages.$this->view.crud", $viewModel);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request, StoreSettingAction $action)
    {
        try {
            $action->execute($request->validated());
            return redirect()->route($this->indexRoute)->with('success', 'Setting created successfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = $this->model::findOrFail($id);
            return view("dashboard.pages.$this->view.show", get_defined_vars());
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $setting = $this->model::findOrFail($id);
            $viewModel = new SettingViewModel($setting, 'edit');
            return view("dashboard.pages.$this->view.crud", $viewModel);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, string $id, UpdateSettingAction $action)
    {
        try {
            $setting = $this->model::findOrFail($id);
            $request->setSettingId($setting->id);
            $action->execute($setting, $request->validated());
            return redirect()->route($this->indexRoute)->with('success', 'Setting updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, DeleteSettingAction $action)
    {
        try {
            $setting = $this->model::findOrFail($id);
            $action->execute($setting);
            return redirect()->route($this->indexRoute)->with('success', 'Setting deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
