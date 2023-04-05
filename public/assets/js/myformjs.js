const getRecipeCost=(ingredient_id)=>{
  $.ajax({
      method: "Get",
      data:state_id,
      url: `../../recipe-ingredients/${ingredient_id}`,
      success: (result) => {
          
      $("#show_cost_per_page").html(result);
    
      },
      error: (error) => {
      console.log('Sorry,something went wrong in fetching data.');
      }

  })
}