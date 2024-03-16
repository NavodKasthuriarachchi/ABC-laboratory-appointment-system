
(function ($) {
  "use strict";

  class Navbar {
    constructor() {
      this.navLinks = $('.navbar-nav .nav-link');
      this.navCollapse = $(".navbar-collapse");
      this.navLinks.on('click', () => this.hideNavbar());
    }

    hideNavbar() {
      this.navCollapse.collapse('hide');
    }
  }

  class ReviewsCarousel {
    constructor() {
      this.carousel = $('.reviews-carousel');
      this.carousel.owlCarousel({
        center: true,
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 300,
        smartSpeed: 500,
        responsive:{
          0:{
            items:1,
          },
          768:{
            items:2,
            margin: 100,
          },
          1280:{
            items:2,
            margin: 100,
          }
        }
      });
    }
  }

  class BannerCarousel {
    constructor() {
      this.myCarousel = document.querySelector('#myCarousel');
      this.carousel = new bootstrap.Carousel(this.myCarousel, {
        interval: 1500,
      });
    }
  }

  class ReviewsNavigation {
    constructor() {
      $(window).on("resize", () => this.resize());
      $(document).on("ready", () => this.resize());
    }

    resize() {
      $(".navbar").scrollspy({ offset: -94 });

      const reviewsOwlItem = $('.reviews-carousel .owl-item').width();
      $('.reviews-carousel .owl-nav').css({'width' : reviewsOwlItem + 'px'});
    }
  }

  class HrefLinks {
    constructor() {
      $('a[href*="#"]').click((event) => this.handleClick(event));
    }

    handleClick(event) {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        const target = $(this.hash);
        if (target.length) {
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top - 74
          }, 1000);
        }
      }
    }
  }

  // Initialize classes
  const navbar = new Navbar();
  const reviewsCarousel = new ReviewsCarousel();
  const bannerCarousel = new BannerCarousel();
  const reviewsNavigation = new ReviewsNavigation();
  const hrefLinks = new HrefLinks();

})(window.jQuery);
