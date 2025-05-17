@extends('dashboard.layouts.master')
@section('title', ucfirst($type) . ' setting')
@section('settings-active', 'activeSidebar')
@section('css')
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <x-dashboard.layouts.breadcrumb title1="{{ ucwords($views) }}" title2="{{ ucwords($views) }}"
                    title3="{{ ucwords($type . ' ' . $views) }}" />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="customerList">
                                    <x-dashboard.layouts.error-verify errors="{{ $errors }}" />
                                    <x-form.form :action="$action" :method="$method">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <x-form.input :name="'name'" :type="'text'" :label="'Setting Name'"
                                                    :placeholder="'Enter setting name'" :value="$setting->name ?? ''" :required="true" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <x-form.input :name="'value'" :type="'text'" :label="'Setting Value'"
                                                    :placeholder="'Enter setting value'" :value="$setting->value ?? ''" />
                                            </div>
                                        </div>
                                    </x-form.form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script src="{{ asset('dashboard/layouts/code/script.js') }}"></script>
@endpush
