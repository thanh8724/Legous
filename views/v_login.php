<main class="main__login-register">
    <section id="register-section" class="oh section create-account__section banner-cover flex-center g60"
        style="background-image: url('./public/assets/media/images/banners/paindestroyskonoha2\ 1.svg')">
        <form class="form flex-column g30">
            <div class="form__title">
                Chào mừng đến với LEGOUS <br>
                Tạo tài khoản ngay!
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Tên đăng nhập</label> -->
                <input type="text" name="username" class="form__input user__name--input" placeholder=" ">
                <label for="" class="label__place">Tên đăng nhập</label>
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Email</label> -->
                <input type="text" name="username" class="form__input email--input" placeholder=" ">
                <label for="" class="label__place">Email</label>
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Mật khẩu</label> -->
                <input type="text" name="username" class="form__input password--input" placeholder=" ">
                <label for="" class="label__place">Mật khẩu</label>
            </div>
            <button type="submit" class="btn form__btn"><i class="fal fa-arrow-right"></i>TẠO TÀI KHOẢN</button>
            <div class="label-large">Bạn đã có tài khoản? <span class="click" onclick="click_scroll()">Đăng nhập
                    ngay!</span></div>
        </form>
        <div class="banner-contain login__banner flex-full"
            style="aspect-ratio: 1;z-index: 999;max-width: 50rem;background-image: url('./public/assets/media/images/banners/image\ 7.svg');">
        </div>
    </section>

    <!-- login -->
    <section id="login-section" class="oh section flex-center login__section banner-cover flex g60"
        style="background-image: url('./public/assets/media/images/banners/screen-shot-2016-11-01-at-3-15-10-pm-1477988149437\ 1.svg')"
        ;>
        <div class="banner-cover login__banner flex-full"
            style="aspect-ratio: 1;max-width: 50rem;z-index: 99;background-image: url('./public/assets/media/images/banners/image\ 5.svg');">
        </div>
        <form class="form flex-column g30">
            <div class="form__title">
                Chào mừng trở lại LEGOUS <br>
                Đăng nhập ngay !
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Email</label> -->
                <input type="text" name="username" class="email--input" placeholder=" ">
                <label for="" class="label__place">Email</label>
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Mật khẩu</label> -->
                <input type="text" name="username" class="password--input" placeholder=" ">
                <label for="" class="label__place">Mật khẩu</label>
            </div>
            <button type="submit" class="btn form__btn"><i class="fal fa-arrow-right"></i>ĐĂNG NHẬP NGAY</button>
            <div class="label-large">Bạn quên mật khẩu? <span class="click" onclick="click_scroll()">Nhấp vào
                    đây!</span></div>
        </form>
    </section>
</main>