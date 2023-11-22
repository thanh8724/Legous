<?php
    # code...
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
                    <span>Lịch sử đơn hàng</span>
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
            <div class="main__inner--bottom-right">
                <div class="main__inner--bottom-right--content flex-column">
                    <div class="bottom-right--content_top flex j-end">
                        <button class="filter__btn rounded-100 g8 flex-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M7.5 13.5H10.5V12H7.5V13.5ZM2.25 4.5V6H15.75V4.5H2.25ZM4.5 9.75H13.5V8.25H4.5V9.75Z" fill="#6750A4"/>
                            </svg>
                            <span>Filter</span>
                        </button>
                    </div>
                    <div class="bottom-right--content_main flex full">
                        <table class="full">
                            <thead class="full">
                                <tr>
                                    <th class="label-large-prominent"><input type="checkbox"></th>
                                    <th class="label-large-prominent">Order ID</th>
                                    <th class="label-large-prominent">Tên Khách Hàng</th>
                                    <th class="label-large-prominent">PTTT</th>
                                    <th class="label-large-prominent">Ngày Đặt</th>
                                    <th class="label-large-prominent">Trạng Thái</th>
                                    <th class="label-large-prominent">Tổng Giá</th>
                                    <th class="label-large-prominent">Khác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($order_history as $item ) {
                                        extract($item);
                                        $name_payment = get_namePayment($id_payment);
                                        echo' <tr>
                                                <td class="label-large-prominent"><input type="checkbox"></td>
                                                <td class="label-large-prominent"><span>'.$id.'</span></td>
                                                <td class="label-large-prominent"><span>'.$name_recipient.'</span></td>
                                                <td class="label-large-prominent"><span>'.$name_payment.'</span></td>
                                                <td class="label-large-prominent"><span>'.$create_date.'</span></td>
                                                <td class="label-large-prominent delivered"><span>'.$status.'</span></td>
                                                <td class="label-large-prominent"><span class="price">'.formatVND($total).'</span></td>
                                                <td class="label-large-prominent">
                                                    <a href="?mod=user&act=order-detail&id='.$id.'" class="label-large-prominent">Xem chi tiết</a>
                                                </td>
                                            </tr>
                                        ';
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="bottom-right--content_bottom flex-between full">
                        <div class="list__dots flex g16">
                            <div class="list__dots--item flex-center rounded-8 dots-active">1</div>
                            <div class="list__dots--item flex-center rounded-8">2</div>
                            <div class="list__dots--item flex-center rounded-8">3</div>
                            <div class="list__dots--item flex-center rounded-8">4</div>
                            <div class="btn__next--dots flex-center label-large btn-next flex g8"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M9 3L7.9425 4.0575L12.1275 8.25H3V9.75H12.1275L7.9425 13.9425L9 15L15 9L9 3Z" fill="#6750A4"/>
                                </svg> Next</div>
                        </div>
                        <div onclick="button_back()" class="btn-back flex-center label-large flex g8"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M15 8.25H5.8725L10.065 4.0575L9 3L3 9L9 15L10.0575 13.9425L5.8725 9.75H15V8.25Z" fill="#6750A4"/>
                            </svg> Trở lại trang trước</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>