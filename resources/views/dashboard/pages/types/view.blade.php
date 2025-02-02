@extends('dashboard.layouts.master')
@section('title', 'Types')
@section('types-active', 'activeSidebar')
@section('css')
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <x-dashboard.layouts.breadcrumb title1="types" title2="types" title3="view types" />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row g-1 mb-0">
                                    <div class="col-sm-auto">
                                        <a class="btn btn-success add-btn" href="{{ route('admin.types.create') }}"
                                            data-bs-toggle="modal" data-bs-target="#createNewtype">add type</a>
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
                                                        Title EN</th>
                                                    <th width="30%">
                                                        Title AR</th>
                                                    <th width="20%">
                                                        icon</th>
                                                    <th width="10%">
                                                        action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($data as $key => $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->getTranslation('title', 'en') }}</td>
                                                        <td>{{ $item->getTranslation('title', 'ar') }}</td>
                                                        <td>
                                                            <i class="{{ $item->icon }}"></i>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">

                                                                <div class="edit">
                                                                    <a class="btn btn-sm btn-info edit-item-btn"
                                                                        href="" data-bs-toggle="modal"
                                                                        data-bs-target="#edit{{ $item->id }}">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                </div>

                                                                <x-form.modal :id="'edit' . $item->id" :title="'update type'"
                                                                    :action="route('admin.types.update', $item->id)" :method="'PUT'">
                                                                    <div class="col-4">
                                                                        <label for="name" class="form-label">type
                                                                            english name</label>
                                                                        <input type="text" id="title_en" name="title_en"
                                                                            class="form-control"
                                                                            placeholder="Enter english type Name"
                                                                            value="{{ $item->getTranslation('title', 'en') }}"
                                                                            required="">
                                                                        <x-form.error :name="'title_en'" />
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label for="name" class="form-label">type
                                                                            arabic name</label>
                                                                        <input type="text" id="title_ar" name="title_ar"
                                                                            class="form-control"
                                                                            placeholder="Enter english type Name"
                                                                            value="{{ $item->getTranslation('title', 'ar') }}"
                                                                            required="">
                                                                        <x-form.error :name="'title_ar'" />
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label for="icon"
                                                                            class="form-label">icon</label>
                                                                        <input type="text" id="icon" name="icon"
                                                                            class="form-control"
                                                                            placeholder=" Enter admin icon"
                                                                            value="{{ $item->icon }}" required="">
                                                                        <x-form.error :name="'icon'" />
                                                                    </div>
                                                                </x-form.modal>

                                                                <div class="remove">
                                                                    <a class="btn btn-sm btn-danger remove-item-btn"
                                                                        href="" data-bs-toggle="modal"
                                                                        data-bs-target="#delete{{ $item->id }}">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                                <x-form.modal :id="'delete' . $item->id" :title="'Remove type'"
                                                                    :action="route('admin.types.destroy', $item->id)" :method="'DELETE'">
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

                <x-form.modal :id="'createNewtype'" :title="'Add type'" :action="route('admin.types.store')" :method="'POST'">
                    <div class="col-4">
                        <label for="title_en" class="form-label">type english name</label>
                        <input type="text" id="title_en" name="title_en" class="form-control"
                            placeholder="type english name" required>
                        <x-form.error :name="'title_en'" />
                    </div>
                    <div class="col-4">
                        <label for="title_en" class="form-label">type arabic name</label>
                        <input type="text" id="title_ar" name="title_ar" class="form-control"
                            placeholder="type arabic name" required>
                        <x-form.error :name="'title_ar'" />
                    </div>
                    <div class="col-4">
                        <label for="icon" class="form-label">icon</label>
                        <input type="text" id="icon" name="icon" class="form-control"
                            placeholder=" Enter admin icon" required>
                        <x-form.error :name="'icon'" />
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
