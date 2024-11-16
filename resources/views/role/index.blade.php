<!-- resources/views/tables.blade.php -->
@extends('layouts.main')

@section('title', 'roles')

@section('content')
<div class="col-12">
    <!-- Form Create -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Create New Role</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama Role</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Masukkan Nama Role" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <input class="form-control" id="description" type="text" name="description" placeholder="Enter Description">
                        </div>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Roles Table -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Roles Table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Created At</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0" style="margin-left:20px">{{ $role->name }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">{{ $role->description ?? 'No description' }}</p>
                            </td>
                            <td class="text-center">
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ \Illuminate\Support\Carbon::parse($role->created_at)->format('d/m/Y') }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
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
