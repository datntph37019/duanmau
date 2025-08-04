<h2>Danh sách người dùng</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Ngày tạo</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['created_at'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>