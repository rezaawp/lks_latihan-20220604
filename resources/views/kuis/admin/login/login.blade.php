@extends('login.layout_static')

@section('title')
	LOGIN GURU
@endsection

@section('email/placeholder')
	Email
@endsection

@section('password/placeholder')
	Password
@endsection

@section('action')
	{{ route('guru.auth') }}
@endsection