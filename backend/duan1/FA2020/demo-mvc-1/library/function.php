<?php
function StopWebsite ()
{
    die("STOP");
}

function CheckACL ($module, $controller, $action)
{
    $arr_public = [
        'frontend'=>[//module
            'index'=>['index','lien-he1'], //controller => action
            'user'=>['login','logout','register'] 
        ]
    ];

    //kiểm tra module
    if(!in_array( $module, array_keys($arr_public) ))
    {
        // Module này không có trong danh sách tên module public ===> yêu cầu đăng nhập
        if(empty(isset($_SESSION['user'])))
        {
            // chưa đăng nhập
            header("Location:" . BASE_URL . '/?controller=user&action=login');
            exit();
        }
        else
        {
            //kiểm tra controller 
            // ở đây đã đăng nhập rồi thì thôi không cần kiểm tra controller nữa.
        }

    }
    else
    {
        // module truy cập đang là publications
        // kiểm ttra controller ở trong module hiện tại

        if(!in_array( $controller, array_keys($arr_public[$module]) ))
        {
            // trong module public, nhưng controller không được liệt kê là public
            //==> yêu cầu đăng nhập
            if(empty(isset($_SESSION['user'])))
            {
                //chưa đăng nhập
                header('Location:'. BASE_URL .'/?controller=user&action=login');
                exit(); 
            }
            else 
            {
                //controller là public , kiểm tra action
                if(!in_array ( $action, $arr_public[$module] )) 
                {
                    // action là private thì yêu cầu đăng nhập
                    if(empty(isset($_SESSION['user']))) 
                    {
                        // chưa đăng nhập
                        header('Location:'. BASE_URL .'?controller=user&action=login');
                        exit();
                    }
                }
            }
           
            }
        }
    }