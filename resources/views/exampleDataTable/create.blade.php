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
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @endif

                <form method="POST" action="{{ route('exampleDataTable.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-block btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
