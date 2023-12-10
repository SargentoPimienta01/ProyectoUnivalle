<div class="box box-info padding-1">
    <div class="box-body">
        
        <!--<div class="form-group" style="display: none;">
            {{ Form::label('Id_tramite') }}
            {{ Form::text('Id_tramite', $tramite->Id_tramite, ['class' => 'form-control' . ($errors->has('Id_tramite') ? ' is-invalid' : ''), 'placeholder' => 'Id Tramite']) }}
            {!! $errors->first('Id_tramite', '<div class="invalid-feedback">:message</div>') !!}
        </div>-->
        <div class="form-group">
            {{ Form::label('nombre_tramite') }}
            {{ Form::text('nombre_tramite', $tramite->nombre_tramite, ['class' => 'form-control' . ($errors->has('nombre_tramite') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Tramite', 'required' => 'required',]) }}
            {!! $errors->first('nombre_tramite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('duracion_tramite') }}
            {{ Form::text('duracion_tramite', $tramite->duracion_tramite, ['class' => 'form-control' . ($errors->has('duracion_tramite') ? ' is-invalid' : ''), 'placeholder' => 'Duracion Tramite', 'required' => 'required',]) }}
            {!! $errors->first('duracion_tramite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_categoria_tramites', 'Categoría de Trámites') }}
            <select name="id_categoria_tramites" class="form-control" required>
                @foreach ($categoriasTramites as $categoria)
                    <option value="{{ $categoria->id_categoria_tramites }}">{{ $categoria->nombre_categoria }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('id_ubicacion', 'Ubicaciones') }}
            <select name="id_ubicacion" class="form-control" required>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre_ubicacion }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group" style="display: none;"z>
            {{ Form::label('estado', 'Estado') }}
            <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                <option value="1" {{ is_null($tramite->estado) || old('estado', $tramite->estado) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado', $tramite->estado) == 0 && !is_null($tramite->estado) ? 'selected' : '' }}>Inactivo</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <a href="{{ route('tramites.index') }}" class="btn btn-danger">{{ __('Volver a trámites') }}</a>
    </div>
</div>