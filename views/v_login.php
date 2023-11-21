<main class="main__login-register">
    <section id="register-section" class="oh section create-account__section banner-cover flex-center g60"
        style="background-image: url('./public/assets/media/images/banners/banner-login-1.svg')">
        <form action="?mod=page&act=login" method="post" class="form register__form flex-column g30">
            <div class="form__title">
                Chào mừng đến với LEGOUS <br>
                Tạo tài khoản ngay!
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Tên đăng nhập</label> -->
                <input type="text" name="username" class="form__input user__name--input" placeholder=" ">
                <label for="" class="label__place">Tên đăng nhập</label>
                <span class="form__message label-medium"></span>
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Email</label> -->
                <input type="text" name="email" class="form__input email--input" placeholder=" ">
                <label for="" class="label__place">Email</label>
                <span class="form__message label-medium"></span>
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Mật khẩu</label> -->
                <input type="text" name="password" class="form__input password--input" placeholder=" ">
                <label for="" class="label__place">Mật khẩu</label>
                <span class="form__message label-medium"></span>
            </div>
            <span class="form__message submit__message label-medium primary-text"><?= $message ?></span>
            <input class="btn form__btn" type="submit" name="register" value="TẠO TÀI KHOẢN" style="border:none; color: white">            
            <div class="label-large">Bạn đã có tài khoản? <a href="#login-section" class="click">Đăng nhập ngay!</a></div>
        </form>
        <div class="banner-contain login__banner flex-full"
            style="aspect-ratio: 1;z-index: 999;max-width: 50rem;background-image: url('./public/assets/media/images/banners/image\ 4.svg');">
        </div>
    </section>

    <!-- login -->
    <section id="login-section" class="oh section flex-center login__section banner-cover flex g60"
        style="background-image: url('./public/assets/media/images/banners/banner-login-2.svg')"
        ;>
        <div class="banner-cover login__banner flex-full"
            style="aspect-ratio: 1;max-width: 50rem;z-index: 99;background-image: url('./public/assets/media/images/banners/image\ 5.svg');">
        </div>
        <form action="?mod=page&act=login" method="post" class="form flex-column g30">
            <div class="form__title">
                Chào mừng trở lại LEGOUS <br>
                Đăng nhập ngay !
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Email</label> -->
                <input type="text" name="email" class="form__input email--input" placeholder=" " value="">
                <label for="" class="label__place">Email</label>
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Mật khẩu</label> -->
                <input type="text" name="password" class="form__input password--input" placeholder=" " value="">
                <label for="" class="label__place">Mật khẩu</label>
            </div>
            <input type="submit" name="login" class="btn form__btn" style="background: black; color: white; border-radius: .8rem;" value="ĐĂNG NHẬP NGAY">
            <div class="label-large">Bạn quên mật khẩu? <a href="#register-section" class="click">Nhấp vào đây!</a></div>
        </form>
    </section>
</main>
<script src="./public/assets/resources/js/validator.js"></script>
<script>
    Validator({
        formSelector: '.register__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('.user__name--input'),
            Validator.isRequired('.email--input'),
            Validator.isEmail('.email--input'),
            Validator.isRequired('.password--input'),
            Validator.isPassword('.password--input'),
        ]
    })
</script>