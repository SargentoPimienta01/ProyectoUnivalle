<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="carrera">Carrera:</label>
            <input type="text" name="carrera" class="form-control" placeholder="Ingrese la carrera" value="{{ isset($item) ? $item->carrera : old('carrera') }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" placeholder="Ingrese la descripción" required>{{ isset($item) ? $item->descripcion : old('descripcion') }}</textarea>
        </div>
        <div class="form-group">
            <label for="facultad">Facultad:</label>
            <input type="text" name="facultad" class="form-control" placeholder="Ingrese la facultad" value="{{ isset($item) ? $item->facultad : old('facultad') }}" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control" required>
                <optgroup label="Activo">
                    <option value="1" {{ (isset($item) && $item->estado == 1) ? 'selected' : '' }}>Activo</option>
                </optgroup>
                <optgroup label="Inactivo">
                    <option value="0" {{ (isset($item) && $item->estado == 0) ? 'selected' : '' }}>Inactivo</option>
                </optgroup>
            </select>
        </div>
        <div class="form-group" style="display:none;">
            <label for="Id_area">ID Área:</label>
            <input type="number" name="Id_area" class="form-control" placeholder="Ingrese el ID de Área" value="{{ isset($item) ? $item->Id_area : old('Id_area', 8) }}" required>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
</div>
