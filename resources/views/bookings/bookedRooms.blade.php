@extends('layouts.main')

@section('title', 'Booked Rooms')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Booked Rooms</h6>
            <form method="GET" action="{{ route('bookings.bookedRooms') }}">
                <div class="input-group">
                    <select name="category_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
        <div class="card-body pt-4 p-3">
            <ul class="list-group">
                @foreach($bookings as $booking)
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Room: {{ $booking->room->name }}</h6>
                        <span class="mb-2 text-xs">Category: <span class="text-dark font-weight-bold ms-sm-2">{{ $booking->room->category->name }}</span></span>
                        <span class="mb-2 text-xs">Start Time: <span class="text-dark font-weight-bold ms-sm-2">{{ $booking->start_time }}</span></span>
                        <span class="mb-2 text-xs">End Time: <span class="text-dark font-weight-bold ms-sm-2">{{ $booking->end_time }}</span></span>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
