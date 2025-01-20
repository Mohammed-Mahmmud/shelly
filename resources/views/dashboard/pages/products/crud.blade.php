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
                                                    <div class="col-6">
                                                        <div class="mb-3 border rounded mt-2">
                                                            <x-form.textarea :class="'ckeditor'" :name="'desc_' . $lang->key"
                                                                :label="'Please enter description in ' . $lang->name" :value="$data->getTranslation('desc', $lang->key) ??
                                                                    ''" />
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @foreach ($translation as $lang)
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
                                        @if ($type == 'create')
                                            {{-- form repeater --}}
                                            <x-form.repeater :name="'features'">
                                                <div class="row">
                                                    @foreach ($translation as $lang)
                                                        <div class="col-6">
                                                            <x-form.input :name="'features[0]' .
                                                                '[' .
                                                                'title_' .
                                                                $lang->key .
                                                                ']'" :type="'text'"
                                                                :label="'Enter features title in ' . $lang->name" :placeholder="'Please enter features title in ' .
                                                                    $lang->name" :value="$data->getTranslation('title', $lang->key) ??
                                                                    ''" />
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </x-form.repeater>
                                            <x-form.repeater :name="'articles'">
                                                <div class="row">
                                                    @foreach ($translation as $lang)
                                                        <div class="col-6">
                                                            <x-form.input :name="'articles[0]' .
                                                                '[' .
                                                                'title_' .
                                                                $lang->key .
                                                                ']'" :type="'text'"
                                                                :label="'Enter articles title in ' . $lang->name" :placeholder="'Please enter articles title in ' .
                                                                    $lang->name" :value="$data->getTranslation('title', $lang->key) ??
                                                                    ''" />
                                                        </div>
                                                    @endforeach
                                                    @foreach ($translation as $lang)
                                                        <div class="col-6">
                                                            <div class="mb-3 border rounded mt-2">
                                                                <x-form.textarea
                                                                    id="'ckeditor-' . {{ $loop->index . $lang->key }}"
                                                                    :class="'ckeditor'" :name="'articles[0]' .
                                                                        '[' .
                                                                        'desc_' .
                                                                        $lang->key .
                                                                        ']'" :label="'Please enter articles description in ' .
                                                                        $lang->name"
                                                                    :value="$data->getTranslation(
                                                                        'desc',
                                                                        $lang->key,
                                                                    ) ?? ''" />
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </x-form.repeater>
                                            {{-- form repeater --}}
                                        @elseif($type == 'edit')
                                            {{-- form repeater --}}
                                            <x-form.repeater :name="'features'">
                                                <div class="row">
                                                    @foreach ($data->features as $index => $item)
                                                        @foreach ($translation as $lang)
                                                            <div class="col-6">
                                                                <x-form.input :name="'features[' .
                                                                    $index .
                                                                    '][' .
                                                                    'title_' .
                                                                    $lang->key .
                                                                    ']'" :type="'text'"
                                                                    :label="'Enter features title in ' . $lang->name" :placeholder="'Please enter features title in ' .
                                                                        $lang->name"
                                                                    :value="json_decode($item->title)
                                                                        ->{$lang->key} ?? ''" />
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </x-form.repeater>
                                            <x-form.repeater :name="'articles'">
                                                <div class="row">
                                                    @foreach ($data->articles as $index => $item)
                                                        @foreach ($translation as $lang)
                                                            <div class="col-6">
                                                                <x-form.input :name="'articles[' .
                                                                    $index .
                                                                    '][' .
                                                                    'title_' .
                                                                    $lang->key .
                                                                    ']'" :type="'text'"
                                                                    :label="'Enter articles title in ' . $lang->name" :placeholder="'Please enter articles title in ' .
                                                                        $lang->name"
                                                                    :value="json_decode($item->title)
                                                                        ->{$lang->key} ?? ''" />
                                                            </div>
                                                        @endforeach
                                                        @foreach ($translation as $lang)
                                                            <div class="col-6">
                                                                <div class="mb-3 border rounded mt-2">
                                                                    <x-form.textarea
                                                                        id="'ckeditor-' . {{ $loop->index . $lang->key }}"
                                                                        :class="'ckeditor'" :name="'articles[' .
                                                                            $index .
                                                                            ']' .
                                                                            '[' .
                                                                            'desc_' .
                                                                            $lang->key .
                                                                            ']'"
                                                                        :label="'Please enter articles description in ' .
                                                                            $lang->name" :value="json_decode($item->desc)
                                                                            ->{$lang->key} ?? ''" />
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </x-form.repeater>
                                            {{-- form repeater --}}
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
