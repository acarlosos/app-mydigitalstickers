@if(!$EscolaAlunoCarteira->count())
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
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
<div class="row  mt-3">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content p-md">
                <h3> <span >Saldo: {{$EscolaAlunoCarteiraTot}}</span></h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>
                                    Usuário
                                </th>
                                <th>
                                    Evento
                                </th>
                                <th>
                                    Operação
                                </th>
                                <th class="text-center">
                                    Valor
                                </th>
                                <th>
                                    Data
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($EscolaAlunoCarteira as $dados)
                                <tr  class="{{$dados->Action == 'Repasse' ?  'text-danger' : ''}} ">
                                    <td>
                                        @if($dados->Action == 'Repasse')
                                            {{$dados->UsuarioID}}
                                        @else
                                            {{$dados->Aluno}}
                                        @endif
                                    </td>
                                    <td>
                                        {{$dados->Evento}}
                                    </td>
                                    <td>
                                        {{$dados->Action}}
                                    </td>
                                    <td class="text-center">
                                        {{ $dados->Action == 'Repasse' ?   floatval(-$dados->QTD) : floatval($dados->QTD)}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($dados->DT)->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endif

@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>

    <script src="{{ url('js/plugins/dataTables/datatables.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ url('js/inspinia.js') }}"></script>
    <script src="{{ url('js/plugins/pace/pace.min.js') }}"></script>

    <!-- Page-Level Scripts -->
    <script>

        // Upgrade button class name
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                columns:
                [
                    null,
                    null,
                    null,
                    { "type": "num" },
                    { "type": "date" }
                ],
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Usuario'},
                    {extend: 'pdf', title: 'Usuario'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
@endsection