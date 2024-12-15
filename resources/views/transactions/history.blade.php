@extends('layouts.main')

@section('title', 'Transaction History')

@section('content')
<div class="col-md-7 mt-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Transaction History</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <ul class="list-group">
                @foreach($transactions as $transaction)
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Room: {{ $transaction->room_name }}</h6>
                        <span class="mb-2 text-xs">Booking Number: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->id }}</span></span>
                        <span class="mb-2 text-xs">Start Time: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->start_time }}</span></span>
                        <span class="mb-2 text-xs">End Time: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->end_time }}</span></span>
                        <span class="mb-2 text-xs">Price: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->price }}</span></span>
                        <span class="mb-2 text-xs">Payment Type: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->payment_type }}</span></span>
                        <span class="mb-2 text-xs">Payment Amount: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->amount }}</span></span>
                        <span class="text-xs">Payment Status: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->payment_status }}</span></span>
                    </div>

                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
