<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Id_postgrado') }}
            {{ Form::text('Id_postgrado', $postgrado->Id_postgrado, ['class' => 'form-control' . ($errors->has('Id_postgrado') ? ' is-invalid' : ''), 'placeholder' => 'Id Postgrado']) }}
            {!! $errors->first('Id_postgrado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
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
            {{ Form::text('categoria', $postgrado->categoria, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoria']) }}
            {!! $errors->first('categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $postgrado->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Id_area') }}
            {{ Form::text('Id_area', $postgrado->Id_area, ['class' => 'form-control' . ($errors->has('Id_area') ? ' is-invalid' : ''), 'placeholder' => 'Id Area']) }}
            {!! $errors->first('Id_area', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>