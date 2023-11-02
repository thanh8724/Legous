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
    },
    start () {
        this.eventsHandler();
    }
}
app.start();
// window.addEventListener('load', app.start());
