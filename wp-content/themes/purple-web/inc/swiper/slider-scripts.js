const swiper = new Swiper('.hero-slider', {
  slidesPerView: 1, // this
  //slidesPerColumn: 1, 
  loop: true,
  effect: 'fade',
  speed: 2000,
  autoplay: {
    enabled: true,
    delay: 7000,
  },
  //spaceBetween: 20,
  //centeredSlides: true,
  grabCursor: true,
  pagination: {
    el: '.slider-hero-pagination',
    type: 'bullets',
  },
});

const wpSlider = new Swiper('.wp-slider', {
  slidesPerView: 1, // this
  grabCursor: true,
  //spaceBetween: 40,
  autoplay: {
    enabled: false,
  },
  // loop: true,
  // centeredSlides: true,
  // grabCursor: true,
  pagination: {
    el: '.slider-pagination',
    type: 'bullets',
  },
  // breakpoints: {
  //   992: {
  //     slidesPerView: 3,
  //     speed: 15000,
  //     autoplay: {
  //       enabled: true,
  //       delay: 1,
  //     },
  //   },
  //   768: {
  //     slidesPerView: 1.5,
  //     spaceBetween: 40,
  //     watchSlidesProgress: true,
  //     grabCursor: true,
  //   },
  // }
  // effect: "cards",
});

const swiperWorks = new Swiper('.worksPosts-slider', {
  slidesPerView: 1, // this
  centeredSlides: true,
  spaceBetween: 20,
  initialSlide: 1,
  loop: true,
  // navigation: {
  //   nextEl: '.works-slider__button-next',
  //   prevEl: '.works-slider__button-prev',
  // },
  breakpoints: {
    992: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 2.5,
      spaceBetween: 20,
      watchSlidesProgress: true,
      grabCursor: true,
    },
  }
});

const swiperPortfolio = new Swiper('.portfolio-slider', {
  // Optional parameters
  slidesPerView: 1,
  grabCursor: true,
  centeredSlides: true,
  draggable: true,
  spaceBetween: 20,
  //direction: 'vertical',
  //effect: 'slide',
  //centeredSlides: true,
  //loop: true,

  // If we need pagination
  pagination: {
    el: '.slider-pagination',
    clickable: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: '.portfolio-slider-next',
    prevEl: '.portfolio-slider-prev',
  },

  breakpoints: {
    992: {
      slidesPerView: 3,
      centeredSlides: false,
      loop: true
    }
  }
});

const swiperClients = new Swiper('.ourClients-slider', {
  slidesPerView: 1, // this
  loop: true,
  spaceBetween: 20,
  speed: 15000,
  autoplay: {
    enabled: true,
    delay: 1,
  },
  // centeredSlides: true,
  // initialSlide: '.today',
  //watchSlidesProgress: true,
  grabCursor: true,
  navigation: {
    nextEl: '.ourClients-slider__button-next',
    prevEl: '.ourClients-slider__button-prev',
  },

  breakpoints: {
    992: {
      slidesPerView: 6,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
      watchSlidesProgress: true,
      grabCursor: true,
      grid: {
        rows: 1
      },
    },

    375: {
      slidesPerView: 2, // this
      //centeredSlides: true,
      grid: {
        rows: 2
      },
    }

  }
});

const swiperFeedback = new Swiper('.feedback-slider', {
  slidesPerView: 1, // this
  centeredSlides: true,
  initialSlide: 1,
  loop: true,
  speed: 15000,
  autoplay: {
    enabled: true,
    delay: 1,
  },
  navigation: {
    nextEl: '.fdb-slider__button-next',
    prevEl: '.fdb-slider__button-prev',
  },
  breakpoints: {
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
      watchSlidesProgress: true,
      grabCursor: true,
    },
  }
});

const swiperOurTrainers = new Swiper('.our-trainers-slider', {
  slidesPerView: "auto", // this
  //loop: true,
  spaceBetween: 20,
  // centeredSlides: true,
  // initialSlide: '.today',
  //watchSlidesProgress: true,
  grabCursor: true,
  navigation: {
    nextEl: '.trainers-slider__button-next',
    prevEl: '.trainers-slider__button-prev',
  },
});

