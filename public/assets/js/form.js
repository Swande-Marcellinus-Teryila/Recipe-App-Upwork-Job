$("#section2").hide();


const getSmallUnit=(big_unit_id,ingredient_id)=>{
    console.log(big_unit_id);
    if(big_unit_id=="0"){
        $("#section2").show();
        $("#small_units").hide();
    }else{
    $.ajax({
        method: "get",
        data:big_unit_id,
        url: `../../get-small-units/${big_unit_id}`,
        success: (result) => {

            $("#section2").show();
            $("#small_units").show();
             $("#small_units").html(result);
      
        },
        error: (error) => {
        console.log('Sorry,something went wrong in fetching results');
        }

    })
}
}



let cost=0;
let package_size = 1;
let quantity =1;
let major_units ='';
let per_unit =1;
let small_unit =[]; 
let  getPerUnitValue=(small_units)=>{
    
    small_unit = small_units;
   }


$("#cost").keyup(function(){
small_unit_array = small_unit.split(",",2);
per_unit = small_unit_array[1];

   cost=$("#cost").val();
   package_size  =$("#package_size").val();
   quantity=$("#quantity").val();
   major_units=$("#major_units").val();
    
   ingredient_price =((cost/quantity)*(package_size/per_unit));
   ingredient_price=ingredient_price.toFixed(2);
    $.ajax({
        method: "get",
        url: `../../get-ingredient-price`,
        success: (result) => {
            //console.log(package_size);
           
        $("#ingredient_price").html( ingredient_price);
        $("#serving_cost").val(ingredient_price);
   
      
        },
        error: (error) => {
        console.log('Sorry,something went wrong in fetching results');
        }

    })
});

