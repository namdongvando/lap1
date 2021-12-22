<?php

namespace Module\giaodien;

class Functions {

    //put your code here
    public function __construct() {
        
    }

    static function menulayout($module) {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "Module_baiviet"]) == true) {
            ?> 
            <li class="treeview <?php echo $module == 'giaodien' ? 'giaodien' : '' ?>">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Giao Diện</span> 
                </a>
                <ul class="treeview-menu">
                    <li><a href="/giaodien/slider/"><i class="fa fa-circle-o"></i> Banner Động</a></li>

                </ul>
            </li>
            <?php
        }
    }

}
