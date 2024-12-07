@extends('layouts.main')

@section('title', 'Edit Booking')

@section('content')
<div class="col-12">
    <!-- Form Edit -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Edit Booking</h6>
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
            <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="room_id" class="form-control-label">Room</label>
                            <select class="form-control" id="room_id" name="room_id" required>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}" {{ $room->id == $booking->room_id ? 'selected' : '' }}>{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_time" class="form-control-label">Start Time</label>
                            <input class="form-control" id="start_time" type="datetime-local" name="start_time" value="{{ $booking->start_time }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_time" class="form-control-label">End Time</label>
                            <input class="form-control" id="end_time" type="datetime-local" name="end_time" value="{{ $booking->end_time }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="form-control-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="P" {{ $booking->status == 'P' ? 'selected' : '' }}>Pending</option>
                                <option value="C" {{ $booking->status == 'C' ? 'selected' : '' }}>Confirmed</option>
                                <option value="D" {{ $booking->status == 'D' ? 'selected' : '' }}>Deleted</option>
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
