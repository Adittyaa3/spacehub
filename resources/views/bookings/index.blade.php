@extends('layouts.main')

@section('title', 'Bookings')

@section('content')
<div class="col-md-7 mt-4">
    <div class="card">
        <div class="card-header pb-0 px-3 d-flex justify-content-between">
            <h6 class="mb-0">Bookings Table</h6>
            <a href="{{ route('bookings.showRooms') }}" class="btn btn-primary btn-sm">Create Booking</a>
        </div>
        <div class="card-body pt-4 p-3">
            <ul class="list-group">
                @foreach($bookings as $booking)
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Room: {{ $booking->room->name }}</h6>
                        <span class="mb-2 text-xs">User Name: <span class="text-dark font-weight-bold ms-sm-2">{{ $booking->user->name }}</span></span>
                        <span class="mb-2 text-xs">Start Time: <span class="text-dark font-weight-bold ms-sm-2">{{ $booking->start_time }}</span></span>
                        <span class="mb-2 text-xs">End Time: <span class="text-dark font-weight-bold ms-sm-2">{{ $booking->end_time }}</span></span>
                        <span class="mb-2 text-xs">Price: <span class="text-dark font-weight-bold ms-sm-2">{{ $booking->price }}</span></span>
                        <span class="text-xs">Status: <span class="text-dark font-weight-bold ms-sm-2">
                            @if ($booking->status == 'P')
                                Pending
                            @elseif ($booking->status == 'C')
                                Confirmed
                            @elseif ($booking->status == 'D')
                                Deleted
                            @elseif ($booking->status == 'F')
                                Finished
                            @endif
                        </span></span>
                    </div>
                    <div class="ms-auto text-end">
                        @if ($booking->status == 'P')
                            <a href="{{ route('payments.create', $booking->id) }}" class="btn btn-sm btn-success">Pay</a>
                        @endif
                        @if ($booking->status != 'F')
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                @if ($booking->status == 'P')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Cancel</button>

                                @endif 
                            </form>
                        @endif
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
