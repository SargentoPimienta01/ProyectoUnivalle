<div class="box box-info padding-1">
    <div class="box-body">
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
            {{ Form::label('requisitos') }}
            {{ Form::textArea('requisitos', $plataformaDeAtencion->requisitos, ['class' => 'form-control' . ($errors->has('requisitos') ? ' is-invalid' : ''), 'placeholder' => 'Requisitos']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!--<div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="1" {{ (isset($plataformaDeAtencion) && $plataformaDeAtencion->estado == 1) ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ (isset($plataformaDeAtencion) && $plataformaDeAtencion->estado == 0) ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>-->
    </div>
    <div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <a class="btn btn-danger" href="{{ route('plataforma-de-atencions.index') }}"> {{ __('Volver') }}</a>
    </div>
</div>