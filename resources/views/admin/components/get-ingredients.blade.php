
<input type="number"  name="small_unit_quantity[]" value="" placeholder="quantity">
<select name="small_measurement[]" class="form-control">
   
    @foreach ($small_recepe_units as $small_unit)
    <option value="{{ $small_unit->small_unit->id }}">{{  $small_unit->small_unit->measurement }}</option> 
    @endforeach
   
</select>