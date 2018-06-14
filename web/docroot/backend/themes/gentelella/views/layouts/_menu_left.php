<?php
//use app\models\UserAuth;
//$user = app\models\UserModel::findOne(Yii::$app->user->id);
?>

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <!--<div class="menu_section">
        <h3>จัดการ Content</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Content หลัก <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/wonderkide/mainmenu">จัดการเมนูหลัก</a></li>
                    <li><a href="/wonderkide/footer">จัดการ Footer</a></li>
                    <li><a href="/wonderkide/main/contact">จัดการ Contact</a></li>
                    <li><a href="/wonderkide/main/allowuser">จัดการ User ห้ามใช้</a></li>
                    <li><a href="/wonderkide/rules">จัดการ Rules</a></li>
                    <li><a href="/wonderkide/content">content อื่นๆ</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-picture-o"></i> จัดการ Icon & Logo <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/wonderkide/main/icon">จัดการ Icon</a></li>
                    <li><a href="/wonderkide/main/logo">จัดการ Logo</a></li>
                    <li><a href="/wonderkide/feeling/icon">จัดการ Icon Feeling</a></li>
                    <li><a href="/wonderkide/feeling/icon-active">จัดการ Icon Feeling active</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Comment</h3>
        <ul class="nav side-menu">
            <li><a href="/wonderkide/comment"><i class="fa fa-commenting"></i> จัดการ comment </a></li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Memory & Galery</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-camera"></i> Galery <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/wonderkide/gallery">Gallery</a></li>
                    <li><a href="/wonderkide/galleryimage">Gallery Images</a></li>
                </ul>
            </li>
            <li><a href="/wonderkide/memory"><i class="fa fa-sticky-note"></i> Memory </a></li>
            <li><a href="/wonderkide/alert"><i class="fa fa-clock-o"></i> Alert </a></li>
            <li><a href="/wonderkide/expend"><i class="fa fa-money"></i> Expend </a></li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Tags</h3>
        <ul class="nav side-menu">
            <li><a href="/wonderkide/tags"><i class="fa fa-tags"></i> จัดการ Tag </a></li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Football & games</h3>
        <ul class="nav side-menu">
            <li><a href="/wonderkide/league"><i class="fa fa-futbol-o"></i> จัดการ League </a></li>
            <li><a><i class="fa fa-futbol-o"></i> จัดการ Match <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/wonderkide/match">รายการทั้งหมด</a></li>
                    <li><a href="/wonderkide/match/pull">ดูดรายการและราคา</a></li>
                    <li><a href="/wonderkide/match/updateresult">อัพเดทผลการแข่งขัน</a></li>
                </ul>
            </li>
            <li><a href="/wonderkide/games/calculateticket"><i class="fa fa-futbol-o"></i> จัดการบอลสเต็ป </a></li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Message</h3>
        <ul class="nav side-menu">
            <li><a href="/wonderkide/contact?sort=-create_time"><i class="fa fa-paper-plane"></i> จัดการข้อความ contact </a></li>
            <li><a href="/wonderkide/report?sort=-create_time"><i class="fa fa-paper-plane"></i> จัดการข้อความ report </a></li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>ระบบยศและค่าประสบการณ์</h3>
        <ul class="nav side-menu">
            <li><a href="/wonderkide/exp"><i class="fa fa-level-up"></i> ข้อมูลค่าประสบการณ์ </a></li>
            <li><a><i class="fa fa-level-up"></i> อนุมัติค่าประสบการณ์ <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/wonderkide/like/check">ตรวจสอบการ LIKE</a></li>
                    <li><a href="/wonderkide/feeling">ตรวจสอบ Feeling</a></li>
                    <li><a href="/wonderkide/feeling/point">เพิ่ม Point Feeling</a></li>
                    <li><a href="/wonderkide/logexp/check">ตรวจสอบค่าประสบการณ์ทั้งหมด</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-level-up"></i> ระบบยศ <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/wonderkide/rank">ข้อมูลยศ</a></li>
                    <li><a href="/wonderkide/rank/levelup">ตรวจสอบการเพิ่มยศ</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>SEO</h3>
        <ul class="nav side-menu">
            <li><a href="/wonderkide/url"><i class="fa fa-link"></i> จัดการ Url </a></li>
        </ul>
    </div>-->
    <?php 
    //if(UserAuth::PERMISSION_DEVIL == $user->permission){
    ?>
    <div class="menu_section">
        <h3>Users</h3>
        <ul class="nav side-menu">
            <li><a href="/user"><i class="fa fa-users"></i> จัดการ user </a></li>
        </ul>
    </div>
    <!--<div class="menu_section">
        <h3>Setting</h3>
        <ul class="nav side-menu">
            <li><a href="/wonderkide/setting"><i class="fa fa-lock"></i> การตั้งค่าระบบ </a></li>
            <li><a href="/wonderkide/logdata"><i class="fa fa-history"></i> ประวัติการทำงาน </a></li>
        </ul>
    </div>-->
    <?php //} ?>

</div>
<!-- /sidebar menu -->