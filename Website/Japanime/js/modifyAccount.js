function validateForm(event) {
	if (!validateEmail()) {
		alert("Invalid Email")
		event.preventDefault();
		return false;
	}

	else {
		document.getElementsByTagName("form")[0].submit();
		return true;
	}
}

function validateEmail() {
	var isValid = false;
	var email = document.getElementById("email").value;
	var regex = /^[a-zA-Z0-9][\w\-\.]{0,15}@[a-zA-Z][a-zA-Z0-9\.]{0,22}[a-zA-Z](\.com|\.qc.ca|\.ca)$/;
	if (email.match(regex)) {
		isValid = true;
	}
	return isValid;
}