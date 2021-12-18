function validateForm(event) {
	var pswd = document.getElementById("pswd").value;
	var validPswd = document.getElementById("validPswd").value;

	if (!validatePassword()) {
		alert("Invalid Password")
		event.preventDefault();
		return false;
	}

	else if (pswd != validPswd) {
		alert("Passwords do not match")
		event.preventDefault();
		return false;
	}

	else {
		document.getElementsByTagName("form")[0].submit();
		return true;
	}
}

function validatePassword(event) {
	var isValid = false;
	var pswd = document.getElementById("pswd").value;
	var validPswd = document.getElementById("validPswd").value;
	var regex = /^(?=(.*\d){1})(?=(.*[A-Z]){1})[a-zA-Z0-9]{8,16}$/;
	if (pswd.match(regex)) {
		isValid = true;
	}
	return isValid;
}