@extends('layouts.inner')

@section('title', $user->name)

@section('content')

<h1>Page {{ $user->name }}</h1>
@endsection
