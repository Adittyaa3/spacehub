@extends('layouts.main')

@section('title', 'Edit Menu')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Edit Menu</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Enter Menu Name" value="{{ old('name', $menu->name) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="icon" class="form-control-label">Icon</label>
                            <input class="form-control" id="icon" type="text" name="icon" placeholder="Enter Icon (optional)" value="{{ old('icon', $menu->icon) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url" class="form-control-label">URL</label>
                            <input class="form-control" id="url" type="text" name="url" placeholder="Enter URL (optional)" value="{{ old('url', $menu->url) }}">
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="parent_id" class="form-control-label">Parent Menu</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">No Parent</option>
                                @foreach($menus as $parentMenu)
                                    <option value="{{ $parentMenu->id }}" {{ $parentMenu->id == $menu->parent_id ? 'selected' : '' }}>
                                        {{ $parentMenu->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="form-control-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1" {{ $menu->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $menu->status == '0' ? 'selected' : '' }}>Inactive</option>
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
