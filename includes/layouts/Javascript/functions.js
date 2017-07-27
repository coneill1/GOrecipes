
const ADD_INGRED_BTN = document.querySelector("#add_button");

function add_ingredient_form(e) {
	var count = $(this).data("count") || 1;
	alert("" + count);
	var index = "ingred_" + count;
	
	//create the container to hold the ingredient name and amount
	var container = document.createElement("div");
	container.id = index;
	$("#ingredients").append(container);
	var entity = $("#" + index);
	console.log(entity);
	

	//add ingredient name text area
	entity.append("Ingredient " + count + ": ");
	var htmlElement_insert = "<input list='ingredient' name='ingred_name${count}'></input>"

	entity.append(htmlElement_insert);
	add_ingred_datalist(entity);
	
	//add amount text area
	entity.append(" Amount: ");
	var amtTextArea = document.createElement("input");
	amtTextArea.list = "amount";
	amtTextArea.placeholder = "amount";
	amtTextArea.name = "amt" + count;
	entity.append(amtTextArea);
	
	//add remove button
	var rmBtn = document.createElement("a");
	rmBtn.id = "rm" + count;
	//rmBtn.onclick = "remove(e)";  why won't this work??
	rmBtn.href = "#";
	rmBtn.innerHTML = " X";
	//$("#rm" + count).html(" X");	why won't this line of code work?
	entity.append(rmBtn);
	
	$(this).data("count", ++count);
	add_linebreak(index);
	
}

function add_ingred_datalist(curElement) {	
	
	var php = "<?php echo $ingredient['ingred_name'] ?>";
	var html = "<datalist id='ingredient'>";
	html += "<?php $result = list_all_ingredients();";
	html += "while($ingredient = mysqli_fetch_assoc($result)) {?>";
	html += "<option value=" + php + ">";
	html += "<?php } ?>";
	html += "</datalist>";

	curElement.append(html);
}

$(function() {
	$("#ingredients").on("click", function(e) {
		
		var idNum = findIdNum(e.target.id);
	
		$("#ingred_" + idNum).remove();
		
	});
});

function findIdNum(id) {
	
	var patrn = /[0-9]/g;
	var nums = id.match(patrn);
	if(nums == null)
		return;
	return nums.join("");
}

function add_linebreak(id) {
	var brElement = document.createElement("br");
	$("#" + id).append(brElement);
}

ADD_INGRED_BTN.onclick = add_ingred_datalist;