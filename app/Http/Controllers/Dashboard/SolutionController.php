<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Solutions\StoreSolutionAction;
use App\Actions\Solutions\UpdateSolutionAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\SolutionRequest;
use App\Models\Solution;
use App\ViewModels\SolutionViewModel;
use Exception;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $model, $view, $indexRoute;
    public function __construct()
    {
        $this->model = new Solution();
        $this->view = 'solutions';
        $this->indexRoute = 'admin.solutions.index';
    }
    public function index()
    {
        try {
            $data = $this->model::orderBy('id', 'desc')->get();
            return view("dashboard.pages.$this->view.view", compact('data'));
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
            return view('dashboard.pages.' . $this->view . '.crud', new SolutionViewModel());
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SolutionRequest $request)
    {
        try {
            app(StoreSolutionAction::class)->handle($request->validationStore()->validated());
            return redirect()->route($this->indexRoute);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = $this->model::findOrFail($id);
            return view("dashboard.pages.$this->view.crud", new SolutionViewModel($data));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SolutionRequest $request, string $id)
    {
        try {
            $product = $this->model::findOrFail($id);
            app(UpdateSolutionAction::class)->handle($product, $request->validationUpdate()->validated());
            return redirect()->route($this->indexRoute);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->model::findOrFail($id)->delete();
            return redirect()->route($this->indexRoute);
            toastr(trans('data has been removed'), 'error', trans('Deleted'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
