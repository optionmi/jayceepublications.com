@extends('layouts.admin')

@section('content')
    <div class="body flex-grow-1">
        <div class="px-4 container-lg">
            <div class="mb-4 row card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Articles</h5>
                        <div class="gap-4 d-flex align-items-center">
                            <form action="{{ route('admin.articles.toggle') }}" id="enableArticlesForm" method="POST">
                                @csrf
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="flexCheckChecked"
                                        {{ App\Models\Config::where('name', 'showArticles')->value('value') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Enable Articles
                                    </label>
                                </div>
                            </form>
                            <button class="px-2 py-2 btn btn-primary" type="button" title="Edit"
                                data-coreui-toggle="modal" data-coreui-target="#articleStore">Create</button>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered"
                        data-table-route="{{ route('admin.articles.datatable') }}">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Media</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.articles.store')
@endsection
@section('bottom-scripts')
    @vite(['resources/js/quill.js'])
@endsection
