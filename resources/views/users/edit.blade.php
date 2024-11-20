@extends('layouts.main')

@section('title', 'Edit User')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Edit User</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Enter Name" value="{{ old('name', $user->name) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email</label>
                            <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="form-control-label">Password (leave blank if not changing)</label>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number" class="form-control-label">Phone Number</label>
                            <input class="form-control" id="phone_number" type="text" name="phone_number" placeholder="Enter Phone Number" value="{{ old('phone_number', $user->phone_number) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="institution" class="form-control-label">Institution</label>
                            <input class="form-control" id="institution" type="text" name="institution" placeholder="Enter Institution" value="{{ old('institution', $user->institution) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imageProfil" class="form-control-label">Image Profile</label>
                            <input class="form-control" id="imageProfil" type="text" name="imageProfil" placeholder="Enter Image Profile" value="{{ old('imageProfil', $user->imageProfil) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role_id" class="form-control-label">Role</label>
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
