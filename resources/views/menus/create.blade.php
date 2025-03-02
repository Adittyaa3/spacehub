@extends('layouts.main')

@section('title', 'Create Menu')

@section('content')
<div class="col-12">
    <!-- Form Create -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Create New Menu</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('menus.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Enter Menu Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="icon" class="form-control-label">Icon</label>
                            <input class="form-control" id="icon" type="text" name="icon" placeholder="Enter Icon (optional)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url" class="form-control-label">URL</label>
                            <input class="form-control" id="url" type="text" name="url" placeholder="Enter URL (optional)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="parent_id" class="form-control-label">Parent Menu</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">No Parent</option>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="form-control-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
