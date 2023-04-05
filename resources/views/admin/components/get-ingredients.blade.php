
 <div class="col-sm-12" >
<select name="small_unit_id" class="form-control" id="small_units" onchange="getPerUnitValue(this.value)">
   
    @foreach ($small_recepe_units as $small_unit)
    <option value="{{$small_unit->small_unit_id }},{{$small_unit->per_unit }}">{{  $small_unit->small_unit->measurement }}</option> 
    @endforeach
   
</select>                                              
</div>