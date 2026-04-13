@extends('backend.layouts.master')

@section('admin-title')
    All Entries - List
@endsection

@section('admin-content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Form Data List</h4>
            <a href="{{ route('forms.create') }}" class="btn btn-primary btn-sm">Add New Entry</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Page (Header)</th>
                            <th>Name</th>
                            <th>Short Text</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($forms as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}" width="60" height="50" style="object-fit: cover; border-radius: 5px;" alt="img">
                                @else
                                    <span class="badge badge-secondary">No Image</span>
                                @endif
                            </td>
                            <td><span class="badge badge-info">{{ str_replace('_', ' ', $item->header_name) }}</span></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ Str::limit($item->text, 20) }}</td>
                            <td>{{ $item->year_text }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <a href="{{ route('forms.edit', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('forms.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($forms->isEmpty())
                    <div class="text-center py-4">
                        <p class="text-muted">No data found!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection