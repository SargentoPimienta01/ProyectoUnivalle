<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_ubicacion') }}
            {{ Form::text('nombre_ubicacion', $ubicacion->nombre_ubicacion, ['class' => 'form-control' . ($errors->has('nombre_ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Ubicacion']) }}
            {!! $errors->first('nombre_ubicacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('edificio') }}
            {{ Form::text('edificio', $ubicacion->edificio, ['class' => 'form-control' . ($errors->has('edificio') ? ' is-invalid' : ''), 'placeholder' => 'Edificio']) }}
            {!! $errors->first('edificio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('planta') }}
            {{ Form::text('planta', $ubicacion->planta, ['class' => 'form-control' . ($errors->has('planta') ? ' is-invalid' : ''), 'placeholder' => 'Planta']) }}
            {!! $errors->first('planta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horario') }}
            {{ Form::text('horario', $ubicacion->horario, ['class' => 'form-control' . ($errors->has('horario') ? ' is-invalid' : ''), 'placeholder' => 'Horario']) }}
            {!! $errors->first('horario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('detalles_direccion') }}
            {{ Form::text('detalles_direccion', $ubicacion->detalles_direccion, ['class' => 'form-control' . ($errors->has('detalles_direccion') ? ' is-invalid' : ''), 'placeholder' => 'Detalles Direccion']) }}
            {!! $errors->first('detalles_direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>