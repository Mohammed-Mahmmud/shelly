<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="{{ $id }}">
                    {{ $title }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form class="tablelist-form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($method)
                <div class="modal-body">
                    <div class="row mb-5 g-3">
                        {{ $slot }}
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
