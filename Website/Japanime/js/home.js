var slideIdx = 1;
var timer = null;
showSlides(slideIdx);

function plusSlides(n) {
	clearTimeout(timer);
	showSlides(slideIdx += n);
}

function currentSlide(n) {
	clearTimeout(timer);
	showSlides(slideIdx = n);
}

function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("slides");
	var dots = document.getElementsByClassName("dot");

	if (n == undefined) {
		n = ++slideIdx;
	}

	if (n > slides.length) {
		slideIdx = 1;
	}

	if (n < 1) {
		slideIdx = slides.length;
	}

	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	slides[slideIdx - 1].style.display = "block";
	dots[slideIdx - 1].className += " active";
	timer = setTimeout(showSlides, 3500);
}