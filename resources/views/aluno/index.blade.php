@extends('layout.app')
@section('content')
<br><br>
<div class="d-flex align-items-center justify-content-center text-center">
    <div class="box m-2 m-md-4 mt-5 resgate">
        <div>Conquiste</div>
        <div style="font-size: 40px;line-height: 40px;color: #b721dc;font-weight: 900;">{{session()->get('EscolaNomeMoeda') ?? 'Stickers'}}</div>
        <div>e troque-os por presentes muito legais!</div>
        <br>

        <img src="{{asset('vendor/img/pandaFeliz.png')}}" class="pandaFeliz">

    </div>
</div>
@endsection