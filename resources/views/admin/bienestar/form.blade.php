<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="servicio">Servicio:</label>
            <input type="text" name="servicio" class="form-control" placeholder="Ingrese el servicio" value="{{ isset($item) ? $item->servicio : old('servicio') }}" required>
        </div>
        <div class="form-group">
            <label for="detalle">Detalle:</label>
            <input type="text" name="detalle" class="form-control" placeholder="Ingrese el detalle" value="{{ isset($item) ? $item->detalle : old('detalle') }}" required>
        </div>
        <div class="form-group" style="display:none;">
            <label for="Id_area">ID Área:</label>
            <input type="number" name="Id_area" class="form-control" placeholder="Ingrese el ID de Área" value="{{ isset($item) ? $item->Id_area : old('Id_area', 7) }}" required>
        </div>
        <div class="form-group" style="display:none;">
            <label for="estado">Estado:</label>
            <input type="number" name="estado" class="form-control" placeholder="Ingrese el estado" value="{{ isset($item) ? $item->estado : old('estado', 1) }}" required>
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
</div>
