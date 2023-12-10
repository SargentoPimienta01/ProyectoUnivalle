<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" style="display: none;">
            {{ Form::label('Id_requisito') }}
            {{ Form::text('Id_requisito', $requisitoTramite->Id_requisito, ['class' => 'form-control' . ($errors->has('Id_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Id Requisito']) }}
            {!! $errors->first('Id_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_requisito') }}
            {{ Form::text('nombre_requisito', $requisitoTramite->nombre_requisito, ['class' => 'form-control' . ($errors->has('nombre_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Requisito', 'required' => 'required',]) }}
            {!! $errors->first('nombre_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_requisito') }}
            {{ Form::text('descripcion_requisito', $requisitoTramite->descripcion_requisito, ['class' => 'form-control' . ($errors->has('descripcion_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Requisito', 'required' => 'required',]) }}
            {!! $errors->first('descripcion_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $requisitoTramite->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('Id_tramite') }}
            {{ Form::text('Id_tramite', $requisitoTramite->Id_tramite, ['class' => 'form-control' . ($errors->has('Id_tramite') ? ' is-invalid' : ''), 'placeholder' => 'Id Tramite']) }}
            {!! $errors->first('Id_tramite', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <!--<a href="{{ url('tramites/requisito-tramites/' . $requisitoTramite->Id_tramite) }}" class="btn btn-danger">{{ __('Volver') }}</a>-->
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
            {{ __('Cerrar') }}<span aria-hidden="true"></span>
        </button>
    </div>
</div>