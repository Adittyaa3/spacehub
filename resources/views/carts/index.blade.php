@extends('layouts.main')

@section('title', 'Cart')

@section('content')
<div class="col-12">
    <!-- Cart Table -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Cart</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Room Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Capacity</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0" style="margin-left:20px">{{ $item->name }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">{{ $item->description }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">{{ $item->capacity }}</p>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('carts.remove', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                <form action="{{ route('carts.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
