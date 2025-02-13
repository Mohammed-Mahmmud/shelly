<div class="repeater-component">
    <div class="repeater">
        <div class="repeater-default" data-repeater-list="{{ $name }}">
            <div>{{ $title }}</div>
            <div class="row g-2 m-2" data-repeater-item>
                <div>
                    {{ $slot }}
                </div>
                <div class="text-end">
                    <div class="hstack gap-2 justify-content-end">
                        <a href="javascript:;" data-repeater-delete=""
                            class="btn btn-md font-weight-bolder btn-outline-danger">
                            <i class="la la-close"></i>delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeater Add Button -->
        <div class="col-lg-6">
            <div class="hstack gap-2 justify-content-end">
                <a href="javascript:;" data-repeater-create="" class="btn btn-md font-weight-bolder btn-outline-dark">
                    <i class="la la-plus"></i>Add
                </a>
            </div>
        </div>
    </div>
</div>

{{-- @push('js')
    <script src="{{ asset('dashboard/layouts/formRepeater/js/js.js') }}"></script>
    <script src="{{ asset('dashboard/layouts/formRepeater/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/layouts/formRepeater/js/jquery.repeater.min.js') }}"></script>
@endpush --}}
