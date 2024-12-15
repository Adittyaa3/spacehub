@extends('layouts.main')

@section('title', 'Edit Room')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Edit Room</h6>
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
            <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror"
                                   id="name" type="text" name="name"
                                   value="{{ old('name', $room->name) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description">{{ old('description', $room->description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="capacity" class="form-control-label">Capacity</label>
                            <input class="form-control @error('capacity') is-invalid @enderror"
                                   id="capacity" type="number" name="capacity"
                                   value="{{ old('capacity', $room->capacity) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="form-control-label">Price</label>
                            <input class="form-control @error('price') is-invalid @enderror"
                                   id="price" type="number" name="price"
                                   value="{{ old('price', $room->price) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image</label>
                            <input class="form-control @error('image') is-invalid @enderror"
                                   id="image" type="file" name="image">
                            @if($room->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $room->image) }}"
                                         alt="{{ $room->name }}" class="img-thumbnail"
                                         style="max-width: 150px">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="facility" class="form-control-label">Facility</label>
                            <input class="form-control @error('facility') is-invalid @enderror"
                                   id="facility" type="text" name="facility"
                                   value="{{ old('facility', $room->facility) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="form-control-label">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror"
                                    id="status" name="status" required>
                                <option value="A" {{ old('status', $room->status) == 'A' ? 'selected' : '' }}>Available</option>
                                <option value="B" {{ old('status', $room->status) == 'B' ? 'selected' : '' }}>Booked</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id" class="form-control-label">Category</label>
                            <select class="form-control @error('category_id') is-invalid @enderror"
                                    id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            {{ old('category_id', $room->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group text-end mt-4">
                    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Room</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
