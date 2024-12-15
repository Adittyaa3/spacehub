@extends('layouts.main')

@section('title', 'Rooms')

@section('content')
<div class="col-12">
    <!-- Rooms Table -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Rooms Table</h6>
            <a href="{{ route('rooms.create') }}" class="btn btn-sm btn-primary">Create Room</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Capacity</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0" style="margin-left: 20px">{{ $room->name }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0"style="margin-left: 20px">{{ Str::limit($room->description, 15) }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0"style="margin-left: 20px">{{ $room->capacity }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0"style="margin-left: 20px">{{ $room->price }}</p>
                            </td>
                            <td>
                                @if($room->image)
                                <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" width="50">
                                @endif
                            </td>
                            <td>
                                <p class="text-xs mb-0">{{ $room->status == 'A' ? 'Available' : 'Booked' }}</p>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
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
