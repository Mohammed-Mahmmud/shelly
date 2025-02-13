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
