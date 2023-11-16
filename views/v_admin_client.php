<section class="dashboard">
      <!----======== Header DashBoard ======== -->
      <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <div class="search-box">
          <i class="far fa-search"></i>
          <input type="text" placeholder="Search here...">
        </div>
        <div class="info-user">
          <i class="far fa-comment-alt"></i>
          <i class="fal fa-bell"></i>
          <img src="/public/assets/media/images/users/user-1.svg" alt="">
        </div>
      </div>
      <div class="flex-column p30 g30" style="align-self: stretch; align-items: flex-start;">
        <div class="text">
          <h1 class="label-large-prominent" style="font-size: 24px;
              line-height: 32px;">Danh Mục</h1>
        </div>
        <!--DateTimelocal-->
        <div class="flex-between width-full" style="gap: 8px;
            align-items: center;">
          <div class="flex g8">
            <span class="label-large">Admin /</span><a href="#" class="label-large" style="text-decoration: none;">Danh Mục</a>
          </div>
          <div class="flex-center g8">
            <span><i class="fa-solid fa-calendar-days"></i></span>
            <input class="label-large-prominent" type="datetime-local" style="color: #625B71; border: none; font-size: 16px;
                ">
          </div>
        </div>
      </div>
      <!----======== End Header DashBoard ======== -->

      <!----======== Body DashBoard ======== -->
      <div class="containerAdmin">
        <div class="flex-column width-full">
        <div class="content-filter flex-column dropdown-center">
            <button id="filter" class="flex-center g8" style="padding: 10px 16px;
                  border: 1px solid #79747E; border-radius: 100px;
                  margin-left: auto;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M7.5 13.5H10.5V12H7.5V13.5ZM2.25 4.5V6H15.75V4.5H2.25ZM4.5 9.75H13.5V8.25H4.5V9.75Z"
                  fill="#6750A4" />
                <span class="label-medium fw-smb" style="color: #6750a4;">Lọc</span>
              </svg>
            </button>
            <ul class="dropdown-menu">
              <li><a href="">Tên Sản phẩm</a></li>
              <li><a href="">Giá</a></li>
              <li><a href="">Danh Mục</a></li>
              <li><a href="">Ngày - Tháng</a></li>
            </ul>
          </div>
        </div>
        <table class="content-table width-full">
          <thead>
            <tr>
              <th style="text-align: start;">
                <input type="checkbox" style="width: 18px; height: 18px;">
                </input>
              </th>
              <th>ID</th>
              <th>Họ Và Tên</th>
              <th>Tài Khoản</th>
              <th>Mật Khẩu</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Khác</th>
            </tr>
          </thead>
          <tbody>
            <!-- Thêm các hàng dữ liệu vào đây -->
            <?php 

            $user_list = getUser();
              foreach ($user_list as $item) {
                ?>
                <tr>
              <td style="text-align: start;">
                <input type="checkbox" style="width: 18px; height: 18px;">
                </input>
              </td>
              <td><?php echo $item['id']?></td>
              <td><?php echo $item['fullname']?></td>
              <td><?php echo $item['username']?></td>
              <td><?php echo md5($item['id'])?></td>
              <td><?php echo $item['email']?></td>
              <td><?php echo $item['phone']?></td>
              <td><a href="?mod=admin&act=client-edit&id=<?php echo $item['id'] ?>">Xem chi tiết</a></td>
            </tr>
            <tr>
              <td style="text-align: start;">
                <input type="checkbox" style="width: 18px; height: 18px;">
                </input>
              </td>
              <td>#123891</td>
              <td>Songoku</td>
              <td>songgokuvip</td>
              <td>******</td>
              <td>songgokuvip@gmail.com</td>
              <td>0766116989</td>
              <td><a href="">Xem chi tiết</a></td>
            </tr>
            <tr>
              <td style="text-align: start;">
                <input type="checkbox" style="width: 18px; height: 18px;">
                </input>
              </td>
              <td>#123891</td>
              <td>Songoku</td>
              <td>songgokuvip</td>
              <td>******</td>
              <td>songgokuvip@gmail.com</td>
              <td>0766116989</td>
              <td><a href="">Xem chi tiết</a></td>
            </tr>
            <tr>
              <td style="text-align: start;">
                <input type="checkbox" style="width: 18px; height: 18px;">
                </input>
              </td>
              <td>#123891</td>
              <td>Songoku</td>
              <td>songgokuvip</td>
              <td>******</td>
              <td>songgokuvip@gmail.com</td>
              <td>0766116989</td>
              <td><a href="">Xem chi tiết</a></td>
            </tr>
            
           

          </tbody>
        </table>
        <div class="flex mt30">
          <div class="options-number flex g16" >
            <button class="primary-btn" style="padding: 10px 15px;">1</button>
            <button class="btn">2</button>
            <button class="btn">3</button>
            <button class="btn">4</button>
            <button class="btn">5</button>
            <a href="" class="flex-center g8"><i class="fa-solid fa-arrow-right"></i><span class="title-medium" >Next</span></a>
          </div>
        </div>
      </div>
      </div>

      <!----======== End Body DashBoard ======== -->

    </section>