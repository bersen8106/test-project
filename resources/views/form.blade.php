@extends('layout')

@section('title', isset($user) ? 'Update '. $user->name : 'Create user')

@section('content')
    <a type="button" class="btn btn-secondary" href="{{ route('users.index') }}">Go Back</a>
    <form class="mt-3" method="POST"
          @if(isset($user))
          action="{{ route('users.update', $user) }}">
    @else
          action="{{ route('users.store') }}">
        @endif
        @isset($user)
            @method('PUT')
            @endisset
        @csrf
        <div class="row">
            <div class="col">
                <input name="name"
                       value="{{ isset($user) ? $user->name : null }}"
                       type="text" class="form-control" placeholder="Name" aria-label="name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input name="email"
                       value="{{ isset($user) ? $user->email : null }}"
                       type="text" class="form-control" placeholder="Email" aria-label="email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>
    </form>
@endsection
