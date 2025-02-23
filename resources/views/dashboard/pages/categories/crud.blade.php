@extends('dashboard.layouts.master')
@section('title', ucfirst($type) . ' category')
@section('product-categories-active', 'activeSidebar')
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
                                    <x-form.form :action="$action" :method="$method" :enctype="'multipart/form-data'">
                                        <div class="row">
                                            @if (count($translation) > 0)
                                                @foreach ($translation as $lang)
                                                    <div class="col-6 mb-3">
                                                        <x-form.input :name="'title_' . $lang->key" :type="'text'" :label="'Enter title in ' . $lang->name"
                                                            :placeholder="'Please enter title in ' . $lang->name" :value="$data->getTranslation('title', $lang->key) ?? ''" :required="'true'" />
                                                    </div>
                                                @endforeach

                                                @foreach ($translation as $lang)
                                                    <div class="col-6">
                                                        <div class="mb-3 border rounded mt-2">
                                                            <x-form.textarea :class="'ckeditor'" :name="'desc_' . $lang->key"
                                                                :label="'Please enter description in ' . $lang->name" :value="$data->getTranslation('desc', $lang->key) ??
                                                                    ''" />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'image'" :type="'file'" :label="'Enter cover image'"
                                                    :placehlder="'Please enter cover image'" :accept="'image/*'" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'icon'" :type="'file'" :label="'Choose icon'"
                                                    :placehlder="'Please Choose icon '" :value="$data->icon ?? ''" />
                                            </div>
                                        </div>
                                        <hr>
                                        @if ($data->getFirstMediaUrl('category'))
                                            <div class="col-4 text-center">
                                                <img width="100px" height="100px"
                                                    src="{{ $data->getFirstMediaUrl('category') }}">
                                            </div>
                                        @endif
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
@section('js')
@endsection
