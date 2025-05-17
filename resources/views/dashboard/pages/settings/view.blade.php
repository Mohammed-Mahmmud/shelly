@extends('dashboard.layouts.master')
@section('title', 'settings')
@section('settings-active', 'activeSidebar')
@section('css')
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <x-dashboard.layouts.breadcrumb title1="setting" title2="setting" title3="view setting" />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row g-1 mb-0">
                                    <div class="col-sm-auto">
                                        <a class="btn btn-success add-btn" href="{{ route('admin.settings.create') }}">New
                                            setting</a>
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
                                                    <th width="5%">#</th>
                                                    <th width="35%">Name</th>
                                                    <th width="40%">Value</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @if (count($data) > 0)
                                                    @foreach ($data as $key => $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->value }}</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <a class="btn btn-sm btn-info edit-item-btn"
                                                                            href="{{ route('admin.settings.edit', $item->id) }}">
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <a class="btn btn-sm btn-danger remove-item-btn"
                                                                            href="" data-bs-toggle="modal"
                                                                            data-bs-target="#delete{{ $item->id }}">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </div>
                                                                    <x-form.modal :id="'delete' . $item->id" :title="'Remove Setting'"
                                                                        :action="route(
                                                                            'admin.settings.destroy',
                                                                            $item->id,
                                                                        )" :method="'DELETE'">
                                                                        <div class="col-12">
                                                                            {{ 'Are You Sure You Want To Remove' . '  ' . $item->name }}
                                                                        </div>
                                                                    </x-form.modal>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
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
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection

