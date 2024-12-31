@extends('layouts.inner')

@section('title', 'All users')

@section('content')
    <h1 class="bg-red-500 text-red-50 p-5">All Users..</h1>

    @foreach ($users as $user)
        <div class="p-4 rounded-md shadow-md max-w-screen-md border">
            <h2 class="text-2xl text-center">{{ $user->id }}</h2>

            @if ($user->id % 2 === 0)
                <p>Even USER</p>
            @else
                <p>ODD USER</p>
            @endif

        </div>
    @endforeach
@endsection
