<?php

namespace App\Http\Controllers\Dashboard;

use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TechnologyRequest;
use App\Models\Technology;
use Exception;

class ProductTechnologyController extends Controller
{
    use ImageHelper;
    /**
     * Display a listing of the resource.
     */
    public $view, $model, $indexRoute;
    public function __construct()
    {
        $this->view = "technologies";
        $this->indexRoute = "admin.product.technologies.index";
        $this->model = new Technology();
    }
    public function index()
    {
        try {
            $data = $this->model->get();
            return view('dashboard.pages.' . $this->view . '.view', compact('data'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store(TechnologyRequest $request)
    {
        try {
            $data = $request->validationStore()->validated();
            $type = [
                "title" => [
                    "en" => $data['title_en'],
                    "ar" => $data['title_ar']
                ],
            ];
            $technology = $this->model->create($type);
            if (isset($data['icon'])) {
                $this->StoreImage($data['icon'], $technology, 'icon');
            }
            toastr('data has been saved', 'success', 'success');
            return redirect()->route($this->indexRoute);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */

    public function update(TechnologyRequest $request, $id)
    {
        try {

            $data = $request->validationUpdate()->validated();
            $type = [
                "title" => [
                    "en" => $data['title_en'],
                    "ar" => $data['title_ar']
                ],
            ];
            $this->model->FindOrFail($id)->update($type);
            if (isset($data['icon'])) {
                $this->UpdateImage($data['icon'], $this->model->FindOrFail($id), 'icon');
            }
            toastr('data has been updated', 'info', 'success');
            return redirect()->route($this->indexRoute);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        try {
            $this->model->FindOrFail($id)->delete();
            toastr(trans('data has been removed'), 'error', trans('Deleted'));
            return back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
