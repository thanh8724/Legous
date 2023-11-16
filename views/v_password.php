<?php
    if(isset($_SESSION['user']) && (is_array($_SESSION['user']) || is_object($_SESSION['user']) && count($_SESSION['user']) > 0)){
        extract($_SESSION['user']);
    }
?>
<div class="main__inner--bottom-right">
    <form action="" method="">
        <!-- normal form group -->
        <div class="form__group">
            <span class="form__label">Mật khẩu cũ</span>
            <input type="password" class="form__input" placeholder=" ">
            <!-- <label for="" class="label__place">Nhập mật khẩu cũ</label> -->
            <span class="form__message"></span>
            <!-- button show-hidden password -->
            <button class="hidden-show__password">
                <i class="fal fa-eye-slash eye-icon eye-active"></i>
                <i class="fal fa-eye eye-icon"></i>
            </button>
        </div>
        <div class="form__group">
            <span class="form__label">Mật khẩu</span>
            <input type="password" class="form__input" placeholder=" ">
            <label for="" class="label__place">Nhập mật khẩu mới</label>
            <span class="form__message">Mật khẩu phải có ít nhất 6 kí tự.</span>
            <!-- button show-hidden password -->
            <button class="hidden-show__password">
                <i class="fal fa-eye-slash eye-icon eye-active"></i>
                <i class="fal fa-eye eye-icon"></i>
            </button>
        </div>
        <div class="form__group--submit">
            <input type="submit" value="Lưu thay đổi" class="btn__submit primary-btn">
        </div>
    </form>
</div>