<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Users\StoreUserAction;
use App\Actions\Users\UpdateUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Users\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::get();
            return view('dashboard.pages.users.view', compact('users'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function create()
    {
        try {
            return view('dashboard.pages.users.view');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function store(UserRequest $request)
    {
        try {
            app(StoreUserAction::class)->handle($request->validationStore()->validated());
            return redirect()->route('users.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $user = User::FindOrFail($id);
            return view('dashboard.pages.users.view', compact('user'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        try {
            $user = User::FindOrFail($id);
            app(UpdateUserAction::class)->handle($user, $request->validationUpdate()->validated());
            return redirect()->route('users.index');
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
            User::FindOrFail($id)->delete();
            toastr(trans('Dashboard/toastr.destroy'), 'error', trans('Dashboard/toastr.deleted'));
            return back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
