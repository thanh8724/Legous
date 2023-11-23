<section class="dashboard">
  <!----======== Header DashBoard ======== -->
  <div class="top">
    <i class="fas fa-angle-left sidebar-toggle"></i>
    <form action="?mod=admin&act=product-search" method="post" style="width: 100%;display:flex; justify-content: center;">
    <div class="search-box">
            <input type="submit" value=""><i class="far fa-search"></i>
            <input name="keyword" value="" type="text" placeholder="Search here...">
          </div>
    </form>
    <div class="info-user">
      <i class="far fa-comment-alt"></i>
      <i class="fal fa-bell"></i>
      <img src="/public/assets/media/images/users/user-2.svg" alt="">
    </div>
  </div>
  <div class="detail flex-column p30 g30" style="align-self: stretch; align-items: flex-start;">
    <div class="text">
      <h1 class="label-large-prominent" style="font-size: 24px;
              line-height: 32px;">Sản Phẩm</h1>
    </div>
    <!--DateTimelocal-->
    <div class="flex-between width-full" style="gap: 8px;
            align-items: center;">
      <div class="flex g8">
        <span class="label-large">Admin /</span><a href="?mod=admin&act=products&page=1" class="label-large" style="text-decoration: none;">Sản Phẩm</a>
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
  <?php if (isset($_SESSION['loi'])) : ?>
                <div class="alert alert-danger" role="alert"><?= $_SESSION['loi'] ?></div>
            <?php endif;
            unset($_SESSION['loi']) ?>
    <div class="width-full mb-3">
      <div class="content-filter dropdown-center width-full d-flex align-items-center justify-content-between">
        <button id="btn_addMore_admin" type="button" style="width:130px;height:45px;background-color:#6750a4;border-radius:10px"><a style="color: white; font-size: 14px; font-weight: 500; text-decoration: none; padding: 10px 5px;" href="?mod=admin&act=product-add">Thêm Sản Phẩm</a></button>
      </div>
    </div>
    <div class="container-products width-full flex" style="flex-wrap: wrap; gap: 45px">
      <!--Cart-->
      <?php foreach ($ketqua as $item) : ?>
        <div class="cart trans-bounce flex-column p20" style="
                  border-radius: 12px;
                  border: 1px #DED8E1;
                  background:  #FFF;   
                  width: calc(100% / 3 - 30px);
                  ">
          <div class="v-nav" style="gap: 22px; flex: 1;">
            <div class="h-nav g12" style="justify-content: space-between;">
              <div class="img-cart flex" style="width: 120px; flex-shrink: 1;">
                <img src="./public/assets/media/images/product/<?= $item['img'] ?>" style="max-width: 100%; height: 100px;object-fit: cover; border-radius: 8px; flex-shrink: 0;" alt="">
              </div>
              <div class="text-info-cart flex-column" style="flex:1;gap: 12px; max-width: 160px;">
                <h1 class="title-medium" style="
                           word-break: break-all;display:-webkit-box;
                          -webkit-line-clamp:3;
                          -webkit-box-orient: vertical;
                          overflow: hidden;
                          text-overflow: ellipsis;
                          word-break: break-word;"><?= $item['name'] ?></h1>

                <p class="body-medium">Danh Mục: <?= $item['category_name'] ?></p>
                <span class="title-medium"><?= number_format($item['price']) ?> VNĐ</span>

              </div>
              <div class="options">
                <div class="flex-center dropdown" style="border-radius: 12px;background: #ECE6F0;">
                  <button type="button" data-bs-toggle="dropdown" aria-expanded="false" href=""><i class="fa-solid fa-ellipsis" style="padding: 8px; color: #6750a4;"></i></button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item label-large" href="?mod=admin&act=product-detail&id=<?= $item['id'] ?>">Xem Chi Tiết</a></li>
                    <li><button class="dropdown-item label-large" style="cursor: pointer;" onclick="remove_product(<?=$item['id'] ?>)">Xóa</button></li>
                  </ul>
                </div>
              </div>

            </div>
            <div class="description flex-column g2" style="flex: 1;">
              <div class="flex-column" style=" margin-top: auto;">
                <h1 class="title-medium">Tóm Tắt</h1>
                <p class="body-small" style="word-break: break-all;display:-webkit-box;
                        -webkit-line-clamp:3;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        word-break: break-word;"><?= $item['description'] ?></p>
              </div>
            </div>
            <!--INFO sales Qty -->
            <div class="info-sales-qty flex-column" style="padding: 14px; gap: 10px; border-radius: 4px; background: rgba(73, 69, 79, 0.08);">
              <div class="flex-between">
                <div class="Sales">
                  <span class="title-medium">Đã Bán</span>
                </div>
                <div class="index flex-center" style="gap: 4px;">
                  <i class="fa-solid fa-arrow-up" style="color: #00C58A;"></i>
                  <span class="fw-smb label-large-prominent" style="color: #00C58A;"><?= $item['purchases'] ?></span>
                </div>
              </div>
              <div class="flex-between">
                <div class="Qty">
                  <span class="title-medium">Sản Phẩm Còn Lại</span>
                </div>
                <div class="index flex-center" style="gap: 4px;">
                  <div class="flex" style="width: 36px; height: 4px; background: black;border: none; border-radius: 8px;padding-right: 0px;">
                    <span class="flex" style="width: 70%; background: #00C58A; border-radius: 8px; flex-shrink: 0;
                              align-self: stretch;"></span>

                  </div>
                  <span class="fw-smb label-large-prominent" style="color: #00C58A;"><?= $item['qty'] ?></span>
                </div>
              </div>

            </div>
            <!--INFO sales Qty - END -->
            <!--Cart-END-->
          </div>
        </div>
      <?php endforeach; ?>


    </div>
    <ul id="paging" class="pagination flex g16 mt30">
      <?php for ($i = 1; $i <= $soTrang; $i++) : ?>
        <li class="pagination__item <?= (isset($_GET['page']) && $_GET['page'] == $i) ? 'active' : '' ?>">
          <a href="?mod=admin&act=product-search&page=<?= $i ?> &kw=<?= $keyword ?>" class="pagination__link"><?= $i ?></a>
        </li>
      <?php endfor; ?>
      <li class="btn text-btn rounded-100 <?= $page >= $soTrang ? 'disabled' : '' ?>">
        <a href="?mod=admin&act=product-search&page=<?= $page + 1 ?> &kw=<?= $keyword ?> "" class=" pagination__link"><i class="fal fa-arrow-right" style="margin-right: .6rem"></i>Next</a>
      </li>
    </ul>


    <!----======== End Body DashBoard ======== -->

</section>
<script src="/public/assets/resources/js/pagination.js"></script>
<script>
  function remove_product(id) {
    var kq = confirm("Bạn chắc là có muốn xóa sản phẩm này không ?")
    if (kq) {
      window.location = '?mod=admin&act=product-delete=' + id;
    }
  }
</script>