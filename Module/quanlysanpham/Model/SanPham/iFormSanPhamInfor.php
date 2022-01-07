<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\quanlysanpham\Model\SanPham;

/**
 *
 * @author MSI
 */
interface iFormSanPhamInfor {
   
      static public function ThuongHieu($val = null);
      static public function TinhTrang($val = null);
      static public function Tag($val = null);
}
