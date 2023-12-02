<?php 
$idProduct = $_GET['id'];
if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $id_category = $_POST['id_category'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $img = $_FILES["file"]["name"];
        $qty = $_POST['qty'];
        $kq = product_checkName($name);
        if ($kq) {
            $_SESSION['loi'] = 'Đã có tên sản phẩm này <strong>' . $name . '</strong>';
        } else {
            product_edit($idProduct,$name,$id_category,$description,$price, $img, $qty);
            $_SESSION['thongbao'] = 'Đã Chỉnh sửa thành công <strong>' . $name . '</strong>';
        }
        if (isset($_FILES['file'])) {
            //Thư mục chứa file upload
            $upload_dir = './public/assets/media/images/users/';
            //Đường dẫn của file sau khi upload
            $upload_file = $upload_dir . $_FILES['file']['name'];
            //Xử lý upload đúng file ảnh
            $type_allow = array('png', 'jpg', 'jpeg', 'gif');
            //PATHINFO_EXTENSION lấy đuôi file
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            // echo $type;
            if(!in_array(strtolower($type), $type_allow)) {
                $error['type'] = "Chỉ được upload file có đuôi PNG, JPG, GIF, JPEG";
            }
        
            #Upload file có kích thước cho phép (<20mb ~ 29.000.000BYTE)
            $file_size = $_FILES['file']['size'];
            if($file_size > 29000000) {
                $error['file_size'] = "Chỉ được upload file bé hơn 20MB";
            }
            #Kiểm tra trùng file trên hệ thống
            if(file_exists($upload_file)) {
                // $error['file_exists'] = "File đã tồn tại trên hệ thống";
                // Xử lý đổi tên file tự động
                #Tạo file mới
                // TênFile.ĐuôiFile
                $filename = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
                $new_filename = $filename.'- Copy.';
                $new_upload_file = $upload_dir.$new_filename.$type;
                $k=1;
                while(file_exists($new_upload_file)) {
                    $new_filename = $filename." - Copy({$k}).";
                    $k++;
                    $new_upload_file = $upload_dir.$new_filename.$type;
                }
                $upload_file = $new_upload_file;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                    $image = $new_filename.$type;
                } 
            }else {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                    $filename = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
                    $image = $filename.$type;
                } 
            }
        }
    }

