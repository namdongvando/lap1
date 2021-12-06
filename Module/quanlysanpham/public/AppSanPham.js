app.controller("SanPhamPut", function ($scope, $http) {

    $scope.SanPhamPutInit = function (idSanPham) {

        $scope.CapNhatThuocTinhSanPham = function (idSanPham) {
            $http.get("/index.php?module=quanlysanpham&controller=api&action=DanhSachThuocTinhTheoSanPham&id=" + idSanPham).then(function (res) {
                $scope._DSThuocTinhSanPham = res.data;

                var dsidThuocTinh = [];
                for (var index in $scope._DSThuocTinhSanPham) {
                    console.log($scope._DSThuocTinhSanPham[index].Id);
                    dsidThuocTinh.push($scope._DSThuocTinhSanPham[index].Id);
                }
                $http.post("/index.php?module=quanlysanpham&controller=api&action=dsthuoctinhchitiet",
                        $.param({"loaithuocTinh": dsidThuocTinh})).then(function (_res) {
                    $scope._DanhSachThuocTinhChiTiet = _res.data;
                });
            });
        }
        $scope.CapNhatThuocTinhSanPham(idSanPham);


        $http.get("/index.php?module=quanlysanpham&controller=api&action=DanhSachLoaiThuocTinhSanPham").then(function (res) {
            $scope._DSThuocTinh = res.data;

        });


        $scope.XoaThuocTinhSanPham = function (idThuocTinh) {
            $http.get("/index.php?module=quanlysanpham&controller=api&action=xoathuoctinh&id=" + idThuocTinh).then(function (res) {
                $scope.CapNhatThuocTinhSanPham(idSanPham);
            });
        }
        $scope.ThemThuocTinhSanPham = function (idThuocTinh) {
            $http.get("/index.php?module=quanlysanpham&controller=api&action=themthuoctinh&id=" + idThuocTinh + "&idSanPham=" + idSanPham).then(function (res) {
                $scope.CapNhatThuocTinhSanPham(idSanPham);
            });
        }
        $scope.ThemThuocTinhChiTiet = function (thuoctinhchitiet) {
            $http.post("/index.php?module=quanlysanpham&controller=api&action=themthuoctinhchitiet", $.param(thuoctinhchitiet)).then(function () {
                $scope.ThuocTinhChiTiet.TenThuocTinh = "";
                $scope.CapNhatThuocTinhSanPham(idSanPham);
            });
        }
        $scope.XoaThuocTinhChiTiet = function (idTTCT) {
            $http.post("/index.php?module=quanlysanpham&controller=api&action=XoaThuocTinhChiTiet", $.param({"id": idTTCT})).then(function (res) {
                $scope.CapNhatThuocTinhSanPham(idSanPham);
            });
        }
    }

});

