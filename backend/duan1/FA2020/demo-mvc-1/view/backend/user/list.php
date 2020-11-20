<h1>Danh sách tài khoản</h1>
<table border="1" cellspacing="0" cellpadding="">
    <tr>
        <td>ID</td><td>Username</td><td>Email</td>
    </tr>

    <?php
        foreach ($list_users as $row)
        {
            //print_r($row);

            echo "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['username']}</td>v
                <td>{$row['email']}</td>
            ";
        }
    ?>
</table>