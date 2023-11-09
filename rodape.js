function Aparecer()
    {
        lateral.classList.add('animar');
        lateral2.classList.remove('animar2');
    }

    function Fechar()
    {
        lateral.classList.remove('animar');
    }









    function Aparecer2()
    {
        lateral2.classList.add('animar2');
        lateral.classList.remove('animar');
        lateral2.classList.remove('animar3');
    }

    function Fechar2()
    {
        lateral2.classList.remove('animar2');
        lateral2.classList.add('animar3');
    }

    




    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('.carousel-slide');
        let currentSlide = 0;
      
        const footerSlides = document.querySelectorAll('.footer-slide');
        let currentFooterSlide = 0;
      
        function showSlide(index, slideArray) {
          slideArray.forEach((slide, i) => {
            slide.style.display = i === index ? 'block' : 'none';
          });
        }
      
        function nextSlide() {
          currentSlide = (currentSlide + 1) % slides.length;
          showSlide(currentSlide, slides);
        }
      
        function prevSlide() {
          currentSlide = (currentSlide - 1 + slides.length) % slides.length;
          showSlide(currentSlide, slides);
        }
      
        function nextFooterSlide() {
          currentFooterSlide = (currentFooterSlide + 1) % footerSlides.length;
          showSlide(currentFooterSlide, footerSlides);
        }
      
        // Initial setup
        showSlide(currentSlide, slides);
        showSlide(currentFooterSlide, footerSlides);
      
        // Event listeners for next and previous buttons
        document.getElementById('nextBtn').addEventListener('click', nextSlide);
        document.getElementById('prevBtn').addEventListener('click', prevSlide);
      
        // Automatic footer carousel
        setInterval(nextFooterSlide, 3000); // Troca a cada 3 segundos (3000 milissegundos)
      });
      