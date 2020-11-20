<?php 
require_once APP_PATH .'/model/user_model.php';
switch($action){
    case 'login': 
        extract(DangNhap()); break;
        case 'lagout': 
            break;
     case 'cuong': echo "fdsfdsf";       
        default: break;

}
function DangNhap(){

    if(isset($_POST['username']))
    {
        //lấy dữ liệu khi người dùng bấm nút gửi dạng post
        $msg = '<br> Xin chào: '.$_POST['username'];
        $password = $_POST['passwd'];

        //lấy thông tin tài khoản qua username, không truyền password vào đây
        $userInfo = user_get_one( ['username' => $_POST['username'] ]);
        if(empty($userInfo))
            $msg = "không tồn tại tài khoản: ".$_POST['username'];
            else
            {
                //kiểm tra pass
                if($pass == $userInfo['passwd']) // nếu pass có mã hóa thì veryfy pass ở đây
                {
                    //đúng pass
                    $_SESSION['user'] = $userInfo;// ghi vào session
                    $msg = "Đăng nhập thành công!";
                }
                else
                {
                    $msg = "sai password";
                }

            }
    }

    $msg="ham dang nhap";
    if(isset($_POST['username'])){

        $msg.='xin chào '.$_POST['username'];
    }
    return [
        'view_name'=> 'user/login.php',
        'msg'=>$msg
    ];
}