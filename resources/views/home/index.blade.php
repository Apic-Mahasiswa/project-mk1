@extends('layouts.main')

@section('title','APIC Smart Ideation Challenge')
    

@section('content')
    <p>This is home page</p>
@endsection

@can('secret')
    <p>This is a special link</p>
@endcan