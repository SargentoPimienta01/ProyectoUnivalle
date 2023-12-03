<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_naf') }}
            {{ Form::text('nombre_naf', $naf->nombre_naf, ['class' => 'form-control' . ($errors->has('nombre_naf') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Naf']) }}
            {!! $errors->first('nombre_naf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $naf->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción Naf']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_ubicacion', 'Ubicaciones') }}
            <select name="id_ubicacion" class="form-control">
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre_ubicacion }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('estado', 'Estado') }}
            <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                <option value="1" {{ $naf->estado == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $naf->estado == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <a href="{{ route('nafs.index') }}" class="btn btn-danger">{{ __('Volver a Nafs') }}</a>
    </div>
</div>