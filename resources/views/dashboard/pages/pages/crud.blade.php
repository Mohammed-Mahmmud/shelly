@extends('dashboard.layouts.master')
@section('title', ucfirst($type) . ' page')
@section('pages-active', 'activeSidebar')
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

                                                        <br>
                                                        <x-form.input :name="'name_' . $lang->key" :type="'text'"
                                                            :label="'Enter name in ' . $lang->name" :placeholder="'Please enter name in ' . $lang->name" :value="$data->getTranslation('name', $lang->key) ?? ''"
                                                            :required="'true'" />
                                                        <br>
                                                    </div>
                                                @endforeach
                                                @foreach ($translation as $lang)
                                                    <div class="col-6">
                                                        <div class="mb-3 border rounded ">
                                                            <x-form.textarea :class="'ckeditor'" :name="'desc_' . $lang->key"
                                                                :label="'Please enter description in ' . $lang->name" :value="$data->getTranslation('desc', $lang->key) ??
                                                                    ''" />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'images[]'" :type="'file'" :label="'Enter images'"
                                                    :placehlder="'Please enter images'" :accept="'image/*'" :value="$data->getMedia('images') ?? ''" multiple />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <x-form.select :value="$data->status ?? ''" :array="App\Models\Page::STATUS" :label="'choose Page Status:'"
                                                    :name="'status'">
                                                </x-form.select>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="parent_id"
                                                    class="form-label">{{ ucfirst('choose parent page') }}</label>
                                                <select name="parent_id" class="form-control">
                                                    <option disabled> Choose An Option</option>
                                                    <option value=''>Main Page</option>
                                                    @foreach ($pages as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == $data->parent_id) selected @endif>
                                                            {{ ucwords($item->getTranslation('name', 'en')) }}</option>
                                                    @endforeach
                                                </select>
                                                <x-form.error :name="'parent_id'" />
                                            </div>

                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'slug'" :type="'text'" :label="'Enter slug'"
                                                    :placehlder="'Please enter slug'" :value="$data->slug ?? ''" />
                                            </div>
                                        </div>
                                        <hr>
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
