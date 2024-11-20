@extends('layouts.main')

@section('title', 'Users')

@section('content')
<div class="col-12">
    <!-- Users Table -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Users Table</h6>
            <a href="{{ url('users/create') }}" class="btn btn-sm btn-primary">create User</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Created At</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0" style="margin-left:20px">{{ $user->name }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">{{ $user->email }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">{{ $user->role_name ?? 'No role' }}</p>
                            </td>
                            <td class="text-center">
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ \Illuminate\Support\Carbon::parse($user->created_at)->format('d/m/Y') }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
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
