@extends('layouts.app')

@section('content')
    <login-component csfr_token={{ @csrf_token() }}></login-component>
@endsection
