<div class="modal fade" id="bestsellingSeriesStore" tabindex="-1" aria-labelledby="bestsellingSeriesStoreLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="bestsellingSeriesStoreLabel">Bestselling Series Details</h5>
                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.bestsellingSeries.store') }}" reload="true">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="bestsellingSeriesMedia">Book Image</label>
                        <input class="form-control" id="bestsellingSeriesMedia" type="file" name="media_file"
                            accept="image/*">
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
