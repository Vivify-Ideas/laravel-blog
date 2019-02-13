@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
    <h2 class="blog-post-title">Login</h2>

    <form method="POST" action="{{ route('login') }}">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email"/>
            @include('posts.partials.error-message', ['fieldTitle' => 'email'])
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"/>
            @include('posts.partials.error-message', ['fieldTitle' => 'password'])
        </div>

        <div class="form-group">
            @include('posts.partials.error-message', ['fieldTitle' => 'message'])
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

    </form>
@endsection