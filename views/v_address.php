<?php
    $address_html = '';
    $address_setDefault_html = '';
    $address_default = '';
    $set_defaultButton = '';
     #code
    $id_user = $_SESSION['userLogin']['id_user'];
     $list_addressUser = get_address($id_user);

     # lấy ra địa chỉ được set là mặc định
     $id_addressDefault = 0;
     foreach (check_addressDefault() as $key) {
         extract($key);
         $id_addressDefault = $id;
         $is_addressDefault = $is_default;
     }
     # xử lí khi thêm địa chỉ mới
     if(isset($_POST['button_address'])) {
         $name_user = $_POST['full_userName'];
         $phone_user = $_POST['phoneUser'];
         $address_user = $_POST['address'];
         $address_detail = $_POST['address-detail'];
         if(isset($_POST['set_defaultAddress'])) {
             $address_default = 1;
             un_addressDefault($id_addressDefault);
         }else {
             $address_default = 0;
         }
         add_address($name_user, $phone_user, $address_detail, $address_user, $address_default, $id_user);
         header('location: ?mod=user&act=address');
         exit;
     }

     # thay đổi địa chỉ được set default
     if(isset($_POST['btn_set_addressDefault'])) {
         $id_address = $_POST['id-Address'];
         if($is_addressDefault == 1) {
             un_addressDefault($id_addressDefault);
         }
         set_defaultAddress($id_address);
         header('location: ?mod=user&act=address');
     }

     # xử lí sự kiện "trở lại" trong popup
     if(isset($_POST['back_address'])) {
         header('location: ?mod=user&act=address');
     }

    # edit UI
    foreach ($list_addressUser as $key) {
        extract($key);
        $id_address = $id;
        if($is_default == 1) {
            $address_setDefault_html = '<form action="" class="form__address" method="POST">
                                            <input type="hidden" name="id-Address" value="'.$id.'">
                                            <div class="form__address--left">
                                                <div class="form__address--left---rows-1">
                                                    <span>'.$username.'</span>
                                                    <span>|</span>
                                                    <span>(+84) '.$phone.'</span>
                                                </div>
                                                <div class="form__address--left---rows-2">
                                                    <span>'.$address_detail.'</span>
                                                    <span>'.$address.'</span>
                                                </div>
                                                <div class="form__address--left---rows-3">
                                                    <div class="label__default rounded-8 label-large">
                                                        Mặc định
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form__address--right">
                                                <div class="form__address--right---btn">
                                                    <div class="form__address--right---btn_top">
                                                        <a onclick="btn_editAddress()" href="?mod=user&act=edit-address&id-address='.$id_address.'">Cập nhật</a>
                                                    </div>
                                                    <div class="form__address--right---btn_bottom">
                                                        <input class="address__dafault label-large" type="submit" name="set__address--default" value="Thiết lập mặc định">
                                                    </div>
                                                </div>
                                            </div>  
                                        </form>
                                        <hr class="ouline-variant">';
        } 
        if($is_default == 0) {
            $address_html .= '<form action="" class="form__address" method="POST">
                                <input type="hidden" name="id-Address" value="'.$id.'">
                                <div class="form__address--left">
                                    <div class="form__address--left---rows-1">
                                        <span>'.$username.'</span>
                                        <span>|</span>
                                        <span>(+84) '.$phone.'</span>
                                    </div>
                                    <div class="form__address--left---rows-2">
                                        <span>'.$address_detail.'</span>
                                        <span>'.$address.'</span>
                                    </div>
                                    <div class="form__address--left---rows-3">
                                        '.$address_default.'
                                    </div>
                                </div>
                                <div class="form__address--right">
                                    <div class="form__address--right---btn">
                                        <div class="form__address--right---btn_top">
                                            <a onclick="btn_editAddress()" href="?mod=user&act=edit-address&id-address='.$id_address.'">Cập nhật</a>
                                            <span>|</span>
                                            <a href="?mod=user&act=delete-address&id-address='.$id.'">Xóa</a>
                                        </div>
                                        <div class="form__address--right---btn_bottom">
                                            <input type="submit" name="btn_set_addressDefault" value="Thiết lập mặc định">
                                        </div>
                                    </div>
                                </div>  
                            </form>
                            <hr class="ouline-variant">';
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
            <?php require_once 'views/box_changeAccountUser.php'; ?>
        </div>
        <div class="main__inner--bottom">
             <!-- user side bar start -->
             <?php require_once 'views/userSiderbar.php' ?>
            <!-- user side bar end -->

            <div class="main__inner--bottom-right">
                <h4>Danh sách địa chỉ</h4>
                
                <?= $address_setDefault_html ?>
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


<!-- form address -->
<section class="form__address--container full" id="form_add-address">
    <form action="" method="POST" class="form__address--content">
        <div class="form__address--content-rows1 flex">
            <!-- normal form group -->
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="text" name="full_userName" class="form__input" placeholder=" ">
                <label for="" class="label__place">Họ và tên</label>
                <span class="form__message">Thông tin bắt buộc</span>
            </div>
            <!-- normal form group -->
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="number" name="phoneUser" class="form__input" placeholder=" ">
                <label for="" class="label__place">Số điện thoại</label>
                <span class="form__message">thí is</span>
            </div>
        </div>
        <div class="form__address--content-rows2">
            <!-- normal form group -->
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="text" name="address" class="form__input" placeholder=" ">
                <label for="" class="label__place">Tỉnh/Thành phố, Quận/Huyện, Phường/Xã</label>
                <span class="form__message">.</span>
            </div>
        </div>
        <div class="form__address--content-rows2">
            <!-- normal form group -->
            <div class="form__group without-title">
                <!-- <span class="form__label"></span> -->
                <input type="text" name="address-detail" class="form__input" placeholder=" ">
                <label for="" class="label__place">Địa chỉ cụ thể</label>
                <span class="form__message"></span>
            </div>
        </div>
        <div class="form__address--content-rows3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3822.266122569526!2d105.8491695157099!3d21.02255898954545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a49315938351%3A0x641317b16f65f28c!2sVăn%20phòng%20Google%20Việt%20Nam!5e0!3m2!1svi!2svn!4v1649056555625!5m2!1svi!2svn" style="border:0; width: 100%; height: 100%;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="form__address--content-rows4">
            <input type="checkbox" name="set_defaultAddress">
            <label for="" class="label-large">Đặt làm địa chỉ mặc định</label>
        </div>
        <div class="form__address--content-rows5">
            <div class="form__group">
                <button  name="back_address" class="label-large" id="">Trở lại</button>
                <input type="submit" name="button_address" value="Lưu thông tin" class="label-large">
            </div>
        </div>
    </form>
</section>