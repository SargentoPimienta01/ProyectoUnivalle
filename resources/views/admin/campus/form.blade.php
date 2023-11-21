<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre', __('Nombre')) }}
            {{ Form::text('nombre', $campus->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => __('Nombre')]) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora', __('Hora')) }}
            {{ Form::time('hora', $campus->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => __('Hora')]) }}
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha', __('Fecha')) }}
            {{ Form::date('fecha', $campus->fecha ? \Carbon\Carbon::parse($campus->fecha)->format('Y-m-d') : null, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => __('Fecha'), 'min' => now()->addDay()->format('Y-m-d')]) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado', __('Estado')) }}
            {{ Form::select('estado', [1 => __('Activo'), 0 => __('Inactivo')], $campus->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
        <a href="{{ route('campuses.index') }}" class="btn btn-danger">{{ __('Volver') }}</a>
    </div>
</div>
