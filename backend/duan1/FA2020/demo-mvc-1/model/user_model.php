<?php
function user_add($params = [])
{
    //cải tiến câu lệnh SQL cho phù hợp với truy vấn, nếu cột nào trống
    $sql = "INSERT INTO tb_user(username,email,passwd) VALUES (:username,:email,:passwd)";
    return pdo_execute($sql,$params);//trả về ID khi thêm mới
}
function user_list_all() 
{
    $sql = "SELECT * FROM tb_user ORDER BY username ASC";
    return pdo_query($sql);
}

function user_get_one($params =[])
{
    $sql = "SELECT * FROM tb_user WHERE 1 "; // chú ý có dấu cách ở cuối câu lệnh

    //phép nối các tham số vào câu lệnh SQL
    foreach($params as $field_name => $value)
$sql .= " AND {$field_name} = :{$field_name} "; // chú ý dấu cách
// vd: $sql .= " AND username= :username ";

return pdo_query_one($sql,$params);// trả về id khi thêm mới

}