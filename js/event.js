function delButton(){
	delButtons=document.querySelectorAll("button");
	for (var i = 0; i < delButtons.length; i++) {
		delButtons[i].addEventListener("click",function(){
			alert("The game has been deleted.");
			location.reload();
		});
	}
}

window.addEventListener("load",function(){
	delButton();
});

var addButton=document.querySelector("#addGame");
addButton.addEventListener("click",function(event){
	if (document.querySelector("#addForm").checkValidity()){
		alert("The new game has been registered.");
		location.reload();
	}
	else
		alert("Please try again.");
	event.preventDefault();
});

var editButton=document.querySelector("#change");
editButton.addEventListener("click",function(event){
	alert("The changed game information has been recorded.");
	event.preventDefault();
	location.reload();
});

var today=document.querySelector("#today");
today.valueAsDate=new Date();

function update(val){
	document.querySelector("#editGameName").value=val;
}