const app = {
    eventsHandler () {
        // header respon
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
    },
    start () {
        this.eventsHandler();
    }
}
app.start();
// window.addEventListener('load', app.start());
