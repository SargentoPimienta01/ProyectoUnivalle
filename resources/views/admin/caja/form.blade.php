<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre_caja') }}
            {{ Form::text('nombre_caja', $caja->nombre_caja, ['class' => 'form-control' . ($errors->has('nombre_caja') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Caja', 'required' => 'required',]) }}
            {!! $errors->first('nombre_caja', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_caja') }}
            {{ Form::text('descripcion_caja', $caja->descripcion_caja, ['class' => 'form-control' . ($errors->has('descripcion_caja') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Caja', 'required' => 'required',]) }}
            {!! $errors->first('descripcion_caja', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado', 'Estado') }}
            <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" required>
                <option value="1" {{ is_null($caja->estado) || old('estado', $caja->estado) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado', $caja->estado) == 0 && !is_null($caja->estado) ? 'selected' : '' }}>Inactivo</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <a href="{{ route('cajas.index') }}" class="btn btn-danger">{{ __('Volver a cajas') }}</a>
    </div>
</div>