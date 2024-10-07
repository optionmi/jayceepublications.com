@extends('layouts.admin')

@section('content')
    <div class="body flex-grow-1">
        <div class="px-4 container-lg">
            <div class="mb-4 row card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Configurations</h5>
                        <button class="px-2 py-2 btn btn-primary" type="button" title="Edit" data-coreui-toggle="modal"
                            data-coreui-target="#configStore" data-update-route="{{ route('admin.configs.store') }}"
                            data-row-data="{{ json_encode([$config['phone'], $config['whatsapp'], $config['email']]) }}">Update</button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered"
                        data-table-route="{{ route('admin.configs.datatable') }}">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Value</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.configs.store')
@endsection
