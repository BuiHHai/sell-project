<div class="login-wrap">
    <div class="logo-login"><img style="width:30px;" src="<?php echo $_DOMAIN;?>static/images/logo.png">  <span>Old Beautiful</span></div>
    <div class="title">Chào mừng đến với hệ thống quản trị</div>
    <form method="POST">
        <div class="item">
            <div class="title-input">Tên đăng nhập:</div>
            <div class="container-input"><input class="input-custom" type="text" name="username" required></div>
        </div>
        <div class="item">
            <div class="title-input">Mật khẩu:</div>
            <div class="container-input"><input class="input-custom" type="password" name="password" required></div>
        </div>
        <div class="btn-login">
            <button type="submit" name="create">Đăng nhập</button>
        </div>
    </form>
</div>
<?php 
    if(isset($_POST['create'])){
        $username = $injection->db_escape_postparam($db->cn, "username");
        $password = $injection->db_escape_postparam($db->cn,"password");
        $sql_check_username =  "SELECT * FROM account_employee WHERE username = '$username'";
        if($db->num_rows($sql_check_username)){
            $password = md5($password);
            $sql_check_password = "SELECT * FROM account_employee WHERE username = '$username' and password='$password' and status = 1";
            if($db->num_rows($sql_check_password)){
                $session->set($username);
                $db->close(); 
                header("location:index.php");
            }
        }else{
           require_once 'templates/signin.php'; 
           $err = "Tên đăng lập không đúng";
           require_once 'templates/message-error.php'; 

        }
    }
 ?>
<style type="text/css">
    .login-wrap{
        background-color: #EAEDF3;
        width: 400px;
        height: 200px;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        position: absolute;
        border: 1px solid #6B6C6F;
        border-radius: 10px;
        padding: 10px 10px;
        font-family: arial;
    }
    .login-wrap .title{
        text-align: left;
        font-size: :26px;
        letter-spacing: 0;
        color: #6B6C6F;
        opacity: 1;
        font-weight: 600;
        text-align: center;
    }
     .login-wrap .logo-login{
        display: flex;
        align-items: center;
        justify-content: center;
     }
     .login-wrap .logo-login span{
        margin-left: 10px;
        font-weight: 600;
        text-align: center;
        font-size: :26px;
     }

     .login-wrap .item{
        margin-top: 15px;
        justify-content: space-between;
        display: flex;
        align-items: center;
     }
     .login-wrap .item .title-input{
        font-size: :18px;
        color: #6B6C6F;
        font-weight: 500;
        width: 80%;
     }
     .login-wrap .item .container-input{
        width: calc(100vh - 20%);
     }
     .login-wrap .item .container-input .input-custom{
        border-radius: 4px;
        width: 100%;
        height: 37px;
        border: 1px solid #6B6C6F;
     }
     .login-wrap .btn-login{
        margin-top: 15px;
        float: right;
     }
     .login-wrap .btn-login button{
        border: 1px solid #6B6C6F;
        height: 33px;
        border-radius: 6px;
        cursor: pointer;
     }
     .login-wrap .btn-login button:hover{
        transition: all 0.2s ease-in-out;
        transform: scale(1.009);
     }
</style>