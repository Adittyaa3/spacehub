@extends('layouts.main')

@section('title', 'Edit Room')

@section('content')
<div class="col-12">
    <!-- Form Edit -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Edit Room</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name</label>
                            <input class="form-control" id="name" type="text" name="name" value="{{ $room->name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ $room->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="capacity" class="form-control-label">Capacity</label>
                            <input class="form-control" id="capacity" type="number" name="capacity" value="{{ $room->capacity }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="form-control-label">Price</label>
                            <input class="form-control" id="price" type="number" name="price" value="{{ $room->price }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image</label>
                            <input class="form-control" id="image" type="file" name="image">
                            @if($room->image)
                            <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" width="100">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="facility" class="form-control-label">Facility</label>
                            <input class="form-control" id="facility" type="text" name="facility" value="{{ $room->facility }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="form-control-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="A" {{ $room->status == 'A' ? 'selected' : '' }}>Available</option>
                                <option value="B" {{ $room->status == 'B' ? 'selected' : '' }}>Booked</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
