<!-- resources/views/tables.blade.php -->
@extends('layouts.main')

@section('title', 'roles')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Edit Role</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama Role</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Masukkan Nama Role" value="{{ old('name', $role->name) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <input class="form-control" id="description" type="text" name="description" placeholder="Masukkan Description" value="{{ old('description', $role->description) }}">
                        </div>
                    </div>
                </div>
                <!-- Submit Button aligned to the right -->
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
