<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

.row2 {
    max-width: 100%;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.font_title h1 {
    text-align: center;
    font-size: 2rem;
    color: #007bff;
    margin-bottom: 20px;
}

.form_content {
    width: 100%;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
}

table th,
table td {
    text-align: center;
    padding: 12px;
    border: 1px solid #ddd;
    word-wrap: break-word;
    font-size: 1rem;
}

table th {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #f1f9ff;
}

input[type="button"] {
    padding: 10px 20px;
    font-size: 1rem;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

input[type="button"]:hover {
    background-color: #0056b3;
}

.row.mb10 {
    text-align: center;
    margin-top: 20px;
}

@media screen and (max-width: 768px) {
    .row2 {
        padding: 15px;
    }

    table th,
    table td {
        font-size: 0.9rem;
        padding: 8px;
    }

    input[type="button"] {
        font-size: 0.9rem;
        padding: 8px 15px;
    }
}
input[type="button"] {
    padding: 12px 25px;
    font-size: 1rem;
    color: #fff;
    background-color: #28a745; /* Màu xanh lá nổi bật */
    border: none;
    border-radius: 8px;
    cursor: pointer;
    margin-right: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

input[type="button"]:hover {
    background-color: #218838; /* Màu xanh đậm hơn khi hover */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
}

input[type="button"]:active {
    transform: scale(0.98); /* Hiệu ứng khi nhấn nút */
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}
 /* Background */
 body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            min-height: 100vh;
            padding: 20px;
        }
</style>
<div class="row2">
  <div class="row2 font_title">
    <h1>DANH SÁCH TÀI KHOẢN</h1>
  </div>
  <div class="row2 form_content">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table>
          <tr>
            <th></th>
            <th>MÃ TK</th>
            <th>TÊN ĐĂNG NHẬP</th>
            <th>MẬT KHẨU</th>
            <th>EMAIL</th>
            <th>ĐỊA CHỈ</th>
            <th>SĐT</th>
            <th>VAI TRÒ</th>
          </tr>
          <?php
            foreach($listtaikhoan as $taikhoan){
              extract($taikhoan);
              $suatk="index.php?act=sua_tk&id=".$id;
              $xoatk="index.php?act=xoa_tk&id=".$id;
              if($role==1){
                $r = 'admin';
              }
              if($role==0){
                $r = 'user';
              }
              echo '<tr>
                <td><input type="checkbox" name="" id="" /></td>
                    <td>'.$id.'</td>
                    <td>'.$user.'</td>
                    <td>'.$pass.'</td>
                    <td>'.$email.'</td>
                    <td>'.$address.'</td>
                    <td>'.$tel.'</td>
                    <td>'.$r.'</td>
                <td>                    
                </td>
            </tr>';
            }
          ?>
        </table>
      </div>
      <div class="row mb10">
        <input class="mr20" type="button" value="CHỌN TẤT CẢ" />
        <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ" />
      </div>
    </form>
  </div>
</div>