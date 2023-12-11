<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" style="display: none;">
            {{ Form::label('id_categoria_tramites') }}
            {{ Form::text('id_categoria_tramites', $categoriaTramite->id_categoria_tramites, ['class' => 'form-control' . ($errors->has('id_categoria_tramites') ? ' is-invalid' : ''), 'placeholder' => 'Id Categoria Tramites']) }}
            {!! $errors->first('id_categoria_tramites', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_categoria') }}
            {{ Form::text('nombre_categoria', $categoriaTramite->nombre_categoria, ['class' => 'form-control' . ($errors->has('nombre_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Categoria', 'required' => 'required',]) }}
            {!! $errors->first('nombre_categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('estado') }}
            {{ Form::text('estado', old('estado', $categoriaTramite->estado ?? 1), ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('Id_area') }}
            {{ Form::text('Id_area', $categoriaTramite->Id_area, ['class' => 'form-control' . ($errors->has('Id_area') ? ' is-invalid' : ''), 'placeholder' => 'Id Area']) }}
            {!! $errors->first('Id_area', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
            {{ __('Cerrar') }}<span aria-hidden="true"></span>
        </button>
    </div>
</div>