//jQuery.loadScript = function (url, callback) {
//    jQuery.ajax({
//        url: url,
//        dataType: 'script',
//        success: callback,
//        async: true
//    });
//}
//
//if (typeof someObject == 'undefined') $.loadScript('../includes/layouts/Javascript/add_recipe_script.js', function(){
//    //Stuff to do after someScript has loaded
//});

$('#main-page .page-content').on('click', '#add_button', function() {
   $.getScript( "../includes/layouts/Javascript/add_recipe_script.js", function( data, textStatus, jqxhr ) {
      console.log( data ); // Data returned
      console.log( textStatus ); // Success
      console.log( jqxhr.status ); // 200
      console.log( "Load was performed." );
    });
    add_ingredient_form();
});

$('#main-page .page-content').on('click', '#list-recipes a', function(event) {
    var query = event.target.attributes[0].nodeValue;
    $("#main-page .page-content").empty();
    $("#main-page .page-content").load("display_recipe.php?" + query);
    console.log(event.target.attributes[0].nodeValue);
    event.preventDefault();
});

$('#index-recipe-link').click(function(event) { 
     $("#main-page .page-content").empty();
     $("#main-page .page-content").load("index_of_recipes.php");
     event.preventDefault(); 
 });

 $('#index-ingred-link').click(function(event) { 
     $("#main-page .page-content").empty();
     $("#main-page .page-content").load("index_of_ingredients.php");
     event.preventDefault();
 });

 $('#index-ingred-link').click(function(event) { 
     $("#main-page .page-content").empty();
     $("#main-page .page-content").load("index_of_ingredients.php");
     event.preventDefault(); 
 });

 $('#add-recipe-link').click(function(event) { 
     $("#main-page .page-content").empty();
     $("#main-page .page-content").load("add_recipe.php");
     event.preventDefault(); 
 });

$('.disabled').click(function(e){
    e.preventDefault();
});