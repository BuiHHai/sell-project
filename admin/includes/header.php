<div class="header">
    <div class="float-left">
        <i id="icon-open" onclick="handleChangeSidebar()" class="fa fa-align-right"></i>
    </div>
    <div class="float-right">
        <div class="img-box" style="background-image: url(<?php echo $_DOMAIN;?>static/images/logo.png);"></div>
        <div class="name">
            <?php echo($data_user["name"]) ?>
            <div><?php echo($data_user["name_role"]) ?></div>
        </div>
        <div class="profile">
            <i onclick="handleOpenPopup()" class="fa fa-caret-down"></i>
        </div>
        <div id="id-popup-hover-profile" class="popup-hover display-popup-profile">
            <div class="popup-sub"><a href="">Thông tin tài khoản</a></div>
            <div class="popup-sub"><a href="./templates/logout.php?session=<?php var_dump($session); ?>">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var opened = true;
    var openedPopup = false;
    function handleChangeSidebar(){
         var sidebar = document.getElementById("id-sidebar");
         var text  = document.getElementsByClassName('text-sidebar');
        if(opened){
            sidebar.classList.add("sidebar-closed");
            for(let i=0; i<text.length;i++){
                text[i].classList.add("text-sidebar-closed");
            }
            opened = false;
        }else{
            sidebar.classList.remove("sidebar-closed");
            for(let i=0; i<text.length;i++){
                text[i].classList.remove("text-sidebar-closed");
            }
             opened = true;
        }
    };
    function handleOpenPopup(){
        var popup  = document.getElementById("id-popup-hover-profile");
        if(!openedPopup){
            popup.classList.remove("display-popup-profile");
            openedPopup = true;
        }else{
            popup.classList.add("display-popup-profile");
            openedPopup = false;
        }
    }
</script>