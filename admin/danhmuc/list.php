<style>
.container {
    max-width: 1000px;
    margin: 30px auto;
    font-family: 'Segoe UI', sans-serif;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.alert-success {
    padding: 15px;
    background-color: #d4edda;
    color: #155724;
    border-left: 6px solid #28a745;
    border-radius: 6px;
    margin-bottom: 20px;
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.btn-add {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    margin-bottom: 20px;
    transition: background-color 0.3s;
}

.btn-add:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

th, td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    color: #333;
}

.action-links a {
    color: #007bff;
    margin: 0 8px;
    text-decoration: none;
}

.action-links a:hover {
    text-decoration: underline;
    color: #0056b3;
}
</style>

<div class="container">
    <h1>Danh sách danh mục</h1>

    <?php if (isset($thongbao)): ?>
        <div class="alert-success">
            <?= $thongbao ?>
        </div>
    <?php endif; ?>

    <a href="index.php?act=adddm" class="btn-add">+ Thêm danh mục mới</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Hành động</th>
        </tr>

        <?php foreach ($listdanhmuc as $danhmuc): ?>
            <tr>
                <td><?= $danhmuc['id'] ?></td>
                <td><?= $danhmuc['name'] ?></td>
                <td class="action-links">
                    <a href="index.php?act=suadm&id=<?= $danhmuc['id'] ?>">Sửa</a> | 
                    <a href="index.php?act=xoadm&id=<?= $danhmuc['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
