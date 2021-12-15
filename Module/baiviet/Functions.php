<?php

namespace Module\baiviet;

class Functions {

    //put your code here
    public function __construct() {
        
    }

    static function menulayout($module) {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "Module_baiviet"]) == true) {
            ?> 
            <li class="treeview <?php echo $module == 'baiviet' ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Quản lý bài viết</span> 
                </a>
                <ul class="treeview-menu">
                    <li><a href="/baiviet/duan/"><i class="fa fa-circle-o"></i> Dự Án</a></li>
                </ul>
            </li>
            <?php
        }
    }

}
