function click_scroll() {
    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    } else {
        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: 'smooth'
        });
    }
} 