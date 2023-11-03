const app = {
    eventsHandler () {
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


        // product tabs
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
    },
    start () {
        this.eventsHandler();
    }
}
app.start();
// window.addEventListener('load', app.start());
