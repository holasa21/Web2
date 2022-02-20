function validation() {
	var input_text = document.querySelector("#input_text");
	var input_text1 = document.querySelector("#input_text2");
	var input_text2 = document.querySelector("#input_text3");
	var input_text3 = document.querySelector("#input_text4");
	var input_password = document.querySelector("#input_password");
	var error_msg = document.querySelector(".error_msg");
	
	if (input_text.value.length <= 0 || input_password.value.length <= 1 || input_text1.value.length <= 1 || input_text2.value.length <= 1 || input_text3.value.length <= 1) {
	error_msg.style.display = "inline-block";
	input_text.style.border = "1px solid #f74040";
	input_text1.style.border="1px solid #f74040";
	input_text2.style.border="1px solid #f74040";
	input_text3.style.border="1px solid #f74040";
	input_password.style.border = "1px solid #f74040";

	return false;
	}
	else {
     window.location.href="employee.html";
	return true;
	}
	
	}

var input_fields = document.querySelectorAll(".input");
var login_btn = document.querySelector("#login_btn");

input_fields.forEach(function(input_item){
	input_item.addEventListener("input", function(){
		if(input_item.value.length > 2){
			login_btn.disabled = false;
			login_btn.className = "btn enabled"
		}
	})
})
