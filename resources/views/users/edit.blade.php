@extends('layouts.app')
@section('content')
<h1 class="text-center">@lang('Edit User')</h1>
@if(session()->has('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}
    <div class="form-group col-md-8 offset-md-2">
        <input name="name" type="text" value="{{ $user->name }}" class="form-control mt-1">
        <input name="email" type="text" value="{{ $user->email }}" class="form-control mt-1">
        <div class="form-check">
            @foreach($roles as $id => $name)
                <label class="form-check-label">
                    <input name="roles[]"
                            type="checkbox"
                            value="{{ $id }}"
                            class="form-check-input"
                            {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}>
                    {{ __($name) }}
                </label>
                <br>
            @endforeach
        </div>
        <hr>
        <button type="submit" class="btn btn-primary float-right mt-1">
            @lang('Update')
        </button>
    </div>
</form>
@endsection
