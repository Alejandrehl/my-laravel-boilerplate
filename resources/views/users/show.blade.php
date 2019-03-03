@extends('layouts.app')
@section('content')
<h1>{{ $user->name }}</h1>
<table class="table">
    <tr>
        <th>@lang('Name')</th>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th>@lang('E-Mail Address')</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>@lang('Role')</th>
        <td>
            @foreach($user->roles as $role)
                {{ $role->display_name }}
            @endforeach
        </td>
    </tr>
</table>

@can('edit', $user)
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
@endcan

@can('destroy', $user)
<form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
    @csrf
    {{ method_field('DELETE') }}

    <button type="submit" class="btn btn-danger btn-sm text-white">
        Eliminar perfil
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
@endcan

@endsection
