@extends('dashboard.layouts.master')
@section('title', ucfirst($type) . ' project')
@section('projects-active', 'activeSidebar')
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
                                                        <div class="mb-3 border rounded ">
                                                            <x-form.textarea :class="'ckeditor'" :name="'desc_' . $lang->key"
                                                                :label="'Please enter description in ' . $lang->name" :value="$data->getTranslation('desc', $lang->key) ??
                                                                    ''" />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                            <div class="col-6 mb-3">
                                                <x-form.select :value="$data->status ?? ''" :array="App\Models\Project::STATUS" :label="'choose project Status:'"
                                                    :name="'status'">
                                                </x-form.select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="pages"
                                                    class="form-label">{{ ucfirst('Choose categories') }}</label>
                                                <select name="page_id" id="pages-id" class="form-control">
                                                    <option disabled> Choose An Option</option>
                                                    @foreach ($pages as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == $data->page_id) selected @endif>
                                                            {{ ucwords($item->name) }}</option>
                                                    @endforeach
                                                </select>
                                                <x-form.error :name="'page_id'" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'slug'" :type="'text'" :label="'Enter Author'"
                                                    :placehlder="'Please enter Author'" :value="$data->slug ?? ''" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <x-form.input :name="'image'" :type="'file'" :label="'Upload image'"
                                                    :placehlder="'Please upload image'" />
                                                @if ($data->image)
                                                    <img src="{{ asset($data->image) }}" alt="Project Image"
                                                        class="img-fluid mt-2" style="max-width: 200px;">
                                                @endif
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
