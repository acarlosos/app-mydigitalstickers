@extends('layout.app')
@section('content')
<br><br>
<div class="d-flex align-items-center justify-content-center text-center">
    <div class="box m-2 m-md-4 mt-5 resgate">
        <img src="{{asset('vendor/img/nutela.png')}}" class="snutela">
        <img src="{{asset('vendor/img/cacto.png')}}" class="scatco">
        <img src="{{asset('vendor/img/pandaFeliz.png')}}" class="pandaFeliz">

        <div class="eba mt-3">Ebaaaa!!!</div>
        <div>Troca realizada com sucesso!</div>
        <br><br>
        <a href="{{route('home')}}" class="bt mt-4">OK</a>
    </div>
</div>
@endsection