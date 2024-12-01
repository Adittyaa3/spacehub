@extends('layouts.main')

@section('title', 'Payment')

@section('content')
<div class="col-12">
    <!-- Form Payment -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Payment for Booking</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="room_name" class="form-control-label">Room Name</label>
                            <input class="form-control" id="room_name" type="text" value="{{ $booking->room_name }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount" class="form-control-label">Amount</label>
                            <input class="form-control" id="amount" type="number" name="amount" value="{{ $booking->room_price }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-primary">Pay</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
