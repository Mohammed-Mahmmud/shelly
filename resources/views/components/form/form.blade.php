<div>
    <form action="{{ $action }}" method="POST"
        @if (isset($enctype)) enctype = "{{ $enctype }}" @endif class="tablelist-form">
        @csrf
        @method($method)
        <div class="modal-body">
            <div class="mb-3">
                {{ $slot }}
            </div>
        </div>
        <div class="modal-footer">
            <div class="hstack gap-2 justify-content-end">
                <a type="button" class="btn btn-dark" href="{{ url()->previous() }}">Close</a>
                <button type="submit" class="btn btn-success">save</button>
            </div>
        </div>
    </form>
</div>
