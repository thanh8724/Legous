<?php
    $value_old_password = '';
    $message_oldPassword = '';
    $message_newPassword = 'Mật khẩu phải có ít nhất 8 kí tự.';
    $id_user = isset($_SESSION['userLogin']['id_user']) ? $_SESSION['userLogin']['id_user'] : $_SESSION['admin']['id_user'];
    $password_fromDB = get_password($id_user);
    if (isset($_POST['btn_change_password'])) {
        print_r('this is change password');
        // $old_password = $_POST['old_password'];
        // $new_password = $_POST['new_password'];
        // if (strlen($new_password) >= 8) {
        //     if ($old_password == $password_fromDB) {
        //         update_password($new_password, $id_user);
        //         $value_old_password = $new_password;
        //         $message_oldPassword = 'Đã cập nhật mật khẩu thành công.';
        //     } else if($old_password == "") {
        //         $message_oldPassword = 'Vui lòng điền mật khẩu để xác nhận.';
        //     }else if($old_password != $password_fromDB) {
        //         $message_oldPassword = 'Mật khẩu xác nhận không đúng.';
        //     }
        // } 
        // else {
        //     $value_old_password = $old_password;
        //     $message_newPassword = 'Mật khẩu phải có ít nhất 8 kí tự.';
        // }

        // if($_POST['new_password'] == $password_fromDB) {
        //     $value_old_password = $old_password;
        //     $message_oldPassword = 'Cập nhật mật khẩu thất bại.';
        //     $message_newPassword = 'Mật khẩu mới phải khác với mật khẩu cũ.';
        // }
    }
