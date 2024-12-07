@extends('layouts.main')

@section('title', 'Create Booking')

@section('content')
<div class="col-12">
    <!-- Form Create Booking -->
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
                <input type="hidden" name="room_id" value="{{ $room->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="room_name" class="form-control-label">Room</label>
                            <input class="form-control" id="room_name" type="text" value="{{ $room->name }}" readonly>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="form-control-label">Price</label>
                            <input class="form-control" id="price" type="text" name="price" readonly>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const startTimeInput = document.getElementById('start_time');
    const endTimeInput = document.getElementById('end_time');
    const priceInput = document.getElementById('price');
    const roomPrice = {{ $room->price }};

    function calculatePrice() {
        const startTime = new Date(startTimeInput.value);
        const endTime = new Date(endTimeInput.value);

        if (startTime && endTime && endTime > startTime) {
            const duration = (endTime - startTime) / (1000 * 60 * 60); // Duration in hours
            const price = roomPrice * duration;
            priceInput.value = price.toFixed(2);
        } else {
            priceInput.value = '';
        }
    }

    startTimeInput.addEventListener('change', calculatePrice);
    endTimeInput.addEventListener('change', calculatePrice);
});
</script>
@endsection
