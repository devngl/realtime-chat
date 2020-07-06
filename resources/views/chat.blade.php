@extends('layouts.app')

@section('content')
    <chat-component :contacts=@json($contacts)></chat-component>
@endsection
