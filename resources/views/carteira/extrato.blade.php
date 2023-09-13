@if(!$AlunoCarteira->count())
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content p-md">
                <h3>Não há movimentações em sua carteira</h3>
            </div>
        </div>
    </div>
</div>
@else


<div class="row  mt-3">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content p-md">
                <h3>{{$Usuario->UsuarioNome}}</h3>
                <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">

                    @php
                        $c = 0;
                    @endphp

                    @foreach ($AlunoCarteira as $dados)
                        @php
                            $c++;
                            switch ($dados->Action) {
                                case 'Compra':
                                    $icon = 'fa fa-usd';
                                    break;
                                case 'Gerado':
                                    $icon = 'fa fa-snowflake-o';
                                    break;
                                case 'Troca':
                                    $icon = 'fa fa-exchange';
                                    break;
                                default:
                                    $icon = 'fa fa-briefcase';
                                    break;
                            }
                        @endphp

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="{{ $icon }}"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                @if ($dados->Action == 'Compra')
                                    <div class="alert alert-warning">
                                        <h5>{{ $dados->Action }}</h5>
                                    </div>
                                @else
                                    <div class="alert alert-success">
                                        <h5>{{ $dados->Action }}</h5>
                                    </div>
                                @endif

                                <p>
                                    <button class="btn-primary dim btn-default-dim" type="button"><i
                                            class="fa fa-dollar"></i>
                                        {{ $dados->QTD }}
                                    </button>
                                </p>
                                <p>
                                    <button class="btn-primary dim btn-default-dim" type="button"><i
                                            class="fa fa-user"></i>&nbsp;&nbsp;
                                        {{ $dados->Aluno ?? $dados->Nome }}
                                    </button>

                                </p>
                                <span class="vertical-date">
                                    <p class="text-info">{{ \Carbon\Carbon::parse($dados->DT)->format('d/m/Y H:i:s') }}
                                    </p>
                                </span>
                            </div>
                        </div>
                    @endforeach
                    @if ($c == 0)
                        <h3>Não há movimentações em sua carteira</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif