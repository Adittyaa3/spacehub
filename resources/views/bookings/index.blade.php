@extends('layouts.main')

@section('title', 'Bookings')

@section('content')
<div class="col-12">
    <!-- Bookings Table -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Bookings Table</h6>
            <a href="{{ route('bookings.create') }}" class="btn btn-sm btn-primary">Create Booking</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Room Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start Time</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">End Time</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0" style="margin-left:20px">{{ $booking->room_name }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">{{ $booking->user_name }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">{{ $booking->start_time }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">{{ $booking->end_time }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">
                                    @if ($booking->status == 'P')
                                        Pending
                                    @elseif ($booking->status == 'C')
                                        Confirmed
                                    @elseif ($booking->status == 'D')
                                        Deleted
                                    @elseif ($booking->status == 'F')
                                        Finished
                                    @endif
                                </p>
                            </td>
                            <td class="text-center">
                                @if ($booking->status == 'P')
                                    <a href="{{ route('payments.create', $booking->id) }}" class="btn btn-sm btn-success">Pay</a>
                                @endif
                                @if ($booking->status != 'F')
                                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
