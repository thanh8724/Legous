<?php
$getTotalBill = getBill();
$getProduct = getProducts();
$getUser = getUser();
$getCmt = getAllComment();
$totalBill = 0;
$totalSales = 0;
$totalUser = 0;
$totalCmt = 0;
foreach ($getTotalBill as $item) {
    $totalBill += $item['total'];
}
foreach ($getProduct as $item) {
    $totalSales += $item['purchases'];
}
foreach ($getUser as $item) {
    $totalUser++;
}
foreach ($getCmt as $item) {
    $totalCmt++;
}

?>
<section class="dashboard">
    <!----======== Header DashBoard ======== -->

    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <form style="width: 100%;display:flex; justify-content: center;" action="" method="post">
            <div class="search-box">
                <i class="far fa-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
        </form>
        <div class="info-user">
            <div class="notifiComment">
                <i class="far fa-comment-alt btnShowFeature"></i>
                <ul class="showFeatureAdminHeader box-shadow1">
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="notifiBell">
                <i class="fal fa-bell btnShowFeature"></i>
                <ul class="showFeatureAdminHeader box-shadow1">
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="imgUserAdmin">
                <img class="btnShowFeature" src="../assets/media/images/users/profile.jpg" alt="">
                <ul class="showFeatureAdminHeader box-shadow1">

                    <li><a class="body-small" href="#statisticalChart">Thống kê đơn hàng</a></li>
                    <li><a class="body-small" href="#recentOrder">Đơn Hàng Gần Đây</a></li>
                    <li><a class="body-small" href="#overviewDashboard">Tổng quan</a></li>
                    <li><a class="body-small" href="#">Đăng Xuất</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!----======== End Header DashBoard ======== -->

    <!----======== Body DashBoard ======== -->

    <!----======== Carousel DashBoard ======== -->

    <div class="containerAdmin" style="margin:0;">
        <div class="flex-column p30 g30" style="align-self: stretch; align-items: flex-start;">
            <div class="text">
                <h1 class="label-large-prominent" style="font-size: 24px;
                        line-height: 32px;">Bảng Điều Khiển</h1>
            </div>
            <!--DateTimelocal-->
            <div class="flex-between width-full" style="gap: 8px;
                        align-items: center;">
                <div class="flex g8">
                    <span class="label-large">Admin /</span><a href="#" class="label-large"
                        style="text-decoration: none;">Bảng Điều Khiển</a>
                </div>

            </div>
        </div>
        <!-- <div class="localDashboard p30">
                    <div class="col-12 d-flex mt-5 pt-5">
                        <div class="col-6">
                            <div class="col-12">
                                <h2 class="headline-small h2_dashboard">Bảng Điều Khiển</h2>
                            </div>
                            <div class="col-12">
                                <a class="body-medium aHref1" href="#">Admin</a> / <a href="#"
                                    class="body-medium aHref2">Bảng Điều Khiển</a>
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <section><i class="fal fa-calendar-alt calenderColor"></i> <span
                                    class="dateCalender label-medium ml12">Aug 21, 2023 - Aug 28, 2023</span></section>
                        </div>
                    </div>
                </div> -->
        <div class="owl-carousel owl-theme p30">
            <div class="item box-shadow4 slider_contain">
                <div class="slider_items p-4">
                    <div class="col-12 d-flex">
                        <div class="col-6">
                            <h5 class="label-large">Tổng doanh thu</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end align-content-center">
                            <i class="far fa-ellipsis-v"></i>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between align-items-center my-3">
                        <div class="d-flex align-items-center">
                            <button class="buttonWallet"><i class="far fa-wallet" style="color: #ffffff;"></i></button>
                            <p class="dashboard-moneyEarn title-medium"><span>
                                    <?php echo number_format($totalBill, 3, ',') ?> VNĐ
                                </span></p>
                        </div>
                        <div class="slider_items_stonks d-flex align-items-center">
                            <i class="far fa-external-link-alt"></i>
                            <p class="dashboard-percent body-medium">34.7%</p>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <p class="label-medium date-dashboardV">So với tháng 10 - 2023</p>
                    </div>
                </div>
            </div>
            <div class="item box-shadow4 slider_contain slider_contain-2">
                <div class="slider_items p-4">
                    <div class="col-12 d-flex">
                        <div class="col-6">
                            <h5 class="label-large">Sản Phẩm Đã Bán</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end align-content-center"><i
                                class="far fa-ellipsis-v"></i></div>
                    </div>
                    <div class="col-12 d-flex justify-content-between align-items-center my-3">
                        <div class="d-flex align-items-center">
                            <button class="buttonWallet"><i class="far fa-wallet" style="color: #ffffff;"></i></button>
                            <p class="dashboard-moneyEarn title-medium"><span>
                                    <?php echo $totalSales ?>
                                </span></p>
                        </div>
                        <div class="slider_items_stonks d-flex align-items-center">
                            <i class="far fa-external-link-alt"></i>
                            <p class="dashboard-percent body-medium">34.7%</p>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <p class="label-medium">So với tháng 10 - 2023</p>
                    </div>
                </div>
            </div>
            <div class="item box-shadow4 slider_contain slider_contain-3">
                <div class="slider_items p-4">
                    <div class="col-12 d-flex">
                        <div class="col-6">
                            <h5 class="label-large">Người dùng mới</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end align-content-center"><i
                                class="far fa-ellipsis-v"></i></div>
                    </div>
                    <div class="col-12 d-flex justify-content-between align-items-center my-3">
                        <div class="d-flex align-items-center">
                            <button class="buttonWallet"><i class="far fa-wallet" style="color: #ffffff;"></i></button>
                            <p class="dashboard-moneyEarn title-medium"><span>
                                    <?php echo $totalUser ?>
                                </span></p>
                        </div>
                        <div class="slider_items_stonks d-flex align-items-center">
                            <i class="far fa-external-link-alt"></i>
                            <p class="dashboard-percent body-medium">34.7%</p>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <p class="label-medium">So với tháng 10 - 2023</p>
                    </div>
                </div>
            </div>
            <div class="item box-shadow4 slider_contain slider_contain-4">
                <div class="slider_items p-4">
                    <div class="col-12 d-flex">
                        <div class="col-6">
                            <h5 class="label-large">Tổng Bình Luận</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end align-content-center"><i
                                class="far fa-ellipsis-v"></i></div>
                    </div>
                    <div class="col-12 d-flex justify-content-between align-items-center my-3">
                        <div class="d-flex align-items-center">
                            <button class="buttonWallet"><i class="far fa-wallet" style="color: #ffffff;"></i></button>
                            <p class="dashboard-moneyEarn title-medium"><span>
                                    <?php echo $totalCmt ?>
                                </span></p>
                        </div>
                        <div class="slider_items_stonks d-flex align-items-center">
                            <i class="far fa-external-link-alt"></i>
                            <p class="dashboard-percent body-medium">34.7%</p>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <p class="label-medium">So với tháng 10 - 2023</p>
                    </div>
                </div>
            </div>
        </div>
        <!----======== End Carousel DashBoard ======== -->

        <!----======== Statistical Chart ======== -->
        <div id="statisticalChart" class="statisticalChart p30">
            <div class="statisticalChartItems">
                <div class="col-12 d-xxl-flex customerOrderStatistics d-md-block d-sm-block">
                    <div class="col-xxl-7  col-lg-12 col-md-12 col-sm-12 p20 box-shadow3 orderStatistics">
                        <div class="col-12 d-flex">
                            <div class="col-6">
                                <p class="title-medium">Thống Kê Đơn Hàng</p>
                            </div>
                            <div class="col-6">
                                <ul class="nav nav-tabs myNavTabs" id="myTab" role="tablist">
                                    <li class="nav-item myNavItem" role="presentation" style="width: 50%;">
                                        <button style="width: 100%;" class="nav-link active" id="statistical"
                                            data-bs-toggle="tab" data-bs-target="#statistical-date" type="button"
                                            role="tab" aria-controls="statistical-date" aria-selected="true">Theo
                                            Ngày</button>
                                    </li>
                                    <li class="nav-item myNavItem" role="presentation" style="width: 50%;">
                                        <button style="width: 100%;" class="nav-link" id="statistical"
                                            data-bs-toggle="tab" data-bs-target="#statistical-month" type="button"
                                            role="tab" aria-controls="statistical-month" aria-selected="false">Theo
                                            Tháng</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="statistical-date" role="tabpanel"
                                    aria-labelledby="statistical" tabindex="0">
                                    <div style="width: 100%; height: 350px; margin: 0 auto;">
                                        <canvas id="myChart2"></canvas>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="statistical-month" role="tabpanel"
                                    aria-labelledby="statistical" tabindex="0">
                                    <div style="width: 100%; height: 350px; margin: 0 auto;">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-xxl-5 col-lg-12 col-md-12 col-sm-12 p20 box-shadow3 topUsers mt-xxl-0 mt-md-5 mt-sm-5 mt-5">
                        <div class="headerTopUser d-flex justify-content-between align-items-center">
                            <p class="title-medium">Người Dùng Hàng Đầu</p>
                            <button class="btnShowMoreInfoAdminDashboard">
                                <i class="far fa-ellipsis-v"></i>
                            </button>
                            <ul class="showMoreInfoAdminDashboard box-shadow1">
                                <li class=""><a class="title-medium" href="">Xem Chi Tiết</a></li>
                            </ul>
                        </div>
                        <div style="width: 100%; background-color: #49454f36; height: 1.5px; margin: 30px 0;"
                            class="lineAdmin"></div>
                        <div class="bodyTopUser">
                            <div class="topUserOder">
                                <?php
                                $bill = getBill();
                                $totalByUser = array();
                                $orderCountByUser = array();

                                foreach ($bill as $item) {
                                    if (!isset($totalByUser[$item['id_user']])) {
                                        $totalByUser[$item['id_user']] = 0;
                                        $orderCountByUser[$item['id_user']] = 0;
                                    }
                                    $totalByUser[$item['id_user']] += $item['total'];
                                    $orderCountByUser[$item['id_user']]++;
                                }

                                // Sắp xếp mảng theo thứ tự giảm dần
                                arsort($totalByUser);

                                // Lấy 6 phần tử đầu tiên
                                $totalByUser = array_slice($totalByUser, 0, 5, true);

                                foreach ($totalByUser as $userId => $total) {
                                    $user = getUserById($userId);
                                    ?>
                                    <div class="topUserOder_items">
                                        <div class="col-12 d-flex justify-content-between align-content-center">
                                            <div class="col-6 d-flex ">
                                                <div class="topUserOrder__image mr6">
                                                    <img src="./public/assets/media/images/users/<?php echo $user['img'] ?>"
                                                        alt="">
                                                </div>
                                                <div class="topUserOrder__info">
                                                    <div class="topUserOrder__name body-large">
                                                        <?php echo $user['fullname'] ?>
                                                    </div>
                                                    <div class="topUserOrder__role label-medium">Thành Viên Vip</div>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="topUserOrder_Spend">
                                                    <div class="topUserOrder_totalPayed title-medium">
                                                        <?php echo number_format($total) ?> VNĐ
                                                    </div>
                                                    <div class="topUserOrder_totalOrdered label-medium">
                                                        <?php echo $orderCountByUser[$userId] ?> orders
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>


                                <!-- <div class="topUserOder_items">
                                            <div class="col-12 d-flex justify-content-between align-content-center">
                                                <div class="col-6 d-flex ">
                                                    <div class="topUserOrder__image mr6">
                                                        <img src="../assets/media/images/users/profile.jpg" alt="">
                                                    </div>
                                                    <div class="topUserOrder__info">
                                                        <div class="topUserOrder__name body-large">Tâm và Gia Huy</div>
                                                        <div class="topUserOrder__role label-medium">Thành Viên Vip
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <div class="topUserOrder_Spend">
                                                        <div class="topUserOrder_totalPayed title-medium">12.389.900 VNĐ
                                                        </div>
                                                        <div class="topUserOrder_totalOrdered label-medium">5 orders
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="topUserOder_items">
                                            <div class="col-12 d-flex justify-content-between align-content-center">
                                                <div class="col-6 d-flex ">
                                                    <div class="topUserOrder__image mr6">
                                                        <img src="../assets/media/images/users/profile.jpg" alt="">
                                                    </div>
                                                    <div class="topUserOrder__info">
                                                        <div class="topUserOrder__name body-large">Tâm và Gia Huy</div>
                                                        <div class="topUserOrder__role label-medium">Thành Viên Vip
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <div class="topUserOrder_Spend">
                                                        <div class="topUserOrder_totalPayed title-medium">12.389.900 VNĐ
                                                        </div>
                                                        <div class="topUserOrder_totalOrdered label-medium">5 orders
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="topUserOder_items">
                                            <div class="col-12 d-flex justify-content-between align-content-center">
                                                <div class="col-6 d-flex ">
                                                    <div class="topUserOrder__image mr6">
                                                        <img src="../assets/media/images/users/profile.jpg" alt="">
                                                    </div>
                                                    <div class="topUserOrder__info">
                                                        <div class="topUserOrder__name body-large">Tâm và Gia Huy</div>
                                                        <div class="topUserOrder__role label-medium">Thành Viên Vip
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <div class="topUserOrder_Spend">
                                                        <div class="topUserOrder_totalPayed title-medium">12.389.900 VNĐ
                                                        </div>
                                                        <div class="topUserOrder_totalOrdered label-medium">5 orders
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="topUserOder_items">
                                            <div class="col-12 d-flex justify-content-between align-content-center">
                                                <div class="col-6 d-flex ">
                                                    <div class="topUserOrder__image mr6">
                                                        <img src="../assets/media/images/users/profile.jpg" alt="">
                                                    </div>
                                                    <div class="topUserOrder__info">
                                                        <div class="topUserOrder__name body-large">Tâm và Gia Huy</div>
                                                        <div class="topUserOrder__role label-medium">Thành Viên Vip
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <div class="topUserOrder_Spend">
                                                        <div class="topUserOrder_totalPayed title-medium">12.389.900 VNĐ
                                                        </div>
                                                        <div class="topUserOrder_totalOrdered label-medium">5 orders
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----======== End Statistical Chart ======== -->

        <!----======== Recent Order  ======== -->
        <div id="recentOrder" class="recentOrder p30">
            <div class="recentOrder_items p30 box-shadow3">
                <h2 class="title-medium">Đơn hàng gần đây</h2>
                <div class="tableLine"></div>
                <table>
                    <tr>
                        <th class="label-large tableLargeItems"><input type="checkbox">Order ID</th>
                        <th class="label-large">Sản Phẩm</th>
                        <th class="label-large">Ngày Đặt</th>
                        <th class="label-large">Tên Khách Hàng</th>
                        <th class="label-large">Trạng Thái</th>
                        <th class="label-large">Tổng</th>
                        <th class="label-large">Khác</th>
                    </tr>
                    <tr>
                        <td class="label-large tableLargeItems"><input type="checkbox">#2039124</td>
                        <td class="label-large">Iphone 11 pro max</td>
                        <td class="label-large">Feb 29,2023</td>
                        <td class="label-large">Trần Thị Hồng Ngọc</td>
                        <td class="label-large tableLargeItems" style="justify-content: center;"><span
                                class="dotTable green"></span>Đã Giao</td>
                        <td class="label-large">30.999.000 VNĐ</td>
                        <td class="label-large"><button><i class="far fa-ellipsis-h"></i></button></td>
                    </tr>
                    <tr>
                        <td class="label-large tableLargeItems"><input type="checkbox">#2039124</td>
                        <td class="label-large">Iphone 14 pro max</td>
                        <td class="label-large">Feb 29,2023</td>
                        <td class="label-large">Trần Thị Hồng Ngọc</td>
                        <td class="label-large tableLargeItems" style="justify-content: center;"><span
                                class="dotTable orange"></span>Đang Giao</td>
                        <td class="label-large">30.999.000 VNĐ</td>
                        <td class="label-large"><button><i class="far fa-ellipsis-h"></i></button></td>
                    </tr>
                    <tr>
                        <td class="label-large tableLargeItems"><input type="checkbox">#2039124</td>
                        <td class="label-large">Iphone 15 pro max</td>
                        <td class="label-large">Feb 29,2023</td>
                        <td class="label-large">Trần Thị Hồng Ngọc</td>
                        <td class="label-large tableLargeItems" style="justify-content: center;"><span
                                class="dotTable red"></span>Đã Hủy</td>
                        <td class="label-large">30.999.000 VNĐ</td>
                        <td class="label-large"><button><i class="far fa-ellipsis-h"></i></button></td>
                    </tr>
                </table>
            </div>

        </div>
        <!----======== End Recent Order ======== -->

        <!----======== OverView DashBoard  ======== -->
        <div id="overviewDashboard" class="overviewDashboard">
            <div class="col-12 d-xxl-flex d-md-block d-sm-block">
                <div class="col-xxl-4 p30 col-sm-12 com-md-12 ">
                    <div class="vitsitOverview box-shadow3">
                        <div class="vitsitOverview_item">
                            <div class="theadoverviewDashboard">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <p class="title-medium">Tổng quan lượt truy cập</p>
                                    <button class="btnsShowMoreInfoAdminDashboard">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="showMoreInfoAdminDashboard box-shadow1">
                                        <li class=""><a class="title-medium" href="">Xem Chi Tiết</a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="lineDashboard"></div>
                            <div class="weekyChart">
                                <div class="wekkyChart_item">
                                    <div class="loader">
                                        <div class="loading">
                                            <div class="lineLoading"></div>
                                        </div>
                                        <div class="loading">
                                            <div class="lineLoading2"></div>
                                        </div>
                                        <div class="loading">
                                            <div class="lineLoading3"></div>
                                        </div>
                                        <div class="loading">
                                            <div class="lineLoading4"></div>
                                        </div>
                                        <div class="loading">
                                            <div class="lineLoading5"></div>
                                        </div>
                                        <div class="loading">
                                            <div class="lineLoading6"></div>
                                        </div>
                                        <div class="loading">
                                            <div class="lineLoading7"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="sevenDayOfWeek d-flex">
                                <p class="label-small" style="color: #000;">Mon</p>
                                <p class="label-small" style="color: #000;">Tue</p>
                                <p class="label-small" style="color: #000;">Wed</p>
                                <p class="label-small" style="color: #000;">Thu</p>
                                <p class="label-small" style="color: #000;">Fri</p>
                                <p class="label-small" style="color: #FF5A5A;">Sat</p>
                                <p class="label-small" style="color: #FF5A5A;">Sun</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 p30 col-sm-12 com-md-12">
                    <div class="topProductSeller box-shadow3">
                        <div class="topProductSeller_item">
                            <div class="theadoverviewDashboard">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <p class="title-medium">Top sản phẩm bán chạy</p>
                                    <button class="btnsShowMoreInfoAdminDashboard">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="showMoreInfoAdminDashboard box-shadow1">
                                        <li class=""><a class="title-medium" href="">Xem Chi Tiết</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lineDashboard"></div>
                            <div class="ordertopProduct">
                                <div class="ordertopProduct_items">
                                    <?php
                                    $products = getProducts();
                                    $totalByProduct = array();
                                    $orderCountByUser = array();

                                    foreach ($products as $item) {
                                        if (!isset($totalByProduct[$item['id']])) {
                                            $totalByProduct[$item['id']] = 0;
                                            $orderCountByUser[$item['id']] = 0;
                                        }
                                        $totalByProduct[$item['id']] += $item['price'] * $item['purchases'];
                                        $orderCountByUser[$item['id']] += $item['purchases'];
                                    }

                                    // Sắp xếp mảng theo thứ tự giảm dần
                                    arsort($totalByProduct);

                                    // Lấy 6 phần tử đầu tiên
                                    $totalByProduct = array_slice($totalByProduct, 0, 6, true);

                                    foreach ($totalByProduct as $productId => $total) {
                                        $product = getProductById($productId);
                                        ?>
                                        <div class="ordertopProduct_item">
                                            <div class="col-12 d-flex justify-content-between">
                                                <div class="col-6 nameCategories">
                                                    <h2 class="body-large">
                                                        <?php echo $product['name'] ?>
                                                    </h2>
                                                    <p class="label-medium">Danh mục: <span>
                                                            <?php echo getCategoryById($product['id_category'])['name'] ?>
                                                        </span></p>
                                                </div>
                                                <div class="col-6 priceProduct">
                                                    <h2 class="body-large">
                                                        <?php echo number_format($total) ?> VNĐ
                                                    </h2>
                                                    <p class="label-medium">
                                                        <?php echo $orderCountByUser[$productId] ?> đã mua
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 p30 col-sm-12 com-md-12">
                    <div class="totalProfit box-shadow3">
                        <div class="totalProfit_items">
                            <div class="theadoverviewDashboard">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <p class="title-medium">Tổng quan lượt truy cập</p>
                                    <button class="btnsShowMoreInfoAdminDashboard">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="showMoreInfoAdminDashboard box-shadow1">
                                        <li class=""><a class="title-medium" href="">Xem Chi Tiết</a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="lineDashboard"></div>
                            <div style="width: 100%; height: 330px; margin: 0 auto;" class="p30">
                                <canvas id="myChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!----======== End OverView DashBoard  ======== -->

    </div>
    <footer class="adminFooter p30">
        <div class="col-12 d-flex">
            <div class="col-6">
                <p class="label-medium">® LEGOUS admin</p>
            </div>
            <div class="col-6">
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </footer>
    </div>


    <!----======== End Body DashBoard ======== -->

</section>