@extends('dashboard.layouts.master')
@section('title', ucfirst($type) . ' Product')
@section('products-active', 'activeSidebar')
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
                                                    <!-- Description Textarea -->
                                                    <div class="col-6">
                                                        <div class="mb-3 border rounded mt-2">
                                                            <x-form.textarea :class="'ckeditor'" :name="'desc_' . $lang->key"
                                                                :label="'Please enter description in ' . $lang->name" :value="$data->getTranslation('desc', $lang->key) ??
                                                                    ''" />
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @foreach ($translation as $lang)
                                                    <!-- Stock Input Field -->
                                                    <div class="col-6 mb-3">
                                                        <x-form.input :name="'stock_' . $lang->key" :type="'text'"
                                                            :label="'Enter stock in ' . $lang->name" :placeholder="'Please enter stock in ' . $lang->name" :value="$data->getTranslation('stock', $lang->key) ?? ''" />
                                                    </div>
                                                @endforeach

                                                @foreach ($translation as $lang)
                                                    <div class="col-6">
                                                        <div class="mb-3 border rounded mt-2">
                                                            <x-form.textarea :class="'ckeditor'" :name="'long_desc_' . $lang->key"
                                                                :label="'Please enter long description in ' .
                                                                    $lang->name" :value="$data->getTranslation(
                                                                    'long_desc',
                                                                    $lang->key,
                                                                ) ?? ''" />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'images[]'" :type="'file'" :label="'Enter images'"
                                                    :placehlder="'Please enter images'" :accept="'image/*'" :value="$data->getMedia('images') ?? ''" multiple />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'snippet_image'" :type="'file'" :label="'Enter snippet image'"
                                                    :placehlder="'Please enter snippet image'" :accept="'image/*'" :value="$data->getMedia('snippet_image') ?? ''" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'price'" :type="'number'" :label="'Enter price'"
                                                    :placehlder="'Please enter price '" :value="$data->price ?? ''" />
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
@section('js')
@endsection
