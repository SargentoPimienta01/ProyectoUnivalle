<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Id_plataforma_de_atencion') }}
            {{ Form::text('Id_plataforma_de_atencion', $plataformaDeAtencion->Id_plataforma_de_atencion, ['class' => 'form-control' . ($errors->has('Id_plataforma_de_atencion') ? ' is-invalid' : ''), 'placeholder' => 'Id Plataforma De Atencion']) }}
            {!! $errors->first('Id_plataforma_de_atencion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('servicio') }}
            {{ Form::text('servicio', $plataformaDeAtencion->servicio, ['class' => 'form-control' . ($errors->has('servicio') ? ' is-invalid' : ''), 'placeholder' => 'Servicio']) }}
            {!! $errors->first('servicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $plataformaDeAtencion->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $plataformaDeAtencion->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Id_area') }}
            {{ Form::text('Id_area', $plataformaDeAtencion->Id_area, ['class' => 'form-control' . ($errors->has('Id_area') ? ' is-invalid' : ''), 'placeholder' => 'Id Area']) }}
            {!! $errors->first('Id_area', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>