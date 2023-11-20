<section class="dashboard">
    <!----======== Header DashBoard ======== -->
    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <div class="search-box">
            <!-- <form action="" method="post">
                <i class="far fa-search"></i>
                <input type="text" placeholder="Search here...">
            </form> -->
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
            line-height: 32px;">Thêm Danh Mục</h1>
        </div>
        <!--DateTimelocal-->
        <div class="flex-between width-full" style="gap: 8px;
          align-items: center;">
            <div class="flex g8">
                <span class="label-large">Admin /</span><a href="#" class="label-large"
                    style="text-decoration: none;">Danh Mục</a>
            </div>
            <!-- <div class="flex-center g8">
                <span><i class="fa-solid fa-calendar-days"></i></span>
                <input class="label-large-prominent" type="datetime-local" style="color: #625B71; border: none; font-size: 16px;
              ">
            </div> -->
        </div>
    </div>
    <!----======== End Header DashBoard ======== -->
    
    <div class="containerAdmin_order-detail p30">
        
        <form enctype="multipart/form-data" action="" method="POST">
            <div class="sliderDashboard_order-add-create sliderDashboard_order-detail rounded-4">
            <?=@$error?>
            <div class="body_sliderDashboard_order-add-create p20 row">
                    <div class="col-7">
                        <div style="margin:0;" class="left-order-add-create">
                            <label style="font-size:20px;" class="form-label">Tên Danh Mục</label>
                            <input style="margin-bottom:5px;" name="add_name_cg" class="" type="text" value="" placeholder="Nhập Họ Và Tên"
                                aria-label="default input example">
                        </div>
                        <div style="margin:0;" class="left-order-add-create">
                            <label style="font-size:20px;" class="form-label">Thêm Mô Tả</label>
                            <textarea style="margin:0;" name="add_description_cg" id="textarea_update_cg" cols="30" rows="10"
                                placeholder="Nhập mô tả của danh mục đó vào đây đi..."></textarea>
                        </div>
                        <div style="margin:0;" class="left-order-add-create flex-column">
                            <label style="font-size:20px;" class="form-label">Màu Nền</label>
                            <input style="height:100px; width:200px;"  type="color" name="add_color_cg" id="">
                        </div>
                        


                    </div>
                    <div class="col-5 col-md">
                        <div class="right-order-add-create p30 d-flex justify-content-center flex-column ">
                            <div class="img_order-add-create rounded-4">
                                <img id="previewImage" src="">

                            </div>
                            <hr>
                            <div style="width: 100%;" id="drop-area">
                                <!-- <h3>Kéo thả ảnh ở đây</h3> -->
                                <input name="file" type="file" id="fileInput">
                            </div>

                            <div style="width: 100%;" id="demo" class="demo .box-shadow1">

                            </div>
                            <div style="width: 100%;" id="deleteButtonImg" class="button_delete_img row">
                                <div class="col-8"></div>
                                <div class="col-4 d-flex justify-content-between">
                                    <input name="btn_update_cg" value="Cập Nhật" type="submit"
                                        class="btn btn-primary "></input>
                                    <!-- <button type="button" id="deleteButtonAll" class="btn btn-danger">Xóa</button> -->
                                    <!-- <button class="btn box-shadow1" data-bs-toggle="modal" href="#exampleModalToggle" role="button">HỦY</button> -->
                                    <a  style="padding:12px 20px;" class="btn box-shadow1" data-bs-toggle="modal" href="#exampleModalToggle" role="button">HỦY</a>
                                </div>
                            </div>
                            <!-- Popup thông báo -->
                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header justify-content-center ">
                                        <h5 class="modal-title d-flex align-items-center"  id="staticBackdropLabel"><img src="./public/assets/media/images/logo.png" alt=""><p style="margin-left:10px; font-size:20px; color:#6750a4;">XÁC NHẬN</p></h5>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <div class="modal-body text-center">
                                        <h3 class="text-danger">Bạn có muốn hủy quá trình cập nhật ?</h3>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button style="padding:12px 20px;" type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                        <button style="padding:12px 20px;" type="button" class="btn btn-primary"><a style="color:white" href="?mod=admin&act=categories&page=1">Hủy</a></button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                                
                            <!--End popup thông báo -->
                        </div>
                        <div class="">
                            <span class="flex"></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</section>
<script>
  document.getElementById('fileInput').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('previewImage').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(file);
    }
  });
</script>
