@extends('layouts.main')

@section('title', 'roles')

@section('content')
<div class="col-12">
    <div class="card mb-4" style="background: linear-gradient(135deg, #ff6b6b, #ff8a8a); border-radius: 8px;">
        <div class="card-header pb-0" style="background-color: #ff6b6b; color: white; border-radius: 8px 8px 0 0;">
            <h6>Edit Role</h6>
        </div>
        <div class="card-body" style="background-color: #f9f9f9; color: #333; border-radius: 0 0 8px 8px;">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label" style="color: #333;">Nama Role</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Masukkan Nama Role" value="{{ old('name', $role->name) }}" required style="background-color: #fff; border: 1px solid #ff6b6b; color: #333; transition: border-color 0.3s;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="form-control-label" style="color: #333;">Description</label>
                            <input class="form-control" id="description" type="text" name="description" placeholder="Masukkan Description" value="{{ old('description', $role->description) }}" style="background-color: #fff; border: 1px solid #ff6b6b; color: #333; transition: border-color 0.3s;">
                        </div>
                    </div>
                </div>
                <!-- Submit Button aligned to the right -->
                <div class="form-group text-end">
                    <button type="submit" class="btn" style="background-color: #ff6b6b; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; transition: background-color 0.3s;">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
