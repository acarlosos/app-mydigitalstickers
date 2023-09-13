<fieldset disabled class="mt-5">
    @foreach($model->dates() as $key => $date)
        <div class="row ">
            <div class="col-md-4">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input
                            type="text"
                            id="{{$date}}"
                            name="{{$date}}"
                            value="{{$key}}{{$model->$date ?$model->$date->format('d/m/Y H:i:s') : '--/--/---- 00:00:00'}}"
                            class="form-control"
                            placeholder="Data Cadastro:   --/--/---- 00:00:00"
                        />
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</fieldset>