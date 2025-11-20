const slidesWrapper = document.querySelector('.slides-wrapper');
const slides = document.querySelectorAll('.slide');
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');

let currentIndex = 0;
const slidesPerView = 2; // koliko slika se vidi u viewportu

function updateSlider() {
  const slideWidth = slides[0].offsetWidth + 20; // 20px gap
  slidesWrapper.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
}

prev.addEventListener('click', () => {
  if (currentIndex > 0) currentIndex--;
  updateSlider();
});

next.addEventListener('click', () => {
  if (currentIndex < slides.length - slidesPerView) currentIndex++;
  updateSlider();
});

window.addEventListener('resize', updateSlider);

// Auto-play
setInterval(() => {
  if (currentIndex < slides.length - slidesPerView) {
    currentIndex++;
  } else {
    currentIndex = 0;
  }
  updateSlider();
}, 5000);
