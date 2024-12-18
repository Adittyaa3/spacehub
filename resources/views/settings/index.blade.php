@extends('layouts.main')

@section('title', 'Setting')

@section('content')
<div class="container">
    <h1 class="my-4">Menu Role Settings</h1>

    <!-- Form to update role-menu settings -->
    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <div class="row">
            @foreach($roles as $role)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">{{ $role->name }}</h5>
                        </div>
                        <div class="card-body">
                            @foreach($menus as $menu)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       name="role_menu[{{ $role->id }}][]"
                                       value="{{ $menu->id }}"
                                       @if(isset($roleMenus[$role->id]) && $roleMenus[$role->id]->contains('menu_id', $menu->id)) checked @endif>
                                <label class="form-check-label" for="role_menu_{{ $role->id }}_{{ $menu->id }}">
                                    {{ $menu->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Submit button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
