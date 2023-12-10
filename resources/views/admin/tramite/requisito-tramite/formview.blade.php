<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group" style="display: none;">
            {{ Form::label('Id_requisito') }}
            {{ Form::text('Id_requisito', null, ['class' => 'form-control', 'placeholder' => 'Id Requisito']) }}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_requisito') }}
            {{ Form::text('nombre_requisito', $requisitoTramite->nombre_requisito, ['class' => 'form-control' . ($errors->has('nombre_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Detalle de requisito', 'required' => 'required',]) }}
            {!! $errors->first('nombre_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_requisito') }}
            {{ Form::text('descripcion_requisito', $requisitoTramite->descripcion_requisito, ['class' => 'form-control' . ($errors->has('descripcion_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Requisito', 'required' => 'required',]) }}
            {!! $errors->first('descripcion_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('estado') }}
            {{ Form::text('estado', 1, ['class' => 'form-control', 'placeholder' => 'Estado']) }}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('Id_tramite') }}
            {{ Form::text('Id_tramite', $id_tramite, ['class' => 'form-control', 'placeholder' => 'Id Tramite']) }}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
            {{ __('Cerrar') }}<span aria-hidden="true"></span>
        </button>
    </div>
</div>
