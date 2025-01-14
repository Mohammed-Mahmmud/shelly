@extends('dashboard.layouts.master')
@section('title', 'Users')
@section('users-active', 'active')
@section('css')
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <x-dashboard.layouts.breadcrumb title1="Users" title2="Users" title3="view users" />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row g-1 mb-0">
                                    <div class="col-sm-auto">
                                        <a class="btn btn-success add-btn" href="{{ route('users.create') }}"
                                            data-bs-toggle="modal" data-bs-target="#createNewUser">add user</a>
                                    </div>
                                </div>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div id="customerList">
                                    <x-dashboard.layouts.error-verify errors="{{ $errors }}" />
                                    <div class="table">
                                        <table class="table align-middle mb-0 table_id">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th width="10%">#</th>
                                                    <th width="30%">
                                                        name</th>
                                                    <th width="30%">
                                                        email</th>
                                                    <th width="20%">
                                                        action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($users as $key => $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>
                                                            <div class="d-flex gap-2">

                                                                <div class="edit">
                                                                    <a class="btn btn-sm btn-info edit-item-btn"
                                                                        href="" data-bs-toggle="modal"
                                                                        data-bs-target="#edit{{ $item->id }}">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                </div>

                                                                <x-form.modal :id="'edit' . $item->id" :title="'update user'"
                                                                    :action="route('users.update', $item->id)" :method="'PUT'">
                                                                    <div class="col-4">
                                                                        <label for="name" class="form-label">user
                                                                            name</label>
                                                                        <input type="text" id="name" name="name"
                                                                            class="form-control"
                                                                            placeholder="Enter user Name"
                                                                            value="{{ $item->name }}" required="">
                                                                        <x-form.error :name="'name'" />
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label for="email"
                                                                            class="form-label">email</label>
                                                                        <input type="text" id="email" name="email"
                                                                            class="form-control"
                                                                            placeholder=" Enter admin email"
                                                                            value="{{ $item->email }}" required="">
                                                                        <x-form.error :name="'email'" />
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label for="password"
                                                                            class="form-label">password</label>
                                                                        <input type="password" id="password"
                                                                            name="password" class="form-control"
                                                                            placeholder="Enter Updated Password"
                                                                            required="" value="{{ $item->password }}">
                                                                        <x-form.error :name="'password'" />
                                                                    </div>
                                                                </x-form.modal>

                                                                <div class="remove">
                                                                    <a class="btn btn-sm btn-danger remove-item-btn"
                                                                        href="" data-bs-toggle="modal"
                                                                        data-bs-target="#delete{{ $item->id }}">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                                <x-form.modal :id="'delete' . $item->id" :title="'Remove User'"
                                                                    :action="route('users.destroy', $item->id)" :method="'DELETE'">
                                                                    <div class="col-12">
                                                                        {{ 'Are You Sure You Want To Remove' . '  ' . $item->name }}
                                                                    </div>
                                                                </x-form.modal>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <x-form.modal :id="'createNewUser'" :title="'Add User'" :action="route('users.store')" :method="'POST'">
                    <div class="col-4">
                        <label for="name" class="form-label">user name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="user name"
                            required>
                        <x-form.error :name="'name'" />
                    </div>
                    <div class="col-4">
                        <label for="email" class="form-label">email</label>
                        <input type="text" id="email" name="email" class="form-control"
                            placeholder=" Enter admin email" required>
                        <x-form.error :name="'email'" />
                    </div>
                    <div class="col-4">
                        <label for="password" class="form-label">password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter Updated Password" value="" required>
                        <x-form.error :name="'password'" />
                    </div>
                </x-form.modal>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@section('js')
@endsection
