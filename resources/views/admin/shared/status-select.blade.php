<label for="status">Estado </label>
<div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-check"></i>
        </div>
<select name="status" id="status" class="form-control select2">
    <option value="0" @if($status == 0 || old('status') == 0) selected="selected" @endif>Deshabilitado</option>
    <option value="1" @if($status == 1 || old('status') == 1) selected="selected" @endif>Habilitado</option>
</select>
</div>