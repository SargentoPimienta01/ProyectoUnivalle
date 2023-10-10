<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Id_tramite') }}
            {{ Form::text('Id_tramite', $tramite->Id_tramite, ['class' => 'form-control' . ($errors->has('Id_tramite') ? ' is-invalid' : ''), 'placeholder' => 'Id Tramite']) }}
            {!! $errors->first('Id_tramite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_tramite') }}
            {{ Form::text('nombre_tramite', $tramite->nombre_tramite, ['class' => 'form-control' . ($errors->has('nombre_tramite') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Tramite']) }}
            {!! $errors->first('nombre_tramite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('duracion_tramite') }}
            {{ Form::text('duracion_tramite', $tramite->duracion_tramite, ['class' => 'form-control' . ($errors->has('duracion_tramite') ? ' is-invalid' : ''), 'placeholder' => 'Duracion Tramite']) }}
            {!! $errors->first('duracion_tramite', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_categoria_tramites') }}
            {{ Form::text('id_categoria_tramites', $tramite->id_categoria_tramites, ['class' => 'form-control' . ($errors->has('id_categoria_tramites') ? ' is-invalid' : ''), 'placeholder' => 'Id Categoria Tramites']) }}
            {!! $errors->first('id_categoria_tramites', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $tramite->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>