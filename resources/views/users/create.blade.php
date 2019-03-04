@extends('layouts.app')
@section('content')
<h1 class="text-center">
    @lang('Create user')
</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    {{ method_field('POST') }}
    <div class="form-group col-md-8 offset-md-2">
        <input name="name" type="text" value="" class="form-control mt-1" placeholder="{{ __('Name') }}">
        {{ $errors->first('name', ':message') }}
        <input name="email" type="text" value="" class="form-control mt-1" placeholder="{{ __('E-Mail Address') }}">
        {{ $errors->first('email', ':message') }}
        <input name="password" type="password" value="" class="form-control mt-1" placeholder="{{ __('Password') }}">
        {{ $errors->first('password', ':message') }}
        <input name="password_confirmation" type="password" value="" class="form-control mt-1" placeholder="{{ __('Confirm Password') }}">
        {{ $errors->first('password_confirmation', ':message') }}
        <div class="form-check">
            @foreach($roles as $id => $name)
                <label class="form-check-label">
                    <input name="roles[]"
                            type="checkbox"
                            value="{{ $id }}"
                            class="form-check-input">
                    {{ __($name) }}
                </label>
                <br>
            @endforeach
            {{ $errors->first('roles', ':message') }}
        </div>
        <hr>
        <button type="submit" class="btn btn-primary float-right mt-1">
            @lang('Create user')
        </button>
    </div>
</form>
@endsection
