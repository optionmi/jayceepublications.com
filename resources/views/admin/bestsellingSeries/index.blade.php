@extends('layouts.admin')

@section('content')
    <div class="body flex-grow-1">
        <div class="px-4 container-lg">
            <div class="mb-4 row card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Bestselling Series</h5>
                        <button class="px-2 py-2 btn btn-primary" type="button" title="Edit" data-coreui-toggle="modal"
                            data-coreui-target="#bestsellingSeriesStore">Add</button>
                    </div>
                </div>
                <div class="card-body row">
                    @foreach ($series as $ser)
                        <div class="col-md-2 col-sm-1">
                            <div>
                                <img class="w-100" src="{{ asset('series/' . $ser) }}" alt="Book {{ $loop->iteration }}">
                                <div>
                                    <button class="my-1 font-bold text-white w-100 btn btn-danger btn-sm"
                                        data-coreui-toggle="modal" data-coreui-target="#deleteModal"
                                        data-delete-route="{{ route('admin.bestsellingSeries.destroy', $ser) }}">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('admin.bestsellingSeries.store')
@endsection
