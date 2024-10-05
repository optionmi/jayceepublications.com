<div class="modal fade" id="authorStore" tabindex="-1" aria-labelledby="authorStoreLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="authorStoreLabel">Author Details</h5>
                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.authors.store') }}" id="updateDataForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" class="updateDataField">
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control updateDataField" id="name" type="text" placeholder="Name"
                            name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="about">About</label>
                        <input class="form-control updateDataField" id="about" type="text" placeholder="About"
                            name="about">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="media">Media File</label>
                        <input class="form-control" id="media" type="file" name="media_file" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
