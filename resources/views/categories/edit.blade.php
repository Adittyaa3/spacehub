{{-- resources/views/categories/edit.blade.php --}}
@extends('layouts.main')

@section('title', 'Edit Category')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Edit Category</h6>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror"
                                   type="text" name="name" value="{{ old('name', $category->name) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      name="description">{{ old('description', $category->description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image</label>
                            <input class="form-control @error('image') is-invalid @enderror"
                                   type="file" name="image">
                            @if($category->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $category->image) }}"
                                         alt="{{ $category->name }}" width="100">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="facility" class="form-control-label">Facility</label>
                            <input class="form-control @error('facility') is-invalid @enderror"
                                   type="text" name="facility" value="{{ old('facility', $category->facility) }}">
                        </div>
                    </div>
                </div>
                <div class="form-group text-end">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
