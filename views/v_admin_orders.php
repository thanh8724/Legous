<div class="containerAdmin">
        <div class="flex-column width-full">
          <div class="content-filter flex-column">
            <button onclick="" id="filter" class="flex-center g8" style="padding: 10px 16px;
                  border: 1px solid #79747E; border-radius: 100px;
                  margin-left: auto;">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M7.5 13.5H10.5V12H7.5V13.5ZM2.25 4.5V6H15.75V4.5H2.25ZM4.5 9.75H13.5V8.25H4.5V9.75Z"
                  fill="#6750A4" />
                <span class="label-medium fw-smb" style="color: #6750a4;">Lọc</span>
              </svg>
              
            </button>
            <ul id="dropdown-menu" class="dropdown-menu"
              style="margin-left: auto; align-items: flex-start; list-style: none;">
              <li><a href="">Tên Sản phẩm</a></li>
              <li><a href="">Giá</a></li>
              <li><a href="">Danh Mục</a></li>
              <li><a href="">Ngày - Tháng</a></li>
          </div>
        </div>
        <table class="content-table width-full">
          <thead>
            <tr>
              <th style="text-align: start;">
                <input type="checkbox" style="width: 18px; height: 18px;">
                </input>
              </th>
              <th>Order ID</th>
              <th>Tên Khách Hàng</th>
              <th>Phương Thức Thanh Toán</th>
              <th>Ngày Đặt</th>
              <th>Trạng Thái</th>
              <th>Tổng giá</th>
              <th>Khác</th>
            </tr>
          </thead>
          <tbody>
            <!-- Thêm các hàng dữ liệu vào đây -->
            <tr>
              <td style="text-align: start;">
                <input type="checkbox" style="width: 18px; height: 18px;">
                </input>
              </td>
              <td>#123891</td>
              <td>David Johnson</td>
              <td>Paypal</td>
              <td>Feb 24, 2023</td>
              <td style="color: #00B3FF;">Đã Giao Hàng</td>
              <td>12.289.090 đ</td>
              <td><a href="">Xem chi tiết</a></td>
            </tr>
            <tr>
              <td style="text-align: start;">
                <input type="checkbox" style="width: 18px; height: 18px;">
                </input>
              </td>
              <td>#123891</td>
              <td>David Johnson</td>
              <td>Paypal</td>
              <td>Feb 24, 2023</td>
              <td style="color: #00C58A;">Đang Chờ</td>
              <td>12.289.090 đ</td>
              <td><a href="">Xem chi tiết</a></td>
            </tr>
            <tr>
              <td style="text-align: start;">
                <input type="checkbox" style="width: 18px; height: 18px;">
                </input>
              </td>
              <td>#123891</td>
              <td>David Johnson</td>
              <td>Paypal</td>
              <td>Feb 24, 2023</td>
              <td style="color: #B3261E;">Đã Hủy</td>
              <td>12.289.090 đ</td>
              <td><a href="">Xem chi tiết</a></td>
            </tr>
            <tr>
              <td style="text-align: start;">
                <input type="checkbox" style="width: 18px; height: 18px;">
                </input>
              </td>
              <td>#123891</td>
              <td>David Johnson</td>
              <td>Paypal</td>
              <td>Feb 24, 2023</td>
              <td style="color:#F90;">Trả Hàng</td>
              <td>12.289.090 đ</td>
              <td><a href="">Xem chi tiết</a></td>
            </tr>

          </tbody>
        </table>

      </div>