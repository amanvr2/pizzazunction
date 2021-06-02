
/////////////////////////  Automatic slider without buttons //////////////////////////

// var slideshows = document.querySelectorAll('[data-component="slideshow"]');
// slideshows.forEach(initSlideShow);

// function initSlideShow(slideshow) {

// 	var slides = document.querySelectorAll(`#${slideshow.id} [role="list"] .slide`);

// 	var index = 0, time = 5000;
// 	slides[index].classList.add('active');

// 	setInterval( () => {
// 		slides[index].classList.remove('active');
		
// 		index++;
// 		if (index === slides.length) index = 0;

// 		slides[index].classList.add('active');

// 	}, time);
// }



///////////////////   w3school slider without Bootstrap //////////////////////////////////

// var slideIndex = 0;
// showSlides();
// var slides,dots;

// function showSlides() {
//     var i;
//     slides = document.getElementsByClassName("mySlides");
//     dots = document.getElementsByClassName("dot");
//     for (i = 0; i < slides.length; i++) {
//        slides[i].style.display = "none";  
//     }
//     slideIndex++;
//     if (slideIndex> slides.length) {slideIndex = 1}    
//     for (i = 0; i < dots.length; i++) {
//         dots[i].className = dots[i].className.replace(" active", "");
//     }
//     slides[slideIndex-1].style.display = "block";  
//     dots[slideIndex-1].className += " active";
//     setTimeout(showSlides, 8000); // Change image every 8 seconds
// }

// function plusSlides(position) {
//     slideIndex +=position;
//     if (slideIndex> slides.length) {slideIndex = 1}
//     else if(slideIndex<1){slideIndex = slides.length}
//     for (i = 0; i < slides.length; i++) {
//        slides[i].style.display = "none";  
//     }
//     for (i = 0; i < dots.length; i++) {
//         dots[i].className = dots[i].className.replace(" active", "");
//     }
//     slides[slideIndex-1].style.display = "block";  
//     dots[slideIndex-1].className += " active";
// }

// function currentSlide(index) {
//     if (index> slides.length) {index = 1}
//     else if(index<1){index = slides.length}
//     for (i = 0; i < slides.length; i++) {
//        slides[i].style.display = "none";  
//     }
//     for (i = 0; i < dots.length; i++) {
//         dots[i].className = dots[i].className.replace(" active", "");
//     }
//     slides[index-1].style.display = "block";  
//     dots[index-1].className += " active";
// }