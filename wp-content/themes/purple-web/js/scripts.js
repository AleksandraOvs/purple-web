document.addEventListener("DOMContentLoaded", () => {

    // let body = $('body');
    // let menu = $('.main-navigation');
    // let textDefault = 'Меню';
    // let textOther = 'Закрыть';

    // $(document).on('click', '.menu-toggle', function (event) {

    //     event.preventDefault();
    //     $(this).toggleClass('_open');
    //     menu.toggleClass('_open');
    //     body.toggleClass('_fixed');
    // });

    const button = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.main-navigation');
    const body = document.querySelector('body');

    button.addEventListener('click', function (e) {
        e.preventDefault();
        button.classList.toggle('_open');
        menu.classList.toggle('_open');
        body.classList.toggle('_fixed');
    });


    // Изменение хедера при скролле
    const headerFront = document.querySelector('.site-header');
    //const headerLogo = document.querySelector('.header__inner__logo');
    const headerChange = () => {
        const
            mainBlock = document.querySelector('body');

        window.addEventListener('scroll', () => {
            if (-mainBlock.getBoundingClientRect().top > 88) {
                headerFront.classList.add('header-scroll');
                //headerLogo.classList.add('scroll');
            } else {
                headerFront.classList.remove('header-scroll');
            }
        })
    }
    headerChange();

    //плавный скролл

    function scrollTo(to, duration = 700) {
        const
            element = document.scrollingElement || document.documentElement,
            start = element.scrollTop,
            change = to - start,
            startDate = +new Date(),
            // t = current time
            // b = start value
            // c = change in value
            // d = duration
            easeInOutQuad = function (t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            },
            animateScroll = function () {
                const currentDate = +new Date();
                const currentTime = currentDate - startDate;
                element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration));
                if (currentTime < duration) {
                    requestAnimationFrame(animateScroll);
                }
                else {
                    element.scrollTop = to;
                }
            };
        animateScroll();
    }

    //кнопка вверх

    function scrollTo(to, duration = 700) {
        const
            element = document.scrollingElement || document.documentElement,
            start = element.scrollTop,
            change = to - start,
            startDate = +new Date(),
            // t = current time
            // b = start value
            // c = change in value
            // d = duration
            easeInOutQuad = function (t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            },
            animateScroll = function () {
                const currentDate = +new Date();
                const currentTime = currentDate - startDate;
                element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration));
                if (currentTime < duration) {
                    requestAnimationFrame(animateScroll);
                }
                else {
                    element.scrollTop = to;
                }
            };
        animateScroll();
    }

    const upArrow = document.querySelector('.arrow-up');

    upArrow.addEventListener('click', (e) => {
        e.preventDefault();
        // Вызываем функцию, первый аргумент - отступ, второй - скорость скролла, чем больше значение, тем медленнее скорость прокрутки
        scrollTo(0, 800);
    });

    //кнопка вверх

    function scrollTo(to, duration = 700) {
        const
            element = document.scrollingElement || document.documentElement,
            start = element.scrollTop,
            change = to - start,
            startDate = +new Date(),
            // t = current time
            // b = start value
            // c = change in value
            // d = duration
            easeInOutQuad = function (t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            },
            animateScroll = function () {
                const currentDate = +new Date();
                const currentTime = currentDate - startDate;
                element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration));
                if (currentTime < duration) {
                    requestAnimationFrame(animateScroll);
                }
                else {
                    element.scrollTop = to;
                }
            };
        animateScroll();
    }

    // Вверх и показ верхнего меню
    const arrowUp = () => {
        const
            mainBlock = document.querySelector('.site'),
            arrow = document.querySelector('.arrow-up');

        window.addEventListener('scroll', () => {
            if (-mainBlock.getBoundingClientRect().top > 300) {
                arrow.classList.add('show');
            } else {
                arrow.classList.remove('show');
            }
        })

    }
    arrowUp();
});

jQuery(document).ready(function ($) {

    // $('.burger').click(function (event) {
    //     $('body, .overlay, .burger,.navbar-nav').toggleClass('active')
    // });
    $('img, em').fadeIn(1500);
    // $('p, span, h2, h3'). fadeIn(1500);

    $('.js-video-block').click(function (event) {
        var video_file = $(this).data('file');
        $(this).addClass('hidden-poster');
        $(this).html('');
        if ($(this).html() == '') {
            $(this).append($("<iframe />").attr({ src: video_file, frameborder: 0, "allowfullscreen": "", allow: 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' }));
        }
    });

    function onEntry(entry) {
        entry.forEach(change => {
            if (change.isIntersecting) {
                change.target.classList.add('element-show');
            }
        });
    }
    let options = { threshold: [0.5] };
    let observer = new IntersectionObserver(onEntry, options);
    let elements = document.querySelectorAll('.element-toright, .element-toleft, .element-totop, .element-tobottom, .element-toopacity');
    for (let elm of elements) {
        observer.observe(elm);
    }

    const titleField = document.querySelector('input[name="page_title"]');
    if (titleField) {
        titleField.value = document.title;
    }

});

const stackSlider = new Swiper('.stack-slider', {
    slidesPerView: 5,
    spaceBetween: 10,

    loop: true,

    speed: 5000, // скорость движения (больше = медленнее)

    autoplay: {
      delay: 0,
       disableOnInteraction: false,
       pauseOnMouseEnter: true,
    },

    freeMode: {
        enabled: true,
        momentum: false,
    },

    breakpoints: {
//         320: {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },

        576: {
            slidesPerView: 3,
            spaceBetween: 10,
        },

        992: {
            slidesPerView: 5,
            spaceBetween: 20,
        }
    }
});