?>
<section class="dashboard">
            <!----======== Header DashBoard ======== -->
            <div class="top">
                <i class="fas fa-angle-left sidebar-toggle"></i>
                <div class="search-box">
                    <i class="far fa-search"></i>
                    <input type="text" placeholder="Tìm kiếm...">
                </div>
                <div class="info-user">
            <div class="notifiComment">
                <i class="far fa-comment-alt btnShowFeature"></i>
                <ul class="showFeatureAdminHeader box-shadow1">
                    <?php
                    $getCmt = getAllComment();
                    arsort($getCmt);
                    $getCmt = array_slice($getCmt, 0, 6, true);
                    foreach ($getCmt as $item) {
                       
                        $getUser = getUserById($item['id_user']);
                        $getProduct = getProductById($item['id_product']);
                        ?>
                        <li>
                            <div class="col-12 d-flex">
                                <div class="col-2">
                                    <img class="notifiAdminImg"
                                        src="./public/assets/media/images/users/<?php echo $getUser['img'] ?>" alt="">
                                </div>
                                <div class="col-10">
                                    <p class="notifiAdminText body-small"><strong>
                                            <?php echo $getUser['fullname'] ?>
                                        </strong><span> đã bình luận ở sản phẩm <strong><a href="">
                                                    <?php echo $getProduct['name'] ?>
                                                </a></strong></span></p>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="notifiBell">
                <i class="fal fa-bell btnShowFeature"></i>
                <ul class="showFeatureAdminHeader box-shadow1">
                <?php
                    $getBill = getBill();
                    arsort($getBill);
                    $getBill = array_slice($getBill, 0, 6, true);
                    foreach ($getBill as $item) {
                       
                        $getUser = getUserById($item['id_user']);
                        ?>
                        <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="./public/assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong><?php echo $getUser['fullname']?></strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong><?php echo $item['id']?></strong></span></p>
                            </div>
                        </div>
                    </li>
                        <?php
                    }
                    ?>
                    
                </ul>
            </div>
            <div class="imgUserAdmin">
                <?php
                $getID = $_SESSION['admin']['id_user'];
                $getUser = getUserById($getID);
                ?>
                <img style="" class="btnShowFeature"
                    src="./public/assets/media/images/users/<?php echo $getUser['img'] ?>" alt="">
                <ul class="showFeatureAdminHeader box-shadow1">

                    <li><a class="body-small" href="#statisticalChart">Thống kê đơn hàng</a></li>
                    <li><a class="body-small" href="#recentOrder">Đơn Hàng Gần Đây</a></li>
                    <li><a class="body-small" href="#overviewDashboard">Tổng quan</a></li>
                    <li><a class="body-small" href="?mod=user&act=logOut-account">Đăng Xuất</a></li>
                </ul>
            </div>
        </div>
            </div>
            <!----======== End Header DashBoard ======== -->

            <!----======== Body DashBoard ======== -->
            <div class="containerAdmin_order-detail p30">
                <div class="localDashboard">
                    <div class="col-12 d-flex">
                        <div class="col-6">
                            <div class="col-12">
                                <h2>Chi tiết sản phẩm</h2>
                            </div>
                            <div class="col-12">
                                <span class="label-large">Admin /</span><a href="#" class="label-large"
                                    style="text-decoration: none;">Sản Phẩm</a>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="sliderDashboard_order-add-create sliderDashboard_order-detail rounded-4">
                <?php if (isset($_SESSION['thongbao'])) : ?>
                <div class="alert alert-success" role="alert"><?= $_SESSION['thongbao'] ?></div>
            <?php endif;
            unset($_SESSION['thongbao']) ?>
            <?php if (isset($_SESSION['loi'])) : ?>
                <div class="alert alert-danger" role="alert"><?= $_SESSION['loi'] ?></div>
            <?php endif;
            unset($_SESSION['loi']) ?>
                    <form action="" enctype="multipart/form-data" method="post">
                    <div class="body_sliderDashboard_order-add-create p20 row">
                        <div class="col-7">
                                <div class="left-order-add-create">
                                    <h2>Tên Sản Phẩm</h2>
                                    <input class="" type="text" name="name" placeholder="<?=$productdetail['name']?>"
                                        aria-label="default input example">
                                </div>
                                <div class="describe-order_detail">
                                    <h2>Mô Tả</h2>
                                    <textarea name="description" id="tiny" cols="30" rows="10"
                                        placeholder="<?=$productdetail['description']?>"></textarea>
                                </div>
                                <div class="Dropdowns_categogy">
                                    <h2>Danh mục</h2>
                                    <div class="custom-select">
                                        <!-- Dropdown -->
                                        <select id="dropdown" onchange="updateInput()" name="id_category">
                                            <option value="1" <?=($productdetail['id_category'] == 1)?'selected':''?>>Ninja Go</option>
                                            <option value="2" <?=($productdetail['id_category'] == 2)?'selected':''?>>Naruto</option>
                                            <option value="3" <?=($productdetail['id_category'] == 3)?'selected':''?>>dragon ball</option>
                                            <option value="4" <?=($productdetail['id_category'] == 4)?'selected':''?>>Marvel & DC</option>
                                            <option value="5" <?=($productdetail['id_category'] == 5)?'selected':''?>>One Piece</option>
                                            <option value="6" <?=($productdetail['id_category'] == 6)?'selected':''?>>Car</option>
                                            <option value="7" <?=($productdetail['id_category'] == 7)?'selected':''?>>Gundam</option>
                                            <option value="8" <?=($productdetail['id_category'] == 8)?'selected':''?>>Kimetsu no Yaiba</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" style="margin-bottom: 30px;">
                                        <h2>Sản phẩm còn lại</h2>
                                        <input style="" class="" name="qty" type="text" placeholder="1000"
                                            aria-label="default input example">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h2>Giá</h2>
                                        <input class="" name="price" type="text" placeholder="<?=number_format($productdetail['price'])?> VNĐ"
                                            aria-label="default input example">
                                    </div>
                                    <div class="col-6">
                                        <h2>Giá khuyến mãi</h2>
                                        <input class="" type="text" placeholder="1.000.000"
                                            aria-label="default input example">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="rol-6 mt-3">
                                     <input style="color: #fff ;padding: 10px 15px; font-size: 14px; font-weight: 500;" class="btn btn-primary" type="submit" name="submit" value="Sửa Sản Phẩm">
                                    </div>
                                </div>
                        </div>
                        <div class="col-5 col-md">
                            <div class="right-order-add-create p30 d-flex justify-content-center flex-column ">
                                <div class="img_order-add-create rounded-4">
                                <img src=./public/assets/media/images/product/<?=$productdetail['img']?>>
                                </div>
                                <hr>
                                <div style="width: 100%;" id="drop-area">
                                    <h3>Kéo thả ảnh ở đây</h3>
                                    <input type="file" id="img" name="file">
                                </div>

                                <div style="width: 100%;" id="demo" class="demo .box-shadow1">
                                    
                                </div>
                                <div style="width: 100%;" id="deleteButtonImg" class="button_delete_img row">
                                    <div class="col-4"></div>
                                    <div class="col-8 d-flex justify-content-between">
                                        <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary ">
                                        <button type="button" id="deleteButtonAll" class="btn btn-danger">Xóa</button>
                                        <button type="button" class="btn box-shadow1 ">Hủy</button>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <span class="flex"></span>
                            </div>
                        </div>
                    </div>
                </form>
                </div>

            </div>

            <!----======== End Body DashBoard ======== -->

        </section>
        <script>
            
        tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  menubar: 'file edit view'
});
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('fileInput');
        const demoDiv = document.getElementById('demo');
        var count = 0;
        var idValue = '';

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);

        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        dropArea.addEventListener('drop', handleDrop, false);
        fileInput.addEventListener('change', handleFiles, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight() {
            dropArea.classList.add('highlight');

        }

        function unhighlight() {
            dropArea.classList.remove('highlight');
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        function handleFiles(files) {
            files = [...files];
            files.forEach(uploadFile);
        }

        function createImageContainer() {
            count++;
            const newChuahinhDiv = document.createElement('div');
            newChuahinhDiv.className = 'chuahinh';
            const tenchuahinh1 = 'chuahinh'
            const tenchuahinh2 = tenchuahinh1.concat("", count);
            newChuahinhDiv.id = tenchuahinh2;

            const newImageContainer = document.createElement('div');
            newImageContainer.id = 'image-container';

            newChuahinhDiv.appendChild(newImageContainer);
            demoDiv.appendChild(newChuahinhDiv);

        }

        function uploadFile(file) {
            createImageContainer(); // Tạo phần tử <div> chứa ảnh

            const url = URL.createObjectURL(file);
            const img = new Image();
            img.src = url;

            const newChuahinhDiv = document.querySelector('.chuahinh:last-child'); // Chọn phần tử "chuahinh" cuối cùng

            // Tạo các phần tử div bên trong "chuahinh" và cấu trúc HTML tương ứng
            const div1 = document.createElement('div');
            const div2 = document.createElement('div');
            div2.className = 'nameimg';
            const div3 = document.createElement('div');

            const h3 = document.createElement('h3');
            h3.textContent = 'ảnh ở đây nè';

            const thanhnangluong = document.createElement('div');
            thanhnangluong.className = 'flex thanhnangluong';
            const loithanhnangluong = document.createElement('span');
            // loithanhnangluong.classList = '':  
            thanhnangluong.appendChild(loithanhnangluong);

            loithanhnangluong.classList = 'flex ';

            // const deleteButton = document.createElement('i');
            // deleteButton.classList = 'fa-regular fa-circle-xmark';
            // const tenxoahinh1 = 'deleteButtonSingle'
            // const tenxoahinh2 = tenxoahinh1.concat("", count);
            // deleteButton.id = tenxoahinh2;

            // Tạo một nút xóa riêng lẻ cho phần tử này
            const deleteButton = document.createElement('i');
            deleteButton.classList = 'fa-regular fa-circle-xmark';
            const tenxoahinh1 = 'deleteButtonSingle'
            const tenxoahinh2 = tenxoahinh1.concat("", count);
            deleteButton.id = tenxoahinh2;

            // Gắn sự kiện xóa cho nút xóa này
            deleteButton.addEventListener('click', function () {
                newChuahinhDiv.remove();
                console.log(countdetele);
            });

            // Thêm nút xóa vào phần tử newChuahinhDiv
            newChuahinhDiv.appendChild(deleteButton);

            div1.appendChild(img);
            div2.appendChild(h3);
            div2.appendChild(thanhnangluong);
            div3.appendChild(deleteButton);

            newChuahinhDiv.appendChild(div1);
            newChuahinhDiv.appendChild(div2);
            newChuahinhDiv.appendChild(div3);

            document.getElementById('deleteButtonImg').style.display = 'flex';
        }
        function removeAllImageContainers() {
            const deleteButtonAll = document.getElementById('deleteButtonAll');
            deleteButtonAll.addEventListener('click', function () {
                const imageContainers = document.querySelectorAll('.chuahinh');
                imageContainers.forEach(function (container) {
                    container.remove();
                });
                // Sau khi xóa tất cả phần tử, bạn có thể ẩn nút xóa (nếu cần)
                const deleteButtonImg = document.getElementById('deleteButtonImg');
                deleteButtonImg.style.display = 'none';
            });
        } removeAllImageContainers();

    </script>