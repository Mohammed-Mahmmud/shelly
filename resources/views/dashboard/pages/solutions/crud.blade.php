@extends('dashboard.layouts.master')
@section('title', ucfirst($type) . ' solution')
@section('solutions-active', 'activeSidebar')
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
                                            @if ($type == 'create')
                                                <x-form.repeater :name="'content'">
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <x-form.input :name="'media'" :type="'file'"
                                                                :multiple="'true'" :label="'Upload Image or Video'" :placehlder="'Please upload an image or video'"
                                                                :accept="'image/*,video/*'" :value="$data->getMedia('media') ?? ''" />
                                                        </div>

                                                        @foreach ($translation as $lang)
                                                            <div class="col-6">
                                                                <x-form.input :name="'content[0]' .
                                                                    '[' .
                                                                    'title_' .
                                                                    $lang->key .
                                                                    ']'" :type="'text'"
                                                                    :label="'Enter content title in ' . $lang->name" :placeholder="'Please enter content title in ' .
                                                                        $lang->name"
                                                                    :value="$data->getTranslation(
                                                                        'title',
                                                                        $lang->key,
                                                                    ) ?? ''" />
                                                            </div>
                                                        @endforeach
                                                        @foreach ($translation as $lang)
                                                            <div class="col-6">
                                                                <div class="mb-3 border rounded mt-2">
                                                                    <x-form.textarea :id="'ckeditor-' . '0-' . $lang->key" :class="'ckeditor'"
                                                                        :name="'content[0]' .
                                                                            '[' .
                                                                            'desc_' .
                                                                            $lang->key .
                                                                            ']'" :label="'Please enter content description in ' .
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
                                            @elseif($type == 'edit')
                                                <div class="col-12 mb-3">
                                                    <x-form.input :name="'media'" :multiple="'true'" :type="'file'"
                                                        :label="'Upload Image or Video'" :placehlder="'Please upload an image or video'" :accept="'image/*,video/*'" />
                                                </div>
                                                <hr>
                                                <div class="repeater-component">
                                                    <div class="repeater">
                                                        <div class="repeater-default" data-repeater-list="content">
                                                            @foreach ($data->content as $index => $item)
                                                                <div class="row" data-repeater-item>
                                                                    <div class="col-11">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <x-form.input :name="'media'"
                                                                                    :type="'file'" :label="'Upload Image or Video'"
                                                                                    :placehlder="'Please upload an image or video'" :accept="'image/*,video/*'"
                                                                                    :value="$data->getMedia(
                                                                                        'media',
                                                                                    ) ?? ''" />
                                                                            </div>
                                                                            @foreach ($translation as $lang)
                                                                                <div class="col-6">
                                                                                    <x-form.input :name="'content[' .
                                                                                        $index .
                                                                                        '][' .
                                                                                        'title_' .
                                                                                        $lang->key .
                                                                                        ']'"
                                                                                        :type="'text'"
                                                                                        :label="'Enter content title in ' .
                                                                                            $lang->name"
                                                                                        :placeholder="'Please enter content title in ' .
                                                                                            $lang->name"
                                                                                        :value="json_decode(
                                                                                            $item->title,
                                                                                        )->{$lang->key} ?? ''" />
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach ($translation as $lang)
                                                                                <div class="col-6">
                                                                                    <div class="mb-3 border rounded mt-2">
                                                                                        <x-form.textarea :id="'ckeditor-' .
                                                                                            $index .
                                                                                            '-' .
                                                                                            $lang->key"
                                                                                            :class="'ckeditor'"
                                                                                            :name="'content[' .
                                                                                                $index .
                                                                                                ']' .
                                                                                                '[' .
                                                                                                'desc_' .
                                                                                                $lang->key .
                                                                                                ']'"
                                                                                            :label="'Please enter content description in ' .
                                                                                                $lang->name"
                                                                                            :value="$data->getTranslation(
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
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <x-form.dropdown :value="$data->categories->pluck('id')->toArray() ?? ''" :array="$categories" :label="'choose categories:'"
                                                    :name="'categories'">
                                                </x-form.dropdown>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'slug'" :type="'text'" :label="'Enter slug'"
                                                    :placehlder="'Please enter slug'" :value="$data->slug ?? ''" />
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
    <script src="{{ asset('dashboard/layouts/formRepeater/js/js.js') }}"></script>
    <script src="{{ asset('dashboard/layouts/formRepeater/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/layouts/formRepeater/js/jquery.repeater.min.js') }}"></script>
@endsection
