$(document).ready(function() {
   $('#edit_user_page a').click(function(event) {
       insertEditForm(event.target.parentElement.parentElement);
    });
    
    $('button.edit_form_btn').click(function(event) {
        alert(event.target.attributes[1]);
    });
});


function insertEditForm(parentNode) {
    //need to make sure parentNode is a DOM element
    
    var div = document.createElement('DIV');
    div.setAttribute("class", "edit_user_form row ml-5 justify-content-center");
    
    var labelText = parentNode.childNodes[1].innerHTML.slice(0,-1);
    var label = document.createElement('LABEL');
    label.setAttribute("class", "col-4 col-form-label");
    label.innerHTML = "New " + labelText;
    
    var divInput = document.createElement('DIV');
    divInput.setAttribute("class", "col-8");
    var input = document.createElement("INPUT");
    input.setAttribute("type", "text");
    divInput.appendChild(input);
    
    var button = document.createElement("BUTTON");
    button.setAttribute("type", "button");
    button.setAttribute("class", "edit_form_btn");
    button.innerHTML = "Submit";
    
    div.appendChild(label);
    div.appendChild(divInput);
    div.appendChild(button);
    
    div.style.zIndex=2000;
//    $('body > *:not(.edit_form_btn)').css("filter", "blur(5px)");
    
    parentNode.appendChild(div);
}