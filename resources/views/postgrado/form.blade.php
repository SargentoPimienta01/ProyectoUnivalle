<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre_programa') }}
            {{ Form::text('nombre_programa', $postgrado->nombre_programa, ['class' => 'form-control' . ($errors->has('nombre_programa') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Programa']) }}
            {!! $errors->first('nombre_programa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $postgrado->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modalidad') }}
            {{ Form::text('modalidad', $postgrado->modalidad, ['class' => 'form-control' . ($errors->has('modalidad') ? ' is-invalid' : ''), 'placeholder' => 'Modalidad']) }}
            {!! $errors->first('modalidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria') }}
            {{ Form::select('categoria', [
                'diplomado' => 'Diplomado',
                'maestria' => 'Maestría',
                'doctorado' => 'Doctorado'
            ], isset($postgrado) ? strtolower($postgrado->categoria) : null, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona la categoría']) }}
            {!! $errors->first('categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="1" {{ (isset($postgrado) && $postgrado->estado == 1) ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ (isset($postgrado) && $postgrado->estado == 0) ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <a class="btn btn-danger" href="{{ route('postgrados.index') }}"> {{ __('Volver') }}</a>
    </div>
</div>