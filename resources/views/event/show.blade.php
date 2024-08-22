@extends('layouts.app')

@section('content')
    <h2>{{ $event->title }}</h2>
    <!-- <p>{{ $event->description }}</p> -->
    <p>開始日時: {{ $event->held_datetime }}</p>
    <p>終了日時: {{ $event->end_time }}</p>
    <p>場所: {{ $event->held_place }}</p>
@endsection
