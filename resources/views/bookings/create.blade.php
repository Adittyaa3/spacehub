@extends('layouts.main')

@section('title', 'Create Booking')

@section('content')
<div class="col-12">
    <!-- Form Create -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Create New Booking</h6>
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
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="room_id" class="form-control-label">Room</label>
                            <select class="form-control" id="room_id" name="room_id" required>
                                <option value="">Select Room</option>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_time" class="form-control-label">Start Time</label>
                            <input class="form-control" id="start_time" type="datetime-local" name="start_time" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_time" class="form-control-label">End Time</label>
                            <input class="form-control" id="end_time" type="datetime-local" name="end_time" required>
                        </div>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
