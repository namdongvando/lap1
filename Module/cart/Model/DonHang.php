<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\cart\Model;

/**
 * Description of DonHang
 *
 * @author MSI
 */
class DonHang extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {
    const  ThanhCong = 3;
    const Huy = -1;

    //put your code here
    public $Id,
            $Code,
            $TinhTrang,
            $SDT, $Email, $HoTen, $NgayTao, $NgayGiaoHang, $TongTien, $SoSP, $TinhThanh, $QuanHuyen, $PhuongXa, $DiaChiChiTiet, $GhiChu;

    public function __construct($dh = null) {
        parent::__construct();
        parent::$TableName = prefixTable . "sanpham_donhang";
        if ($dh) {
            if (!is_array($dh)) {
                $Id = $dh;
                $dh = $this->GetById($Id);
            }

            $this->Id = isset($dh["Id"]) ? $dh["Id"] : null;
            $this->Code = isset($dh["Code"]) ? $dh["Code"] : null;
            $this->TinhTrang = isset($dh["TinhTrang"]) ? $dh["TinhTrang"] : null;
            $this->SDT = isset($dh["SDT"]) ? $dh["SDT"] : null;
            $this->Email = isset($dh["Email"]) ? $dh["Email"] : null;
            $this->HoTen = isset($dh["HoTen"]) ? $dh["HoTen"] : null;
            $this->NgayTao = isset($dh["NgayTao"]) ? $dh["NgayTao"] : null;
            $this->NgayGiaoHang = isset($dh["NgayGiaoHang"]) ? $dh["NgayGiaoHang"] : null;
            $this->TongTien = isset($dh["TongTien"]) ? $dh["TongTien"] : null;
            $this->SoSP = isset($dh["SoSP"]) ? $dh["SoSP"] : null;
            $this->TinhThanh = isset($dh["TinhThanh"]) ? $dh["TinhThanh"] : null;
            $this->QuanHuyen = isset($dh["QuanHuyen"]) ? $dh["QuanHuyen"] : null;
            $this->PhuongXa = isset($dh["PhuongXa"]) ? $dh["PhuongXa"] : null;
            $this->DiaChiChiTiet = isset($dh["DiaChiChiTiet"]) ? $dh["DiaChiChiTiet"] : null;
            $this->GhiChu = isset($dh["GhiChu"]) ? $dh["GhiChu"] : null;
        }
    }

    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($param, $indexPage, $pageNumber, &$total) {
        $where = "1=1 ORDER BY `NgayTao` DESC";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public static function ToSelect() {
        
    }

    public static function ToSoDonHang() {
        try {
            $dh = new DonHang();
            return $dh->SelectCount("1=1");
        } catch (Exception $ex) {
            return 0;
        }
    }

    public function btnPut() {
        
    }

    public function btnDelete() {
        
    }

    public function TongTienVnd() {
        return \Model\Common::ViewPrice($this->TongTien);
    }

    public function btnDetail() {
        ?> 
        <a href="<?php echo "/cart/donhang/detail/" . $this->Id; ?>" >Xem</a>
        <?php
    }

    public function TinhThanh() {
        return new \Model\Locations($this->TinhThanh);
    }

    public function QuanHuyen() {
        return new \Model\Locations($this->QuanHuyen);
    }

    public function DonHangChiTiet() {
        $dhct = new DonHangChiTiet();
        return $dhct->GetItemsByIdDonHang($this->Id);
    }

    public function TinhTrangDonHang() {
        return [
            -1 => "Hủy",
            0 => "Mới Đặt",
            1 => "Đang Giao Hàng",
            2 => "Đã Giao",
            3 => "Thàng Công",
        ];
    }

    public function TinhTrang() {
        if (isset($this->TinhTrangDonHang()[$this->TinhTrang]))
            return $this->TinhTrangDonHang()[$this->TinhTrang];
        $this->TinhTrangDonHang()[0];
    }

    public function TinhTrangClass() {
        $a = [
            -1 => "label-danger",
            0 => "label-primary",
            1 => "label-primary",
            2 => "label-primary",
            3 => "label-success",
        ];
        return $a[$this->TinhTrang];
    }

}
