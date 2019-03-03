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
                <td>{{ $user->role }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
