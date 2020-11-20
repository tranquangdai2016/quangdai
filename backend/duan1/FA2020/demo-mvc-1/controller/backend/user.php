<?php
require_once APP_PATH .'/model/user_model.php';
//đặt tên các action
//add:thêm mới,
//edit: sửa
//index: danh sách tài khoản
// delete: xóa

switch ($action) 
{
    case 'add': 
        extract( AddUser());
    break;
    case 'edit': 
    break;
    case 'delete': 
        break;
        default:
            extract(Index());
         break;
}
//-------------------------------viết hàm xử lý cho từng action
function AddUser ()
{
    $err = []; // mảng chứa lỗi
    if (isset($_POST['username']))
    {
        extract($_POST); // bung mảng post thành các biến tự do
        //validate
        if (empty($username)) 
        {
            $err[] ="Bạn cần nhập tên đăng nhâp";
        }
        //nếu không có lỗi thì ghi csdl
        if (empty($error))
        {
            //tạo ra mảng tham số để lưu csdl,key của mảng là tên cột trong bảng csdl
            $dataInsert = ['username'=>$username,
                            'email'=>$password,
                            'password'=>$password]; 

            $last_id = user_add($dataInsert);
            $msg = "thêm mới thành công,Id tài khoản mới: ".$last_id;
        }else
        {
            $msg = implode('<br>',$err);
        }
    }
    //hàm hiển thị danh sách tài khoản
   
    return ['view_name'=>'user/add.php',
            'new_id'=>@$last_id,
            'msg'=>@$msg
              ];
} 
function Index()
    {
        $list_user = user_list_all();

        return ['view_name'=>'user/list.php',
                'list_user'=>$list_user];
    }