<?php

namespace Controller;

use Model\TinTuc;

class quanlytin {

    public function __construct() {
        
    }

    function index() {

        $tinTuc = new TinTuc();
        $tinTuc->DanhSachTin();
    }

    function themtin() {
        echo "Thêm tin";
    }

}
