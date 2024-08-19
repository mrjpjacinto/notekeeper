function darkMode() {
  var element = document.body;
  element.classList.toggle("darkmode");

  if (element.classList.contains("darkmode")) {
    localStorage.setItem("theme", "dark");
  } else {
    localStorage.setItem("theme", "light");
  }
}

function applySavedTheme() {
  var theme = localStorage.getItem("theme");
  if (theme === "dark") {
    document.body.classList.add("darkmode");
  } else {
    document.body.classList.remove("darkmode");
  }
}

window.onload = function() {
  applySavedTheme();
    updateSlides();
  };

function toggleMenu() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function goBack() {
  window.history.back();
}

// SLIDESHOW PICTURES
const slideshow = document.querySelector('.slideshow');
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;
let currentIndex = 0;

function updateSlides() {
    slides.forEach(slide => slide.classList.remove('slide-active'));

    slides[currentIndex].classList.add('slide-active');
    
    slideshow.scrollTo({
        left: slides[currentIndex].offsetLeft - (slideshow.clientWidth - slides[currentIndex].clientWidth) / 2,
        behavior: 'smooth'
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlides();
}

let slideInterval = setInterval(nextSlide, 2000);

slideshow.addEventListener('scroll', () => {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, 2000);
});
// SLIDESHOW PICTURES