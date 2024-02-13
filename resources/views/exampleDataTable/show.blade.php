@extends('layouts.app')

@section('style')
@endsection

@section('script')
@endsection

@section('content')
    <div class="col-lg-8">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="m-0">Dashboard</h5>
                    </div>
                    <div class="col">
                        <a href="{{ route('exampleDataTable.index') }}" class="btn btn-sm btn-danger float-right">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $example->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" readonly>{{ $example->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">Image</label>
                        <br>
                        <img src="{{ asset('images/example/' . $example->image) }}" alt="{{ $example->name }}" class="img-fluid" style="max-height: 200px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
