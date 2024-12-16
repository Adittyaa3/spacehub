@extends('layouts.main')

@section('title', 'Setting')

@section('content')
<div class="container">
    <h1 class="my-4">Menu Role Settings</h1>

    <form action="{{ url('settings') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role" class="font-weight-bold">Select Role:</label>
            <select name="role_id" id="role" class="form-control">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        @foreach ($roles as $role)
        <div class="form-group mt-4">
            <h5 class="font-weight-bold">{{ $role->name }} Menus:</h5>
            <div class="row">
                @foreach ($menus as $menu)
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" name="role_menus[{{ $role->id }}][]" class="form-check-input" value="{{ $menu->id }}"
                            {{ in_array($menu->id, $roleMenus[$role->id] ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $menu->name }}</label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Save Settings</button>
    </form>
</div>
@endsection
