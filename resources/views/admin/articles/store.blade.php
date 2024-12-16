<div class="modal fade" id="articleStore" tabindex="-1" aria-labelledby="articleStoreLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="articleStoreLabel">Article Details</h5>
                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.articles.store') }}" id="updateDataForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" class="updateDataField">
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input class="form-control updateDataField" id="title" type="text" placeholder="Title"
                            name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="content">Content</label>
                        <div id="content">
                        </div>
                        <input class="updateDataField" id="hiddenContent" type="hidden" name="content">
                    </div>
                    <div class="mb-3 row">
                        <hr>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="src_type0">Source type</label>
                            <select class="form-control" name="src_type[]" id="src_type0">
                                <option value="file">File</option>
                                <option value="url">URL</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="media_type0">Media type</label>
                            <select class="form-control" name="media_type[]" id="media_type0">
                                <option value="img">Image</option>
                                <option value="vid">Video</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="media_file0">Media File</label>
                            <input class="form-control" id="media_file0" type="file" name="media_file[]"
                                accept="">
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12 d-none">
                            <label class="form-label" for="media_url0">Media URL</label>
                            <input class="form-control" id="media_url0" type="url" name="media_url[]"
                                placeholder="https://www.example.com/">
                        </div>
                        <hr>
                    </div>
                    <div class="mb-3 row">
                        <hr>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="src_type1">Source type</label>
                            <select class="form-control" name="src_type[]" id="src_type1">
                                <option value="file">File</option>
                                <option value="url">URL</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="media_type1">Media type</label>
                            <select class="form-control" name="media_type[]" id="media_type1">
                                <option value="img">Image</option>
                                <option value="vid">Video</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="media_file1">Media File</label>
                            <input class="form-control" id="media_file1" type="file" name="media_file[]"
                                accept="">
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12 d-none">
                            <label class="form-label" for="media_url1">Media URL</label>
                            <input class="form-control" id="media_url1" type="url" name="media_url[]"
                                placeholder="https://www.example.com/">
                        </div>
                        <hr>
                    </div>
                    <div class="mb-3 row">
                        <hr>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="src_type2">Source type</label>
                            <select class="form-control" name="src_type[]" id="src_type2">
                                <option value="file">File</option>
                                <option value="url">URL</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="media_type2">Media type</label>
                            <select class="form-control" name="media_type[]" id="media_type2">
                                <option value="img">Image</option>
                                <option value="vid">Video</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="media_file2">Media File</label>
                            <input class="form-control" id="media_file2" type="file" name="media_file[]"
                                accept="">
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12 d-none">
                            <label class="form-label" for="media_url2">Media URL</label>
                            <input class="form-control" id="media_url2" type="url" name="media_url[]"
                                placeholder="https://www.example.com/">
                        </div>
                        <hr>
                    </div>
                    <div class="mb-3 row">
                        <hr>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="src_type3">Source type</label>
                            <select class="form-control" name="src_type[]" id="src_type3">
                                <option value="file">File</option>
                                <option value="url">URL</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="media_type3">Media type</label>
                            <select class="form-control" name="media_type[]" id="media_type3">
                                <option value="img">Image</option>
                                <option value="vid">Video</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12">
                            <label class="form-label" for="media_file3">Media File</label>
                            <input class="form-control" id="media_file3" type="file" name="media_file[]"
                                accept="">
                        </div>
                        <div class="mb-3 col-lg-4 col-sm-12 d-none">
                            <label class="form-label" for="media_url3">Media URL</label>
                            <input class="form-control" id="media_url3" type="url" name="media_url[]"
                                placeholder="https://www.example.com/">
                        </div>
                        <hr>
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
