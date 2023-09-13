    <div class="form-group">
        <label for="informativo">Escola</label>
        <select class="form-control" name="EscolaID">
            @foreach ($escolas as $escola)
                <option value="{{$escola->EscolaID}}"  {{$informativoacesso->EscolaID == $escola->EscolaID ? 'selected' : ''}} >{{$escola->Escola}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="informativo">Informativo de Acesso</label>
        <input type="text" class="form-control" value="{{$informativoacesso->InformativoAcesso}}"  name="InformativoAcesso" placeholder="Acesso" id="validationCustom01" required >
        <div class="valid-feedback">Tudo certo!</div>
    </div>
    <div class="form-group">
        <label for="dataInicio">Data de Inicio</label>
        <div class="input-group " id="calendarioInicio" >
            <input type="date" class="form-control" value="{{$informativoacesso->InformativoAcessoDTIni ? $informativoacesso->InformativoAcessoDTIni->format('Y-m-d') : ''}}" name="InformativoAcessoDTIni" placeholder="dd/mm/aaaa" id="validationCustom01" required >
            <div class="valid-feedback">Tudo certo!</div>
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="DataFIm">Data do Fim</label>
        <div class="input-group " id="calendarioFim" >
            <input type="date" class="form-control"  value="{{$informativoacesso->InformativoAcessoDTFim ? $informativoacesso->InformativoAcessoDTFim->format('Y-m-d') : ''}}"  name="InformativoAcessoDTFim" placeholder="dd/mm/aaaa" id="validationCustom01" required >
            <div class="valid-feedback">Tudo certo!</div>
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">OK</button>
    </div>