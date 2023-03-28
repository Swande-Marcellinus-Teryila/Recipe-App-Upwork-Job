const get_small_unit=(big_unit_id,ingredient_id)=>{
    $.ajax({
        method: "get",
        data:big_unit_id,
        url: `../../get-small-units/${big_unit_id}`,
        success: (result) => {
           
        $("#small_units"+ingredient_id).html(result);
      
        },
        error: (error) => {
        console.log('Sorry,something went wrong in fetching results');
        }

    })
}
