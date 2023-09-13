@extends('errors::minimal')

@section('title', __('Erro interno'))
@section('code', '500')
@section('message')
    <p>
        Houve um erro interno.<br />
    </p>
@endsection
