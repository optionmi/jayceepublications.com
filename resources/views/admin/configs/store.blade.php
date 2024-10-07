<div class="modal fade" id="configStore" tabindex="-1" aria-labelledby="configStoreLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="configStoreLabel">Configuration Details</h5>
                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.configs.store') }}" id="updateDataForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="logo">Logo</label>
                        <input class="form-control" id="logo" type="file" name="logo" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone</label>
                        <input class="form-control updateDataField" id="phone" type="tel" placeholder="Phone"
                            name="phone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="whatsapp">WhatsApp</label>
                        <input class="form-control updateDataField" id="whatsapp" type="tel" placeholder="Phone"
                            name="whatsapp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control updateDataField" id="email" type="email" placeholder="Email"
                            name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="catalogue">Catalogue</label>
                        <input class="form-control" id="catalogue" type="file" name="catalogue">
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
