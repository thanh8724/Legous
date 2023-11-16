<main class="main__login-register">
    <section id="register-section" class="oh section create-account__section banner-cover flex-center g60">
        <form class="form flex-column g30">
            <div class="form__title">
                Chào mừng đến với LEGOUS <br>
                Tạo tài khoản ngay!
            </div>
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="text" class="form__input" placeholder=" ">
                <label for="" class="label__place">Tên đăng nhập</label>
                <span class="form__message"></span>
            </div>
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="email" class="form__input" placeholder=" ">
                <label for="" class="label__place">Email</label>
                <span class="form__message"></span>
            </div>
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="password" class="form__input" placeholder=" ">
                <label for="" class="label__place">Mật khẩu</label>
                <span class="form__message"></span>
            </div>
            <button type="submit" class="btn form__btn"><i class="fal fa-arrow-right"></i>TẠO TÀI KHOẢN</button>
            <div class="label-large">Bạn đã có tài khoản? <span class="click" onclick="click_scroll()">Đăng nhập ngay!</span></div>
        </form>
        <div class="banner-contain login__banner flex-full" style="aspect-ratio: 1;z-index: 999;max-width: 50rem;background-image: url('/public/assets/media/images/banners/itachi-susano_banner.svg');"></div>
    </section>

    <!-- login -->
    <section id="login-section" class="oh section flex-center login__section banner-cover flex g60">
        <div class="banner-cover login__banner flex-full" style="aspect-ratio: 1;max-width: 50rem;z-index: 99;background-image: url('/public/assets/media/images/banners/image\ 5.svg');"></div>
        <form class="form flex-column g30">
            <div class="form__title">
                Chào mừng trở lại LEGOUS <br>
                Đăng nhập ngay !
            </div>
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="email" class="form__input" placeholder=" ">
                <label for="" class="label__place">Email</label>
                <span class="form__message"></span>
            </div>
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="password" class="form__input" placeholder=" ">
                <label for="" class="label__place">Mật khẩu</label>
                <span class="form__message"></span>
            </div>
            <button type="submit" class="btn form__btn"><i class="fal fa-arrow-right"></i>ĐĂNG NHẬP NGAY</button>
            <div class="label-large">Bạn quên mật khẩu? <span class="click" onclick="click_scroll()">Nhấp vào đây!</span></div>
        </form>
    </section>
</main>
<!-- register -->
<script>
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
</script>
