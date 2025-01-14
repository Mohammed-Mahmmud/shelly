@props([
    'title1' => false,
    'title2' => false,
    'title3' => false,
    'route' => false,
])
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ $title1 ?? '' }}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ $route }}">{{ $title2 ?? '' }}</a></li>
                    <li class="breadcrumb-item active">{{ $title3 ?? '' }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
