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
        // close / open filter 
        const toggleFilterBtn = document.querySelector('.toggle-filter-btn');
        const filterList = document.querySelector('.filter__list');
        // console.log(toggleFilterBtn, filterList)
        
        if (filterList && toggleFilterBtn) {
            toggleFilterBtn.onclick = () => {
                filterList.classList.toggle('open');

                if (filterList.classList.contains('open')) {
                    toggleFilterBtn.querySelector('.btn__text').textContent = 'Ẩn filter';
                } else {
                    toggleFilterBtn.querySelector('.btn__text').textContent = 'Hiện filter';
                }

            }
        }

        /** mobile filter system  */
        const mobileFilterCloseBtn = document.querySelector('.mobile__filter__btn--close')
        const mobileFilterOpenBtn = document.querySelector('.mobile__filter__btn--open')

        const mobileFilter = document.querySelector('.mobile__filter');
        
        if (mobileFilter) {
            mobileFilterOpenBtn.onclick = () => {
                mobileFilter.classList.add('open');
            }
            mobileFilterCloseBtn.onclick = () => {
                mobileFilter.classList.remove('open');
            }
        }

        /** mobile top nav bar - member widget */
        const moreBtn = document.querySelector('.member-widget .more-btn');
        const optionList = document.querySelector('.member-widget .option__list');
        if (optionList) {
            moreBtn.onclick = () => {
                optionList.classList.toggle('open');
            }
        }

        /** toggle button handler */
        const toggleBtns = document.querySelectorAll('.toggle-btn');
        if (toggleBtns) {
            toggleBtns.forEach(btn => {
                btn.onclick = () => {
                    btn.classList.toggle('active');
                    if (btn.classList.contains('active')) {
                        if (btn.classList.contains('love-btn')) {
                            btn.querySelector('.fal').classList.remove('fal');
                            btn.querySelector('.fa-heart').classList.add('fa');
                        }
                    } else {
                        if (btn.querySelector('i').classList.contains('fa')) {
                            btn.querySelector('i').classList.remove('fa');
                            btn.querySelector('i').classList.add('fal');
                        }
                    }
                }
            });
        }

        /** product gallery handler  */
        const gallery = document.querySelector('.product__gallery');

        if (gallery) {
            const spotlight = gallery.querySelector('.gallery__spotlight > img');
            const thumbnails = gallery.querySelectorAll('.gallery__thumbnails__item > img');
            thumbnails.forEach(item => {
                item.onclick = () => {
                    spotlight.src = item.src;
                }
            });
        }

        /** add coupon handler */
        const addCouponeBtn = document.querySelector('add-coupon-btn');
        

    },
    start () {
        this.eventsHandler();
    }
}
app.start();
// window.addEventListener('load', app.start());
