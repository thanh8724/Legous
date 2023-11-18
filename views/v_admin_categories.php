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
          <!-- <div class="flex-center g8">
            <span><i class="fa-solid fa-calendar-days"></i></span>
            <input class="label-large-prominent" type="datetime-local" style="color: #625B71; border: none; font-size: 16px;
                ">
          </div> -->
        </div>
      </div>
      <!----======== End Header DashBoard ======== -->

      <!----======== Body DashBoard ======== -->
      <div class="containerAdmin">
        <ul>
          <?php// foreach ($categories as $category): ?>
              <li><?php// echo htmlspecialchars($category['name']); ?></li>
          <?php //endforeach; ?>
          </ul>
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
              <li><a href="">Tên Danh mục</a></li>
              <li><a href="">Cũ nhất</a></li>
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
              <th>Tên Danh Mục</th>
              <th>Hình danh mục</th>
              <th>Mô tả danh mục</th>
              <th>Số lượng sản phẩm</th>
              <th>Ngày đã tạo</th>
              <th>Khác</th>
            </tr>
          </thead>
          <tbody>
            <!-- Thêm các hàng dữ liệu vào đây -->
            <?php foreach ($get_Category as $item): ?> 
                <tr>
                    <td style="text-align: start;">
                        <input type="checkbox" style="width: 18px; height: 18px;"></input>
                    </td>
                    <td>#<?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td style="width:100px;"><img style="width: 100%;
                        height: auto; 
                        display: block;
                        object-fit: cover;" src="./public/assets/media/images/category/<?= $item['img'] ?>" alt=""></td>
                    <td style="text-align:left;"><?= $item['description'] ?></td>
                    <td><?= count_products_category($item['id'])[0]['SLSP'] ?> sản phẩm</td>
                    <td><?= $item['create_date'] ?></td>
                    <td><a href="?mod=admin&act=categories&page=<?= $page_nows?>&id=<?=$item['id']?>" id="myButton">Xem chi tiết</a></td>
                </tr>
            <?php endforeach; ?>  
          </tbody>
        </table>
          <?php
            if(@$_GET['id']):
              $getidCategories = getidCategories($_GET['id'])
            ?>
              
              <div style=" 
                  font-size: 16px;
                  display:block;
                  position: fixed; /* Stay in place */
                  z-index: 1; /* Sit on top */
                  padding-top: 100px; /* Location of the box */
                  left: 0;
                  top: 0;
                  width: 100%; /* Full width */
                  height: 100%; /* Full height */
                  overflow: auto; /* Enable scroll if needed */
                  background-color: rgb(0,0,0); /* Fallback color */
                  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" id="myModal" class="modal">
                  <!-- Modal content -->
                  <div style=" background-color: #fefefe;
                  margin: auto;
                  padding: 20px;
                  border: 1px solid #888;
                  width: 50%;" class="modal-content">
                      <div style="width:100%;"><span style="float: inline-end;font-size:20px; cursor: pointer;"
                              class="close">&times;</span></div>
                        <form action="?mod=admin&act=categories&page=<?=$page_nows?>&id=<?=$id_category?>" method="POST">
                          <div class="mb-3">
                              <label class="form-label">Tên danh mục</label>
                              <input style="font-size: 16px; margin-bottom:20px;" type="text" name="name_cg" value="<?=$getidCategories['name']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text"></div>
                              <div class="mb-3">
                                  <label class="form-label">Mô tả danh mục</label>
                                  <textarea style="font-size: 16px;height:100px;margin-bottom:20px;" name="description_cg" class="form-control" placeholder="Nhập mô tả sản phẩm"><?=$getidCategories['description']?></textarea>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Mô tả danh mục</label>
                                  <input style="font-size: 16px;" class="form-control" type="file" name="" id="">
                              </div>
                          </div>
              
                         <button type="submit" name="submit" class="btn btn-primary float-end">Cập nhật</button>

                      </form>
                  </div>
              </div>
          <?php endif;?>
            
        <div class="flex mb30">
          <div class="options-number flex g16" >
            <?php for($i=1 ;$i <= $number_Page; $i++):?>
            <a href="?mod=admin&act=categories&page=<?=$i?>" class="<?=($page_nows==$i)?'primary-btn':''?>" style="padding: 10px 15px;"><?=$i?></a>
            <?php $page = $i; ?>
            <?php endfor;?>
            <?php
            ?>
              <a href="?mod=admin&act=categories&page=<?php
                if($number_Page == $page_nows){
                  echo '1';
                }
                else{
                  echo "$page";
                }
              ?>" class="flex-center g8"><i class="fa-solid fa-arrow-right"></i><span class="title-medium" >Next</span></a>
          </div>
        </div>
      </div>
      </div>

      <!----======== End Body DashBoard ======== -->

    </section>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById('myModal');
        var button = document.getElementById('myButton');
        var closeBtn = modal.querySelector(".close");

        button.addEventListener("click", function () {
            modal.style.display = "block";
        });

        closeBtn.addEventListener("click", function () {
            modal.style.display = "none";
        });
    });

</script>