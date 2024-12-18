@extends('layouts.main')

@section('title', 'Create Booking')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <button type="button" class="btn btn-info btn btn-danger" data-bs-toggle="modal" data-bs-target="#bookedRoomsModal">
                View room has booked
            </button>
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
                            <label for="room_id" class="form-control-label">Select Room</label>
                            <select class="form-control" id="room_id" name="room_id" required onchange="updateRoomDetails()">
                                <option value="">Choose a room...</option>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}"
                                            data-price="{{ $room->price }}"
                                            data-capacity="{{ $room->capacity }}"
                                            data-facility="{{ $room->facility }}">
                                        {{ $room->name }} - Capacity: {{ $room->capacity }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Room Details</label>
                            <div id="roomDetails" class="form-control bg-light">
                                Please select a room
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_time" class="form-control-label">Start Time</label>
                            <input class="form-control" id="start_time" type="datetime-local" name="start_time" required onchange="calculatePrice()">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_time" class="form-control-label">End Time</label>
                            <input class="form-control" id="end_time" type="datetime-local" name="end_time" required onchange="calculatePrice()">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="form-control-label">Total Price</label>
                            <input class="form-control" id="price" type="text" name="price" readonly required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Create Booking</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="bookedRoomsModal" tabindex="-1" aria-labelledby="bookedRoomsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookedRoomsModalLabel">Booked Rooms</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach($bookedRooms as $booking)
                    <li class="list-group-item">
                        <h6 class="mb-1">Room: {{ $booking->room->name }}</h6>
                        <p class="mb-1" style="color: red">Start Time: {{ $booking->start_time }}</p>
                        <p class="mb-1" style="color: red">End Time: {{ $booking->end_time }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    function updateRoomDetails() {
        const select = document.getElementById('room_id');
        const details = document.getElementById('roomDetails');
        const priceInput = document.getElementById('price');

        if (select.value) {
            const option = select.options[select.selectedIndex];
            const price = option.dataset.price;
            const capacity = option.dataset.capacity;
            const facility = option.dataset.facility;

            details.innerHTML = `
                <strong>Price per Hour:</strong> Rp ${new Intl.NumberFormat('id-ID').format(price)}<br>
                <strong>Capacity:</strong> ${capacity} people<br>
                <strong>Facilities:</strong> ${facility}
            `;

            // Clear price input
            priceInput.value = '';
        } else {
            details.innerHTML = 'Please select a room';
            priceInput.value = '';
        }
    }

    function calculatePrice() {
        const roomSelect = document.getElementById('room_id');
        const startTimeInput = document.getElementById('start_time');
        const endTimeInput = document.getElementById('end_time');
        const priceInput = document.getElementById('price');

        if (roomSelect.value && startTimeInput.value && endTimeInput.value) {
            const roomPrice = roomSelect.options[roomSelect.selectedIndex].dataset.price;
            const startTime = new Date(startTimeInput.value);
            const endTime = new Date(endTimeInput.value);

            // Calculate duration in hours
            const duration = (endTime - startTime) / 1000 / 60 / 60;

            if (duration > 0) {
                const totalPrice = roomPrice * duration;
                priceInput.value = totalPrice;
            } else {
                priceInput.value = '';
            }
        } else {
            priceInput.value = '';
        }
    }
</script>
@endsection
@endsection
