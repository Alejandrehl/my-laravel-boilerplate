@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1>@lang('User List')</h1>
    <a href="{{ route('users.create') }}" class="btn btn-info text-white mb-1">
        <i class="fas fa-plus"></i>
        @lang('Create user')
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>@lang('Name')</th>
            <th>@lang('E-Mail Address')</th>
            <th>@lang('Role')</th>
            <th>@lang('Actions')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                {{ __($user->roles->pluck('display_name')->implode(' - ')) }}
            </td>
            <td>
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm text-white">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm text-white">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger btn-sm text-white">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
