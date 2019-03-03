@extends('layouts.app')
@section('content')
<h1 class="text-center">@lang('Edit User')</h1>
<form action="{{ route('users.update', $user->id) }}">
    @csrf
    {{ method_field('PUT') }}
    <div class="form-group col-md-8 offset-md-2">
        <input name="name" type="text" value="{{ $user->name }}" class="form-control mt-1">
        <input name="email" type="text" value="{{ $user->email }}" class="form-control mt-1">
        {{-- <input name="password" type="text" class="form-control mt-1" placeholder="************"> --}}
        <button type="submit" class="btn btn-primary float-right mt-1">
            @lang('Update')
        </button>
    </div>
</form>
@endsection
