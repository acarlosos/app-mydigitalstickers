@csrf
<fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="RedeID">Rede</label>
                <select class="form-control " name="RedeID" id="RedeID" required onchange="trocarMoeda()">
                    <option value="">Selecione a rede</option>
                    @foreach ( $Redes as $Rede )
                        <option value="{{ $Rede->RedeID }}" {{ $Rede->RedeID == $Escola->RedeID ? 'selected' : '' }}>
                            {{ $Rede->Rede }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="EscolaCod">Cod. Escola</label>
                <input type="text" class="form-control" id="EscolaCod"  name="EscolaCod" value="{{$Escola->EscolaCod ?? old('EscolaCod')}}" placeholder="Cod. Escola" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="Escola">Nome da Escola</label>
                <input type="text" class="form-control" name="Escola" id="Escola" value="{{ $Escola->Escola ?? old('Escola') }}" placeholder="Nome da Escola"  required/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="EscolaCNPJ">Escola CNPJ</label>
                <input type="text" class="form-control" name="EscolaCNPJ" id="campoCNPJ" id="EscolaCNPJ" value="{{$Escola->EscolaCNPJ ?? old('EscolaCNPJ')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="EscolaEmail">Email</label>
                <input type="email" required class="form-control" name="EscolaEmail" id="EscolaEmail" value="{{$Escola->EscolaEmail ?? '' }}" placeholder="E-mail" autocomplete="off" >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="EscolaSenha">Senha Escola</label>
                <input type="text" class="form-control" name="EscolaSenha" placeholder="NOVA@1234"  @if(!$Escola->EscolaSenha) value="NOVA@1234" @endif id="EscolaSenha" autocomplete="off" {{$Escola->EscolaSenha ? ''  : 'required' }}>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="EscolaLogradouro">Logradouro</label>
                <input type="text" class="form-control" name="EscolaLogradouro" id="EscolaLogradouro" value="{{$Escola->EscolaLogradouro ?? old('EscolaLogradouro')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="EscolaNumero">Número</label>
                <input type="text" class="form-control" name="EscolaNumero" id="EscolaNumero" value="{{$Escola->EscolaNumero ?? old('EscolaNumero')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="EscolaComplemento">Complemento</label>
                <input type="text" class="form-control" name="EscolaComplemento" id="EscolaComplemento" value="{{$Escola->EscolaComplemento ?? old('EscolaComplemento')}}" >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="EscolaBairro">Bairro</label>
                <input type="text" class="form-control" name="EscolaBairro" id="EscolaBairro" value="{{$Escola->EscolaBairro ?? old('EscolaBairro')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="EscolaCidade">Cidade</label>
                <input type="text" class="form-control" name="EscolaCidade" id="EscolaCidade" value="{{$Escola->EscolaCidade ?? old('EscolaCidade')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="EscolaUF">UF</label>
                <select class="form-control" name="EscolaUF" id="EscolaUF" required>
                    <option value="">Selecione a UF</option>
                    <option value="RO" {{ $Escola->EscolaUF == 'RO' ? 'selected' : ''}} >RO</option>
                    <option value="AC" {{ $Escola->EscolaUF == 'AC' ? 'selected' : ''}} >AC</option>
                    <option value="AM" {{ $Escola->EscolaUF == 'AM' ? 'selected' : ''}} >AM</option>
                    <option value="RR" {{ $Escola->EscolaUF == 'RR' ? 'selected' : ''}} >RR</option>
                    <option value="PA" {{ $Escola->EscolaUF == 'PA' ? 'selected' : ''}} >PA</option>
                    <option value="AP" {{ $Escola->EscolaUF == 'AP' ? 'selected' : ''}} >AP</option>
                    <option value="TO" {{ $Escola->EscolaUF == 'TO' ? 'selected' : ''}} >TO</option>
                    <option value="MA" {{ $Escola->EscolaUF == 'MA' ? 'selected' : ''}} >MA</option>
                    <option value="PI" {{ $Escola->EscolaUF == 'PI' ? 'selected' : ''}} >PI</option>
                    <option value="CE" {{ $Escola->EscolaUF == 'CE' ? 'selected' : ''}} >CE</option>
                    <option value="RN" {{ $Escola->EscolaUF == 'RN' ? 'selected' : ''}} >RN</option>
                    <option value="PB" {{ $Escola->EscolaUF == 'PB' ? 'selected' : ''}} >PB</option>
                    <option value="PE" {{ $Escola->EscolaUF == 'PE' ? 'selected' : ''}} >PE</option>
                    <option value="AL" {{ $Escola->EscolaUF == 'AL' ? 'selected' : ''}} >AL</option>
                    <option value="SE" {{ $Escola->EscolaUF == 'SE' ? 'selected' : ''}} >SE</option>
                    <option value="BA" {{ $Escola->EscolaUF == 'BA' ? 'selected' : ''}} >BA</option>
                    <option value="MG" {{ $Escola->EscolaUF == 'MG' ? 'selected' : ''}} >MG</option>
                    <option value="ES" {{ $Escola->EscolaUF == 'ES' ? 'selected' : ''}} >ES</option>
                    <option value="RJ" {{ $Escola->EscolaUF == 'RJ' ? 'selected' : ''}} >RJ</option>
                    <option value="SP" {{ $Escola->EscolaUF == 'SP' ? 'selected' : ''}} >SP</option>
                    <option value="PR" {{ $Escola->EscolaUF == 'PR' ? 'selected' : ''}} >PR</option>
                    <option value="SC" {{ $Escola->EscolaUF == 'SC' ? 'selected' : ''}} >SC</option>
                    <option value="RS" {{ $Escola->EscolaUF == 'RS' ? 'selected' : ''}} >RS</option>
                    <option value="MS" {{ $Escola->EscolaUF == 'MS' ? 'selected' : ''}} >MS</option>
                    <option value="MT" {{ $Escola->EscolaUF == 'MT' ? 'selected' : ''}} >MT</option>
                    <option value="GO" {{ $Escola->EscolaUF == 'GO' ? 'selected' : ''}} >GO</option>
                    <option value="DF" {{ $Escola->EscolaUF == 'DF' ? 'selected' : ''}} >DF</option>
                </select>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="EscolaCep">Cep</label>
                <input type="text" class="form-control" name="EscolaCep" id="EscolaCep" value="{{ $Escola->EscolaCep ?? old('EscolaCep')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="EscolaValorFixo">Valor Fixo</label>
                <input type="text" class="form-control" name="EscolaValorFixo" id="EscolaValorFixo" value="{{$Escola->EscolaValorFixo ?? old('EscolaValorFixo')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="EscolaValorVaviavel">Valor Vaviável</label>
                <input type="text" class="form-control" name="EscolaValorVaviavel" id="EscolaValorVaviavel" value="{{$Escola->EscolaValorVaviavel ?? old('EscolaValorVaviavel')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="EscolaDiaVencimento">Dia Vencimento</label>
                <input type="number" class="form-control"  min="1" max="31" name="EscolaDiaVencimento" id="EscolaDiaVencimento" value="{{$Escola->EscolaDiaVencimento ?? old('EscolaDiaVencimento')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="EscolaDTExpiracao">Data Expiração</label>
                <input type="date" class="form-control"  name="EscolaDTExpiracao" id="EscolaDTExpiracao" value="{{$Escola->EscolaDTExpiracao ? $Escola->EscolaDTExpiracao->format('Y-m-d') : old('EscolaDTExpiracao')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="EscolaTelefone">Telefone</label>
                <input type="text" class="form-control"  name="EscolaTelefone" id="EscolaTelefone" value="{{ mascaraTelefone($Escola->EscolaTelefone) ?? old('EscolaTelefone')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="EscolaCelular">Celular</label>
                <input type="text" class="form-control"  name="EscolaCelular" id="EscolaCelular" value="{{ mascaraTelefone($Escola->EscolaCelular) ?? old('EscolaCelular')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="EscolaCelularPix">Email para cobrança</label>
                <input required type="email" class="form-control"  name="EscolaCelularPix" id="EscolaCelularPix" value="{{$Escola->EscolaCelularPix ?? ''  }}" >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="EscolaNomeMoeda">Nome Moeda Escola</label>
                <input type="text" class="form-control"  name="EscolaNomeMoeda" id="EscolaNomeMoeda" value="{{$Escola->EscolaNomeMoeda ?? old('EscolaNomeMoeda')}}" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="EscolaStatus">Status</label>
                <select class="form-control" name="EscolaStatus" id="EscolaStatus">
                    <option value="1" {{$Escola->EscolaStatus == 1 ? 'selected' : ''}}>Ativo</option>
                    <option value="2" {{$Escola->EscolaStatus == 2 ? 'selected' : ''}}>Inativo</option>
                    <option value="3" {{$Escola->EscolaStatus == 3 ? 'selected' : ''}}>Bloqueado</option>
                    <option value="4" {{$Escola->EscolaStatus == 4 ? 'selected' : ''}}>Prospect</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="EscolaMotivoBloqueio">Motivo Bloqueio</label>
                <input type="text" class="form-control"  name="EscolaMotivoBloqueio" id="EscolaMotivoBloqueio" value="{{$Escola->EscolaMotivoBloqueio ?? old('EscolaMotivoBloqueio')}}" >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
        </div>
    </div>

</fieldset>

<script>
    function trocarMoeda() {
        const field = 'EscolaNomeMoeda';
        const source = 'RedeID';
        const redes = {!! json_encode($Redes->toArray())!!}


        d = document.getElementById(source).value;
        var element = redes.filter(item => item.RedeID == d);
        document.getElementById(field).value = element[0]? element[0].RedeNomeMoeda : '';
    }
</script>