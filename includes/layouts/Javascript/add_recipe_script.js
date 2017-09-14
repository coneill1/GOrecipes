$(document).ready(function() {
    
    function add_ingredient_form() {
        
        const ADD_INGRED_BTN = document.querySelector("#add_button");
        const INGRED_CONTAINER = document.querySelector("#ingredients");
        var count = 0;

        count++;

        //create the div element to contain a single ingredient form
        var single_ingred_element = document.createElement("div");
        single_ingred_element.setAttribute("id", "ingred_"+count);
        INGRED_CONTAINER.appendChild(single_ingred_element);

        //create the input element for the ingredient name
        //then append this child to div element
        var textNode = document.createTextNode("Ingredient Name:");
        var input_name_element = document.createElement("input");
        input_name_element.setAttribute("name", "ingred_name"+count);
        input_name_element.setAttribute("list", "list_of_ingreds");

        //Insert datalist of ingredients already in database
//        var dataList = document.createElement("datalist");
//        dataList.setAttribute("id", "list_of_ingreds");
//        for(var i=0; i < ingredients.length; i++) {
//            var optEl = document.createElement("option");
//            optEl.setAttribute("value", ingredients[i]);
//            dataList.appendChild(optEl);
//        }
//        input_name_element.appendChild(dataList);

        single_ingred_element.appendChild(textNode);
        single_ingred_element.appendChild(input_name_element);

        //create the input element for the ingredient amount
        //then append child to div element
        textNode = document.createTextNode("Amount:");
        input_amt_element = document.createElement("input");
        input_amt_element.setAttribute("name", "amt"+count);
        input_amt_element.setAttribute("list", "list_of_amts");

//        dataList = document.createElement("datalist");
//        dataList.setAttribute("id", "list_of_amts");
//        for(var i=0; i < amts.length; i++) {
//            var optEl = document.createElement("option");
//            optEl.setAttribute("value", amts[i]);
//            dataList.appendChild(optEl);
//        }
//        input_amt_element.appendChild(dataList);

        single_ingred_element.appendChild(textNode);
        single_ingred_element.appendChild(input_amt_element);

        //add remove button
        remove_link_element = document.createElement("a");
        remove_link_element.setAttribute("href", "#");
        remove_link_element.innerHTML = "remove";

        remove_link_element.addEventListener("click", function() {
            remove_ingredient(this);
            }, false);

        single_ingred_element.appendChild(remove_link_element);

        //add style to remove button
        $("#ingred_"+count+" a").css({"color": "red", "padding": "5px"});
        $("#ingred_"+count+" input").css({"margin": "0 5px 0 0"});
    };
    
    

    function remove_ingredient(current) {
        console.log(current.parentNode);
        var id = current.parentNode.getAttribute("id");
        console.log(id);
        //jQuery to remove element
        $("#"+id).remove();
    }
});





