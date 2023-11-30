<?php
    $address_html = '';
    $address_default = '';
    $set_defaultButton = '';
    if(isset($_SESSION['userLogin']) && (is_array($_SESSION['userLogin']) || is_object($_SESSION['userLogin']) && count($_SESSION['userLogin']) > 0)){
        extract($_SESSION['userLogin']);
    }
    
    $id_user = $_SESSION['userLogin']['id_user'];
    # get user name account
    extract(checkAccount($id_user));
    $name_userAccount = $username;
     # cập nhật lại địa chỉ
    $message_phoneError = '';
    $class_add = '';
    $error_message = '';
    $error_input = '';
    $phone_errorInput = '';
     if(isset($_GET['id-address']) && ($_GET['id-address']) > 0) {
         $id_address = $_GET['id-address'];
         #lấy address để kiểm tra có là địa chỉ mặc định không
         foreach (check_addressDefault() as $key) {
             extract($key);
             $id_addressDefault = $id;
             $is_addressDefault = $is_default;
         }
        # lấy địa chỉ từ db
        foreach (get_addressByid($id_address) as $key) {
            extract($key);
            if($is_default == '0') {
                $checked_html = '<input type="checkbox" name="set_defaultAddress">';
            }else {
                $checked_html = '<input type="checkbox" name="set_defaultAddress" checked>';
            }
        }
        #kiểm tra nếu bấm cập nhật thì thực hiện
        if(isset($_POST['btn_edit-address'])) {
            if($_POST['full_userName'] == "") {
                $name_user = $username;
            }else {
                $name_user = $_POST['full_userName'];
            }
            if($_POST['phoneUser'] == "") {
                $phone_user = $phone;
            }else {
                $phone_user = $_POST['phoneUser'];
            }
            if($_POST['address'] == "") {
                $address_user = $address;
            }else {
                $address_user = $_POST['address'];
            }
            if($_POST['address-detail'] == "") {
                $address_detail = $address;
            }else {
                $address_detail = $_POST['address-detail'];
            }
            if(isset($_POST['set_defaultAddress'])) {
                $address_default = 1;
                if(isset($id_addressDefault)) {
                    un_addressDefault($id_addressDefault);
                }
            }else {
                $address_default = 0;
            }
            # kiểm tra số điện thoại có thỏa mãn điều kiện hay không
            $phone_input = $_POST["phoneUser"];
            $pattern =  "/^0[2|3|5|6|7|8|9][0-9]{8}$/";
            if (preg_match($pattern, $phone_input) ||  $_POST["phoneUser"] == "") {
                $phone_user = $phone;
                upadate_address($name_user, $phone_user, $address_detail, $address_user, $address_default, $id_address);
                header('location: ?mod=user&act=address');
                exit;
            } else {
                $error_message = 'error_formMessage';
                $error_input = 'error_input';
                $class_add = 'show';
                $message_phoneError = 'Số điện thoại không hợp lệ.';
                $phone_errorInput = $phone_input;
            }
        }
    }

    # xử lí khi bấm trở lại trong popup chứ không có gì hết >_<
    if(isset($_POST['back_address'])) {
        header('location: ?mod=user&act=address');
    }
