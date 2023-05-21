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
                        <a href="{{ route('example.create') }}" class="btn btn-sm btn-primary float-right">Create</a>
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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($examples as $example)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $example->name }}</td>
                                    <td>{{ $example->description }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('example.show', $example->id) }}"
                                                class="btn btn-sm btn-primary">Show</a>
                                            <a href="{{ route('example.edit', $example->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('example.destroy', $example->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
