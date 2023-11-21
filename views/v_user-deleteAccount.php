<?php
    $id_user = $_SESSION['id_user'];
    if(isset($_POST['deleteAccount'])) {
        if(isset($_POST['confirm_delete'])) {
            delete_acccount($id_user);
            header('location: ?mod=page&act=home');
        }
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
                    <span>Tổng quan</span>
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
                    <li class="menu__destop--li "><a href="?mod=user&act=logOut-account&id-account=<?= $id_user ?>">Đăng xuất</a></li>
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
                        <form action="" method="POST">
                            <div class="form__group">
                                <label for="username"
                                 class="title-medium">Xóa tài khoản của bạn</label>
                                <span class="label-large">Nếu muốn giảm thông báo qua email, bạn có thể tắt chúng tại đây hoặc nếu bạn chỉ muốn thay đổi tên người dùng của mình, bạn có thể làm điều đó tại đây. Xin lưu ý, việc xóa tài khoản là quyết định cuối cùng. Sẽ không có cách nào để khôi phục tài khoản của bạn.</span>
                            </div>
                            <!-- checkbox form group -->
                            <div class="form__group without-title">
                                <div class="flex g6">
                                    <input type="checkbox" name="confirm_delete" class="input">
                                    <div class="form__label">Tôi đã hiểu rõ, xóa tài khoản là quyết định của tôi</div>
                                </div>
                            </div>
                            <div class="form__group form__group--submit">
                                <div class="box__delete--account">
                                    <i class="far fa-trash-alt">
                                        <input type="submit" name="deleteAccount" value="Xóa tài khoản" class="btn__delete">
                                    </i>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</main>