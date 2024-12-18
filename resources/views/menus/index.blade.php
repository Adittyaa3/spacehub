@extends('layouts.main')

@section('title', 'Menus')

@section('content')
<div class="col-12">
    <!-- Menus Table -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Menus Table</h6>
            <a href="{{ url('menus/create') }}" class="btn btn-sm btn-primary">Create Menu</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Icon</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">URL</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Created At</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0" style="margin-left:20px">{{ $menu->name }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">{{ $menu->icon ?? 'No Icon' }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="margin-left:20px">{{ $menu->url ?? 'No URL' }}</p>
                            </td>
                            <td class="text-center">
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ $menu->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ \Illuminate\Support\Carbon::parse($menu->created_at)->format('d/m/Y') }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
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