?>
<main class="main__user">
    <div class="main__inner">
        <div class="main__inner--top">
            <div class="avatar__image">
                <img srcset="upload/users/<?=$avatarImage_user?> 2x" alt="" class="avatar__image--user">
            </div>
            <div class="info__user">
                <div class="info__user--top">
                    <span class="user__name"><?=$username?></span>
                    <span>/</span>
                    <span>Cập nhật mật khẩu</span>
                </div>
                <div class="info__user--bottom">
                    <span class="info__user--desc">
                        Cập nhật và quản lý tài khoản của bạn
                    </span>
                </div>
            </div>
            <div class="box__changeAccount">
                <svg viewBox="0 0 20 20" fill="currentColor" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xfuq9xy x10w6t97 x1td3qas"><g fill-rule="evenodd" transform="translate(-446 -398)"><g fill-rule="nonzero"><path d="M96.628 206.613A7.97 7.97 0 0 1 96 203.5a7.967 7.967 0 0 1 2.343-5.657A7.978 7.978 0 0 1 104 195.5a7.978 7.978 0 0 1 5.129 1.86.75.75 0 0 0 .962-1.15A9.479 9.479 0 0 0 104 194a9.478 9.478 0 0 0-6.717 2.783A9.467 9.467 0 0 0 94.5 203.5a9.47 9.47 0 0 0 .747 3.698.75.75 0 1 0 1.381-.585zm14.744-6.226A7.97 7.97 0 0 1 112 203.5a7.967 7.967 0 0 1-2.343 5.657A7.978 7.978 0 0 1 104 211.5a7.978 7.978 0 0 1-5.128-1.86.75.75 0 0 0-.962 1.152A9.479 9.479 0 0 0 104 213a9.478 9.478 0 0 0 6.717-2.783 9.467 9.467 0 0 0 2.783-6.717 9.47 9.47 0 0 0-.747-3.698.75.75 0 1 0-1.381.585z" transform="translate(352 204.5)"></path><path d="M109.5 197h-2.25a.75.75 0 1 0 0 1.5h3a.75.75 0 0 0 .75-.75v-3a.75.75 0 1 0-1.5 0V197zm-11 13h2.25a.75.75 0 1 0 0-1.5h-3a.75.75 0 0 0-.75.75v3a.75.75 0 1 0 1.5 0V210z" transform="translate(352 204.5)"></path></g></g></svg>

                <div class="box__changeAccount--content box-shadow4">
                    <div class="box__listAccount">
                        <div class="box__listAccount--item">
                            <div class="box__avatar--account">
                                <img src="/public/assets/media/images/users/user-2.svg" alt="">
                            </div>
                            <div class="box__info--account">
                                <span class="info--account_name">Nguyen ThanhNguyen ThanhNguyen Thanh</span>
                                <span class="info--account_email">quocthanhn87@gmail.com</span>
                            </div>
                        </div>
                        <hr class="hr__account">
                        <div class="box__listAccount--item account__notActive">
                            <div class="box__avatar--account">
                                <img src="/public/assets/media/images/users/user-2.svg" alt="">
                            </div>
                            <div class="box__info--account">
                                <span class="info--account_name">Nguyen Thanh</span>
                                <span class="info--account_email">quocthanhn87@gmail.com</span>
                            </div>
                        </div>
                        <div class="box__listAccount--item account__notActive">
                            <div class="box__avatar--account">
                                <img src="/public/assets/media/images/users/user-2.svg" alt="">
                            </div>
                            <div class="box__info--account">
                                <span class="info--account_name">Nguyen Thanh</span>
                                <span class="info--account_email">quocthanhn87@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="box__changeAccount--logOut">
                        <a hred="#" class="box__changeAccount--logOut__button">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Đăng xuất</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__inner--bottom">
            <div class="main__inner--bottom-left">
                <ul class="menu__destop--ul">
                    <li class="menu__destop--li menu__active"><a href="?mod=user&act=general">Tổng Quan</a></li>
                    <li class="menu__destop--li "><a href="?mod=user&act=editprofile">Chỉnh sửa thông tin</a></li>
                    <li class="menu__destop--li "><a href="?mod=user&act=password">Mật khẩu</a></li>
                    <li class="menu__destop--li "><a href="?mod=user&act=address">Địa chỉ</a></li>
                    <li class="menu__destop--li "><a href="?mod=user&act=order-history">Lịch sử đơn hàng</a></li>
                    <li class="menu__destop--li "><a href="?mod=user&act=logOut-account&id-account=<?=$id_user?>">Đăng xuất</a></li>
                    <li class=" menu__destop--li delete__acccount"><a href="?mod=user&act=delete-account">Xóa tài khoản</a></li>
                </ul>
                
                <!-- menu mobile start -->
                <div class="box__menu--mobile">
                    <ul class="menu__mobile--ul">
                        <li class="menu__mobile--li">
                            <a href="?mod=user&act=general">
                                <i class="fas fa-home"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        <li class="menu__mobile--li">
                            <a href="?mod=user&act=editprofile">
                                <i class="fas fa-edit"></i>
                                <span>Chỉnh sửa</span>
                            </a>
                        </li>
                        <li class="menu__mobile--li">
                            <a href="?mod=user&act=password">
                                <i class="fas fa-lock"></i>
                                <span>Mật khẩu</span>
                            </a>
                        </li>
                        <li class="menu__mobile--li">
                            <a href="?mod=user&act=address">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Địa chỉ</span>
                            </a>
                        </li>
                        <li class="menu__mobile--li">
                            <a href="?mod=user&act=order-history">
                                <i class="fas fa-history"></i>
                                <span>Đơn hàng</span>
                            </a>
                        </li class="menu__mobile--li">
                        <li class="menu__mobile--li">
                            <a href="?mod=user&act=logOut-account&id-account=<?=$id_user?>">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </li>
                        <li class="delete__acccount menu__mobile--li">
                            <a href="?mod=user&act=delete-account">
                                <i class="fas fa-user-times"></i>
                            <span>Xóa tài khoản</span>
                        </a>
                        </li>
                    </ul>
                </div>
                <!-- menu mobile end -->
            </div>

            <div class="main__inner--bottom-right">
                <form action="?mod=user&act=password" method="POST" class="register__form">
                    <!-- <input type="hidden" vak> -->
                    <!-- normal form group -->
                    <div class="form__group">
                        <span class="form__label">Mật khẩu cũ</span>
                        <input type="password" value="<?= $value_old_password ?>" class="form__input password--input old_password" name="old_password" placeholder="Nhập mật khẩu cũ">
                        <!-- <label for="" class="label__place">Nhập mật khẩu cũ</label> -->
                        <span class="form__message form__message-oldPassword"><?= $message_oldPassword ?></span>
                        <!-- button show-hidden password -->
                        <button class="hidden-show__password">
                            <i class="fal fa-eye-slash eye-icon eye-active"></i>
                            <i class="fal fa-eye eye-icon"></i>
                        </button>
                    </div>
                    <div class="form__group">
                        <span class="get_passworDb" style="display: none;"><?= $password_fromDB ?></span>
                        <span class="get_newPassword" style="display: none;"><?= $new_password ?></span>
                        <span class="form__label">Mật khẩu mới</span>
                        <input type="password" class="form__input password--input new_password" name="new_password"  placeholder="Nhập mật khẩu mới ">
                        <!-- <label for="" class="label__place">Nhập mật khẩu mới</label> -->
                        <span class="form__message"><?= $message_newPassword ?></span>
                        <!-- button show-hidden password -->
                        <button name="btn_update" class="hidden-show__password">
                            <i class="fal fa-eye-slash eye-icon eye-active"></i>
                            <i class="fal fa-eye eye-icon"></i>
                        </button>

                    </div>
                    <div class="form__group--submit">
                        <input type="submit" name="btn_change_password" value="Lưu thay đổi" class="btn__submit primary-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="form__address--container" style="display: none;"></div>
</main>
<script src="./public/assets/resources/js/validator.js"></script>
<script>
    Validator({
        formSelector: '.register__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('.password--input'),
            Validator.isPassword('.password--input'),
        ]
    });


    let get_newPassword = document.querySelector('.get_newPassword');
    let message_oldPassword =document.querySelector('.form__message-oldPassword').innerText;
    if(message_oldPassword != "" && message_oldPassword != "Đã cập nhật mật khẩu thành công.") {
        let old_password = document.querySelector('.old_password');
        old_password.focus();
        old_password.classList.add('error_input');
        old_password.parentElement.children[2].classList.add('error_formMessage');
    }

    if(get_newPassword.innerText == "" || get_newPassword.innerText.length < 8 || get_newPassword.innerText == (get_newPassword.parentElement.children[0]).innerText) {
        (get_newPassword.parentElement.children[3]).focus();
        (get_newPassword.parentElement.children[3]).classList.add('error_input');
        (get_newPassword.parentElement.children[4]).classList.add('error_formMessage');
    }
</script>