const track = document.querySelector('.carousel-track');
const imgs = document.querySelectorAll('.carousel-img');
const prevBtn = document.querySelector('.carousel-btn.prev');
const nextBtn = document.querySelector('.carousel-btn.next');
let current = 0;

function updateCarousel() {
  const carousel = document.querySelector('.carousel');
  const width = carousel.clientWidth;
  track.style.transform = `translateX(-${current * width}px)`;
  imgs.forEach(img => {
    img.style.width = width + 'px';
  });
}prevBtn.addEventListener('click', () => {
  current = (current - 1 + imgs.length) % imgs.length;
  updateCarousel();
});

nextBtn.addEventListener('click', () => {
  current = (current + 1) % imgs.length;
  updateCarousel();
});

window.addEventListener('resize', updateCarousel);
updateCarousel();
