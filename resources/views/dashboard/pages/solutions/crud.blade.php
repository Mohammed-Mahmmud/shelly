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
                                                <div class="repeater">
                                                    <div data-repeater-list="content">
                                                        <div data-repeater-item>
                                                            <div class="row">
                                                                <div class="col-6 mb-3">
                                                                    <x-form.input :name="'media'" :type="'file'"
                                                                        :multiple="'true'" :label="'Upload Image or Video'"
                                                                        :placehlder="'Please upload an image or video'" :accept="'image/*,video/*'" />
                                                                </div>
                                                                <div class="col-6">
                                                                    <x-form.dropdown :value="$data->types->pluck('id')->toArray() ??
                                                                        ''" :array="$types"
                                                                        :label="'Choose types:'" :name="'types'">
                                                                    </x-form.dropdown>
                                                                </div>

                                                                @foreach ($translation as $lang)
                                                                    <div class="col-6">
                                                                        <x-form.input :name="'title_' . $lang->key" :type="'text'"
                                                                            :label="'Enter content title in ' .
                                                                                $lang->name" :placeholder="'Please enter content title in ' .
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
                                                                            <x-form.textarea :id="'ckeditor-' .
                                                                                $lang->key .
                                                                                uniqId()"
                                                                                :class="'ckeditor'" :name="'desc_' . $lang->key"
                                                                                :label="'Please enter content description in ' .
                                                                                    $lang->name" :value="$data->getTranslation(
                                                                                    'desc',
                                                                                    $lang->key,
                                                                                ) ?? ''" />
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                                <div class="col-12 mt-2">
                                                                    <button data-repeater-delete type="button"
                                                                        class="btn btn-danger">Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button data-repeater-create type="button"
                                                        class="btn btn-primary mt-3">Add
                                                        More</button>
                                                </div>
                                            @elseif($type == 'edit')
                                                <div class="row">
                                                    <div class="col-6 mb-3">
                                                        <x-form.input :name="'media'" :type="'file'"
                                                            :multiple="'true'" :label="'Upload Image or Video'" :placehlder="'Please upload an image or video'"
                                                            :accept="'image/*,video/*'" />
                                                    </div>
                                                    <div class="col-6">
                                                        <x-form.dropdown :value="$data->types->pluck('id')->toArray() ?? ''" :array="$types"
                                                            :label="'Choose types:'" :name="'types'">
                                                        </x-form.dropdown>
                                                    </div>

                                                    @foreach ($translation as $lang)
                                                        <div class="col-6">
                                                            <x-form.input :name="'title_' . $lang->key" :type="'text'"
                                                                :label="'Enter content title in ' . $lang->name" :placeholder="'Please enter content title in ' .
                                                                    $lang->name" :value="$data->getTranslation('title', $lang->key) ??
                                                                    ''" />
                                                        </div>
                                                    @endforeach

                                                    @foreach ($translation as $lang)
                                                        <div class="col-6">
                                                            <div class="mb-3 border rounded mt-2">
                                                                <x-form.textarea :id="'ckeditor-' . $lang->key . uniqId()" :class="'ckeditor'"
                                                                    :name="'desc_' . $lang->key" :label="'Please enter content description in ' .
                                                                        $lang->name"
                                                                    :value="$data->getTranslation(
                                                                        'desc',
                                                                        $lang->key,
                                                                    ) ?? ''" />
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <x-form.dropdown :multiple="false" :value="$data->categories->pluck('id')->toArray() ?? ''" :array="$categories" :label="'Choose categories:'"
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
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script src="{{ asset('dashboard/layouts/code/script.js') }}"></script>
@endpush
