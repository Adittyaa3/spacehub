@extends('layouts.main')

@section('title', 'Booking Ruangan')

@section('content')
<div class="col-12">
    <div class="container">
        <h1 class="text-center my-4">Booking Ruangan</h1>
        <div class="row">
            @foreach ($rooms as $room)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">

                <div class="room-card bg-white rounded shadow-sm p-2 h-100 d-flex flex-column">
                    <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="room-image img-fluid rounded mb-2" style="width: 100%; height: auto; aspect-ratio: 1 / 1; object-fit: cover;">
                    <h1 class="room-name">{{ $room->name }}</h1>
                    <p class="room-description text-muted flex-grow-1">{{ Str::limit($room->description, 50) }}</p>
                    <h2 class="room-price">Harga: Rp {{ number_format($room->price, 0, ',', '.') }}</h2>
                    <p class="room-facility small">Fasilitas: {{ $room->facility }}</p>
                    <p class="room-status {{ $room->status == 'A' ? 'text-success' : 'text-danger' }}">
                        Status: {{ $room->status == 'A' ? 'Available' : 'Booked' }}
                    </p>
                    @if($room->status == 'A')
                    <form action="{{ route('bookings.create', $room->id) }}" method="GET" class="mt-auto">
                        @csrf
                        <button type="submit" class="book-button btn btn-success btn-sm">Booking Sekarang</button>
                    </form>
                    @else
                    <button class="btn btn-secondary btn-sm mt-auto" disabled>Booked</button>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .room-card:hover {
        transform: scale(1.05);
    }

    .room-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .room-image {
        width: 100%;
        height: auto; /* Maintain aspect ratio */
        aspect-ratio: 1 / 1; /* Make it 1:1 */
        object-fit: cover;
        border-radius: 8px;
    }

    .room-name {
        font-size: 1.5em;
        margin: 10px 0;
    }

    .room-description {
        color: #555;
        font-size: 0.7em;
        flex-grow: 1; /* Allow description to take available space */
    }

    .room-price {
        font-weight: bold;
        color: #333;
        font-size: 0.9em;
    }

    .room-facility {
        color: #777;
        font-size: 0.8em;
    }

    .room-status {
        font-weight: bold;
        font-size: 0.9em;
    }

    .book-button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-size: 0.8em;
    }

    .book-button:hover {
        background-color: #218838;
    }
</style>
@endsection
