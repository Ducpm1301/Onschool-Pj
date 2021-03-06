<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.15.4-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/list.css">
    <script src="../jquery/jquery.js"></script>
    <script src = "../js/list.js"></script>
</head>
<body>

                                        <!-- HEADER -->
    <div class="container">
    </div>
    <div class="container">
        <div class="row block">
            <div class="col">
                <h1 class="text-center">Danh sách sinh viên</h1>
            </div>
            <div class="col moveBtn">
                <button class="btn addBtn float-end" onclick="document.location.href='addstudent.php'">+ Thêm mới sinh viên</button>
            </div>
        </div>
    </div>

                            <!-- SEARCH STUDENT BY TYPICAL INFOMATION -->

    <div class="container">
        <div class="row mb-2 row-cols-md-2 row-cols-lg-auto justify-content-lg-around" id ="searchInfo">
            <div class="col mb-2 col1 d-md-flex justify-content-md-start">
                <input type="text" class ="round" id="fullname" placeholder="Họ và tên">
            </div>
            <div class="col mb-2 col2 d-md-flex justify-content-md-start">
                <input type="text" class ="round" id="fileId" placeholder="Mã hồ sơ">
            </div>
            <div class="col mb-2 col3 d-md-flex justify-content-md-start">
                <input type="text" class ="round" id="fileId" placeholder="Mã sinh viên">
                <button class="searchBtn" style ="border-radius: 5px;"><i class="fas fa-search"></i></button>
            </div>
            <div class="col mb-2 col4 d-md-flex justify-content-md-start">
                <input type="text" class ="round" name ="searchBox" id ="searchBox" placeholder="Tìm kiếm với từ khóa bất kỳ">
            </div>
        </div>
    </div>

                                        <!-- INFOMATION TABLE -->

    <div style ="overflow-x: auto;">
        <table class="table table-bordered table-hover text-center">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã hồ sơ</th>
                <th scope="col">Mã sinh viên</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Nơi sinh</th>
                <th scope="col">CMND/CCCD</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>TVU01925</td>
                <td>123654789</td>
                <td>Huỳnh Thị Kim Hồng</td>
                <td>Nữ</td>
                <td>20/10/1995</td>
                <td>0941256478</td>
                <td>honghn@gmail.com</td>
                <td>Hà Nội</td>
                <td>00119522222</td>
                <td>Hà Đông-Hà Nội</td>
                <td>
                    <button class="editBtn"><i class="fas fa-edit"></i></button>
                    <button class="deleteBtn"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>TVU01926</td>
                <td>123654788</td>
                <td>Trương Trung Quân</td>
                <td>Nam</td>
                <td>20/10/1996</td>
                <td>0988123846</td>
                <td>quantt@gmail.com</td>
                <td>Hà Nam</td>
                <td>00119522225</td>
                <td>Thanh Xuân-Hà Nội</td>
                <td>
                    <button class="editBtn"><i class="fas fa-edit"></i></button>
                    <button class="deleteBtn"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>TVU01927</td>
                <td>123654678</td>
                <td>Nguyễn Minh Trang</td>
                <td>Nữ</td>
                <td>13/10/1996</td>
                <td>0966893674</td>
                <td>trangnm@gmail.com</td>
                <td>Nam Định</td>
                <td>00119522263</td>
                <td>Hoàng Mai-Hà Nội</td>
                <td>
                    <button class="editBtn"><i class="fas fa-edit"></i></button>
                    <button class="deleteBtn"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>TVU01928</td>
                <td>123654679</td>
                <td>Phạm Quỳnh Vân</td>
                <td>Nữ</td>
                <td>20/07/1996</td>
                <td>0378962034</td>
                <td>vanpq1234@gmail.com</td>
                <td>Ninh Thuận</td>
                <td>00119522932</td>
                <td>Ba Đình-Hà Nội</td>
                <td>
                    <button class="editBtn"><i class="fas fa-edit"></i></button>
                    <button class="deleteBtn"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
    </div>

                                            <!-- FOOTER -->

    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-end">
                <ul class="pagination pagination-sm">
                    <li class ="page-item"><a href="#" class="page-link"><i class="fas fa-caret-left"></i></a></li>
                    <li class ="page-item"> <a href="#" class="page-link">1</a></li>
                    <li class ="page-item"><a href="#" class="page-link"><i class="fas fa-caret-right"></i></a></li>
                </ul>
            </div>
            <div class="col d-flex justify-content-end">
                <label class ="me-2 text-light">Số bản ghi mỗi trang</label>
                <select id="amt">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
            </div>
        </div>
    </div>

</body>
</html>