let images = ['images/giantpanda3.jpg', 'images/baldeagle4.jpg', 'images/lion2.jpg','images/elephant5.jpg','images/deer6.jpg','images/giantpanda1.png'];
let currentImageIndex = 0;

function changeBackgroundImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    document.querySelector('.blurred-background').style.backgroundImage = `url(${images[currentImageIndex]})`;
    document.querySelector('.hero-image img').src = images[currentImageIndex];
}

setInterval(changeBackgroundImage, 5000);

document.addEventListener("DOMContentLoaded", function () {
    const video = document.getElementById('autoplay-video');
  
    function checkScroll() {
      const rect = video.getBoundingClientRect();
      if (rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)) {
        video.play();
      } else {
        video.pause();
      }
    }
  
    window.addEventListener('scroll', checkScroll);
    checkScroll(); // Initial check
  });