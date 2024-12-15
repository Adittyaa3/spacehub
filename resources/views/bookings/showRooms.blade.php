@extends('layouts.main')

@section('title', 'Booking Ruangan')

@section('content')
<div class="col-12">
    <div class="container">
        <h1 class="text-center my-4">Booking Ruangan</h1>
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="room-card bg-white rounded shadow-sm p-2 h-100 d-flex flex-column">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="room-image img-fluid rounded mb-2" style="width: 100%; height: auto; aspect-ratio: 1 / 1; object-fit: cover;">
                    <h1 class="room-name">{{ $category->name }}</h1>
                    <p class="room-description text-muted flex-grow-1">{{ Str::limit($category->description, 50) }}</p>
                    <p class="room-facility small">Fasilitas: {{ $category->facility }}</p>
                    <a href="{{ route('bookings.create', ['category_id' => $category->id]) }}" class="book-button btn btn-success btn-sm mt-auto">Booking Sekarang</a>
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

    .room-facility {
        color: #777;
        font-size: 0.8em;
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
