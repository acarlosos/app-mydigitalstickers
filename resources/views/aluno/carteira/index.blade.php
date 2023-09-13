@extends('layout.app')
@section('content')
<br><br>
<center>
    <div class="box m-2 m-md-4 mt-5 extrato">
        <img src="{{asset('vendor/img/pizza.png')}}" class="spizza">
        Você possui: <br>
        <span>{{$AlunoCarteiraTot}}</span> {{session()->get('EscolaNomeMoeda') ?? 'Stickers'}}
    </div>
    @foreach($AlunoCarteira as $key => $linha)
        <!-- Linha 1 -->

        <div class="d-flex justify-content-center">
            @if($linha->Action != "Compra" )
                <div class="espacoExtrato">
                    <div class="box ganhou m-1 p-3 px-5">
                        <div class="small">{{$linha->Evento}}</div>
                        <div class="grande">{{$linha->QTD}} {{session()->get('EscolaNomeMoeda') ?? 'Stickers'}}</div>
                        <div class="small"><small>{{\Carbon\Carbon::parse($linha->DT)->format('d/m/Y H:i:s')}}</small></div>
                    </div>
                </div>
            @else
                <div class="espacoExtrato"></div>
            @endif
            <div class="linha"></div>
            @if($linha->Action == "Compra" )
                <div class="espacoExtrato">
                    <div class="box resgatou m-1 p-3 px-5">
                        <div class="small">Resgate de presentes</div>
                        <div class="grande">{{$linha->QTD}} {{session()->get('EscolaNomeMoeda') ?? 'Stickers'}}</div>
                        <div class="small"><small>{{\Carbon\Carbon::parse($linha->DT)->format('d/m/Y H:i:s')}}</small></div>
                    </div>
                </div>
            @else
                <div class="espacoExtrato"></div>
            @endif
        </div>
    @endforeach
</center>
<br><br>
@endsection