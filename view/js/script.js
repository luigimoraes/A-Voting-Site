/*var checkCand = document.querySelector("#checkCand");
var checkEl = document.querySelector("#checkEl");
var cf1 = document.querySelector("#cf1");
var cf2 = document.querySelector("#cf2");
var ef1 = document.querySelector("#ef1");
var ef2 = document.querySelector("#ef2");






$(document).ready(function(){
	$("#checkCand").on("click", function(){
		if($(this).prop("checked")){
			$("#cf1").prop("disabled", false); //habilitar
		} else {
			$("#cf1").prop("disabled", true); //desabilitar
		}
		
		cf2.disabled = false;

		ef1.disabled = true;
		ef2.disabled = true;
	});

	checkEl.click(function(){
		ef1.disabled = false;
		ef2.disabled = false;

		cf1.disabled = true;
		cf2.disabled = true;
	});
//}); */