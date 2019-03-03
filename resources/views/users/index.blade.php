@extends('layouts.app')
@section('content')
<h1>@lang('User List')</h1>
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
                @foreach($user->roles as $role)
                    @lang($role->display_name)
                @endforeach
            </td>
            <td>
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
