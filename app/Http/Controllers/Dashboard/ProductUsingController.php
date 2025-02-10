<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductUsingRequest;
use App\Models\ProductUsing;
use Exception;

class ProductUsingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $view, $model, $indexRoute;
    public function __construct()
    {
        $this->view = "product-using";
        $this->indexRoute = "admin.product.using.index";
        $this->model = new ProductUsing();
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

    public function store(ProductUsingRequest $request)
    {
        try {
            $data = $request->validationStore()->validated();
            $type = [
                "title" => [
                    "en" => $data['title_en'],
                    "ar" => $data['title_ar']
                ],
                "icon" => $data['icon']
            ];
            $this->model->create($type);
            toastr('data has been saved', 'success', 'success');
            return redirect()->route($this->indexRoute);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */

    public function update(ProductUsingRequest $request, $id)
    {
        try {

            $data = $request->validationUpdate()->validated();
            $type = [
                "title" => [
                    "en" => $data['title_en'],
                    "ar" => $data['title_ar']
                ],
                "icon" => $data['icon']
            ];
            $this->model->FindOrFail($id)->update($type);
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
