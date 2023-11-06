const app = {
    eventsHandler () {

        /* header onscroll */
        // const heroBanner = document.querySelector('.hero-banner__wrapper')
        const header = document.querySelector('.header')
        if (header) {
            header.classList.add('home-page');
            // const offsetHeight = heroBanner.offsetHeight;
            document.addEventListener('scroll', () => {
                const scrollY = document.scrollY || document.documentElement.scrollTop
                if (scrollY !== 0) {
                    header.style.transform = 'translateY(-100%)';
                } else {
                    header.style.transform = 'translateY(0)';
                }
                if (scrollY > header.offsetHeight) {
                    header.classList.add('scrolled');
                    header.style.transform = 'translateY(0)';
                } else {
                    header.classList.remove('scrolled');
                }
            })
        }
        
        /* header respon */
        const openBtn = document.querySelector('.open-respon-btn');
        const closeBtn = document.querySelector('.close-respon-btn');
        const responNav = document.querySelector('.header__nav-respon-full');
        if (responNav && openBtn) {
            openBtn.addEventListener('click', () => {
                responNav.classList.toggle('open');
            })
            closeBtn.addEventListener('click', () => {
                responNav.classList.toggle('open');
            })
        }

        /* search box */
        const openSearchBox = document.querySelector('.open-search-box__btn');
        const closeSearchBox = document.querySelector('.close-search-box__btn');
        const searchBox = document.querySelector('.header__search-box');

        if (openSearchBox && closeSearchBox && searchBox) {
            openSearchBox.addEventListener('click', () => {
                searchBox.classList.toggle('open');
            })
            closeSearchBox.addEventListener('click', () => {
                searchBox.classList.toggle('open');
            })
        }


        /** product tabs */
        const tabs = document.querySelectorAll('.tab__item');
        const panels = document.querySelectorAll('.panel__item');
        if (tabs) {
            tabs.forEach((tab, i) => {
                tab.addEventListener('click' , () => {
                    document.querySelector('.tab__item.active').classList.remove('active');
                    document.querySelector('.panel__item.active').classList.remove('active');
                    
                    tab.classList.add('active');
                    panels[i].classList.add('active');
                })
            })
        }

        /** shop filter */
        const filterBtns = document.querySelectorAll('.filter__list__btn');
        if (filterBtns) {
            filterBtns.forEach(btn => {
                btn.onclick = () => {
                    const optionList = btn.parentElement.querySelector('.filter-option__list');
                    optionList.classList.toggle('active');
                }
            });
        }
    },
    start () {
        this.eventsHandler();
    }
}
app.start();
// window.addEventListener('load', app.start());
