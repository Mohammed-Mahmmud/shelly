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
                                            <div class="col-4 mb-3">
                                                <x-form.input :name="'images[]'" :type="'file'" :label="'Enter images'"
                                                    :placehlder="'Please enter images'" :accept="'image/*'" :value="$data->getMedia('images') ?? ''" multiple />
                                            </div>
                                            <div class="col-4 mb-3">
                                                <x-form.input :name="'snippet_image'" :type="'file'" :label="'Enter snippet image'"
                                                    :placehlder="'Please enter snippet image'" :accept="'image/*'" :value="$data->getMedia('snippet_image') ?? ''" />
                                            </div>
                                            <div class="col-4 mb-3">
                                                <x-form.input :name="'hoverImage'" :type="'file'" :label="'Enter hover image'"
                                                    :placehlder="'Please enter hover image'" :accept="'image/*'" :value="$data->getMedia('hoverImage') ?? ''" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'price'" :type="'number'" :label="'Enter price'"
                                                    :placehlder="'Please enter price '" :value="$data->price ?? ''" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <x-form.select :value="$data->stock ?? ''" :array="App\Models\Product::STOCK" :label="'choose an option:'"
                                                    :name="'stock'">
                                                </x-form.select>
                                            </div>
                                        </div>
                                        <hr>
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
                                            <hr>
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
                                            <div class="repeater-component">
                                                <div class="repeater">
                                                    <div class="repeater-default" data-repeater-list="features">
                                                        @foreach ($data->features as $index => $item)
                                                            <div class="row" data-repeater-item>
                                                                <div class="col-11">
                                                                    <div class="row">
                                                                        @foreach ($translation as $lang)
                                                                            <div class="col-6">
                                                                                <x-form.input :name="'features[' .
                                                                                    $index .
                                                                                    '][' .
                                                                                    'title_' .
                                                                                    $lang->key .
                                                                                    ']'"
                                                                                    :type="'text'" :label="'Enter features title in ' .
                                                                                        $lang->name"
                                                                                    :placeholder="'Please enter features title in ' .
                                                                                        $lang->name" :value="$item->getTranslation(
                                                                                        'title',
                                                                                        $lang->key,
                                                                                    ) ?? ''" />
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <a href="javascript:;" data-repeater-delete=""
                                                                            class="btn btn-md font-weight-bolder btn-outline-danger">
                                                                            <i class="la la-close"></i>delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- Repeater Add Button -->
                                                    <div class="col-lg-6">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <a href="javascript:;" data-repeater-create=""
                                                                class="btn btn-md font-weight-bolder btn-outline-dark">
                                                                <i class="la la-plus"></i>Add
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="repeater-component">
                                                <div class="repeater">
                                                    <div class="repeater-default" data-repeater-list="articles">
                                                        @foreach ($data->articles as $index => $item)
                                                            <div class="row" data-repeater-item>
                                                                <div class="col-11">
                                                                    <div class="row">
                                                                        @foreach ($translation as $lang)
                                                                            <div class="col-6">
                                                                                <x-form.input :name="'articles[' .
                                                                                    $index .
                                                                                    '][' .
                                                                                    'title_' .
                                                                                    $lang->key .
                                                                                    ']'"
                                                                                    :type="'text'" :label="'Enter articles title in ' .
                                                                                        $lang->name"
                                                                                    :placeholder="'Please enter articles title in ' .
                                                                                        $lang->name" :value="$item->getTranslation(
                                                                                        'title',
                                                                                        $lang->key,
                                                                                    ) ?? ''" />
                                                                            </div>
                                                                        @endforeach
                                                                        @foreach ($translation as $lang)
                                                                            <div class="col-6">
                                                                                <div class="mb-3 border rounded mt-2">
                                                                                    <x-form.textarea
                                                                                        id="'ckeditor-' . {{ $loop->index . $lang->key }}"
                                                                                        :class="'ckeditor'"
                                                                                        :name="'articles[' .
                                                                                            $index .
                                                                                            ']' .
                                                                                            '[' .
                                                                                            'desc_' .
                                                                                            $lang->key .
                                                                                            ']'"
                                                                                        :label="'Please enter articles description in ' .
                                                                                            $lang->name"
                                                                                        :value="$item->getTranslation(
                                                                                            'desc',
                                                                                            $lang->key,
                                                                                        ) ?? ''" />
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <a href="javascript:;" data-repeater-delete=""
                                                                            class="btn btn-md font-weight-bolder btn-outline-danger">
                                                                            <i class="la la-close"></i>delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- Repeater Add Button -->
                                                    <div class="col-lg-6">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <a href="javascript:;" data-repeater-create=""
                                                                class="btn btn-md font-weight-bolder btn-outline-dark">
                                                                <i class="la la-plus"></i>Add
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-6">
                                                <x-form.dropdown :value="$data->categories->pluck('id')->toArray() ?? ''" :array="$categories" :label="'choose categories:'"
                                                    :name="'categories'">
                                                </x-form.dropdown>
                                            </div>
                                            <div class="col-6">
                                                <x-form.dropdown :value="$data->types->pluck('id')->toArray() ?? ''" :array="$types" :label="'choose types:'"
                                                    :name="'types'">
                                                </x-form.dropdown>
                                            </div>
                                            <div class="col-6">
                                                <x-form.dropdown :value="$data->technologies->pluck('id')->toArray() ?? ''" :array="$technologies" :label="'choose technologies:'"
                                                    :name="'technologies'">
                                                </x-form.dropdown>
                                            </div>
                                            <div class="col-6">
                                                <x-form.dropdown :value="$data->productUsings->pluck('id')->toArray() ?? ''" :array="$productUsings" :label="'choose product usings:'"
                                                    :name="'productUsings'">
                                                </x-form.dropdown>
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