?>
<main class="main__user">
    <div class="main__inner">
        <div class="main__inner--top">
            <div class="avatar__image">
                <img srcset="<?=$avatarImage_user?> 2x" alt="" class="avatar__image--user">
            </div>
            <div class="info__user">
                <div class="info__user--top">
                    <span class="user__name"><?=$name_userAccount?></span>
                    <span>/</span>
                    <span>Địa chỉ</span>
                </div>
                <div class="info__user--bottom">
                    <span class="info__user--desc">
                        Update your username and manage your account
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
                    <li class="menu__destop--li "><a href="">Đăng xuất</a></li>
                    <li class=" menu__destop--li delete__acccount"><a href="user-deleteAccount.html">Xóa tài khoản</a></li>
                </ul>
                
                <!-- menu mobile start -->
                <div class="box__menu--mobile">
                    <ul class="menu__mobile--ul">
                        <li class="menu__mobile--li">
                            <a href="user-general.html">
                                <i class="fas fa-home"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        <li class="menu__mobile--li">
                            <a href="user-editProfile.html">
                                <i class="fas fa-edit"></i>
                                <span>Chỉnh sửa</span>
                            </a>
                        </li>
                        <li class="menu__mobile--li">
                            <a href="user-password.html">
                                <i class="fas fa-lock"></i>
                                <span>Mật khẩu</span>
                            </a>
                        </li>
                        <li class="menu__mobile--li">
                            <a href="user-address.html">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Địa chỉ</span>
                            </a>
                        </li>
                        <li class="menu__mobile--li">
                            <a href="user-ordersHistory.html">
                                <i class="fas fa-history"></i>
                                <span>Đơn hàng</span>
                            </a>
                        </li class="menu__mobile--li">
                        <li class="menu__mobile--li">
                            <a href="">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </li>
                        <li class="menu__mobile--li">
                            <a href="">
                                <i class="fas fa-exchange-alt"></i>
                                <span>Chuyển đổi</span>
                            </a>
                        </li>
                        <li class="delete__acccount menu__mobile--li">
                            <a href="user-deleteAccount.html">
                                <i class="fas fa-user-times"></i>
                            <span>Xóa tài khoản</span>
                        </a>
                        </li>
                    </ul>
                </div>
                <!-- menu mobile end -->
            </div>

            <div class="main__inner--bottom-right">
                <h4>Danh sách địa chỉ</h4>
                
                <?= $address_html ?>

                <div class="add_new-addres--box">
                    <div class="form__group form__group--submit">
                        <button onclick="btn_addAddress()" class="btn__submit" id="button_add-address">+ Thêm địa chỉ mới</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<section  class="form__address--container full <?=$class_add?>" id="form_edit-address">
    <form action="" method="POST" class="form__address--content">
        <!-- <input type="hidden" name="id-address" value=""> -->
        <div class="form__address--content-rows1 flex">
            <!-- normal form group -->
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="text" id="name" name="full_userName" class="form__input input--name form__inputAddress" placeholder="<?=$username?>">
                <!-- <label for="" class="label__place">Họ và tên</label> -->
                <span class="form__message"></span>
            </div>
            <!-- normal form group -->
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="number" name="phoneUser" class="form__input input--phone form__inputAddress <?=$error_input?>" placeholder="<?=$phone?>" value="<?=$phone_errorInput?>">
                <!-- <label for="" class="label__place">Số điện thoại</label> -->
                <span class="form__message <?=$error_message?>"><?=$message_phoneError?></span>
            </div>
        </div>
        <div class="form__address--content-rows2">
            <!-- normal form group -->
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="text" name="address" class="form__input input--address_top form__inputAddress" placeholder="<?=$address?>">
                <!-- <label for="" class="label__place">Tỉnh/Thành phố, Quận/Huyện, Phường/Xã</label> -->
                <span class="form__message"></span>
            </div>
        </div>
        <div class="form__address--content-rows2">
            <!-- normal form group -->
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="text" name="address-detail" class="form__input input--address_bottom form__inputAddress" placeholder="<?=$address_detail?>">
                <!-- <label for="" class="label__place">Địa chỉ cụ thể</label> -->
                <span class="form__message"></span>
            </div>
        </div>
        <div class="form__address--content-rows3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3822.266122569526!2d105.8491695157099!3d21.02255898954545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a49315938351%3A0x641317b16f65f28c!2sVăn%20phòng%20Google%20Việt%20Nam!5e0!3m2!1svi!2svn!4v1649056555625!5m2!1svi!2svn" style="border:0; width: 100%; height: 100%;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="form__address--content-rows4">
            <?=$checked_html?>
            <label for="" class="label-large">Đặt làm địa chỉ mặc định</label>
        </div>
        <div class="form__address--content-rows5">
            <div class="form__group">
                <a href="?mod=user&act=address" name="back_address" class="label-large" id="">Trở lại</a>
                <input type="submit" name="btn_edit-address" value="Cập nhật thay đổi" class="label-large">
            </div>
        </div>
    </form>
</section>
<script src="./public/assets/resources/js/validator_ofNQT.js"></script>
<script>
    Validator({
        formSelector: '.form__address--content',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            // Validator.isPhone('.input--phone', 'Số điện thoại không hợp lệ.'),
        ]
    })
</script>
<script>
    var inputs = document.querySelectorAll(".form__inputAddress");
    for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].parentElement.children[2].innerText === "") {
            inputs[i].classList.remove("error_input");
            inputs[i].parentElement.children[1].classList.remove('error_formMessage');
            inputs[i].parentElement.children[2].classList.remove('error_message');
        }
    }
</script>