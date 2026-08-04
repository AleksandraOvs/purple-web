document.addEventListener("DOMContentLoaded", () => {

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

//Функции для инициализации скриптов



// Плавное появление изображений
function initFadeElements() {

    document.querySelectorAll('img, em').forEach((element) => {

        if (element.dataset.fadeInitialized) {
            return;
        }

        element.dataset.fadeInitialized = 'true';

        element.animate(
            [
                { opacity: 0 },
                { opacity: 1 }
            ],
            {
                duration: 1500,
                fill: 'forwards'
            }
        );

    });

}


// Видео
function initVideoBlocks() {

    document.querySelectorAll('.js-video-block').forEach((block) => {

        if (block.dataset.initialized) {
            return;
        }

        block.dataset.initialized = 'true';

        block.addEventListener('click', function () {

            const videoFile = this.dataset.file;

            this.classList.add('hidden-poster');
            this.innerHTML = '';

            const iframe = document.createElement('iframe');

            iframe.src = videoFile;
            iframe.frameBorder = 0;
            iframe.allowFullscreen = true;
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';

            this.appendChild(iframe);

        });

    });

}


// Анимация при скролле
function initIntersectionAnimations() {
    console.log('initIntersectionAnimations');

    const observer = new IntersectionObserver((entries) => {

        entries.forEach((entry) => {

            if (entry.isIntersecting) {
                entry.target.classList.add('element-show');
            }

        });

    }, {
        threshold: 0.5
    });

    document.querySelectorAll(
        '.element-toright, .element-toleft, .element-totop, .element-tobottom, .element-toopacity'
    ).forEach((element) => {

        console.log(element);
        if (element.dataset.observed) {
            return;
        }

        element.dataset.observed = 'true';

        observer.observe(element);

    });

}

// Заполнение скрытого поля названием страницы
function initPageTitleField() {

    const titleField = document.querySelector('input[name="page_title"]');

    if (titleField) {
        titleField.value = document.title;
    }

}

//слайдер 
function initStackSlider() {

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

}

// Общая инициализация
function initCommon() {

    initFadeElements();
    initVideoBlocks();
    initIntersectionAnimations();
    initPageTitleField();
    initStackSlider();

}


document.addEventListener('DOMContentLoaded', () => {
    initCommon();
});