@extends('layouts.app')

@section('content')
    <chat-component
            :contacts=@json($contacts)
            :user-id=@json(Auth::user()->getKey())
    ></chat-component>
@endsection
