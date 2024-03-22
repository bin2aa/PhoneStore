<?php

include(__DIR__ . '/../model/orderUserModel.php');

class OrderUserController
{
    private $orderUserModel;

    public function __construct()
    {
        $this->orderUserModel = new OrderUserModel();
    }

    public function createOrder()
    {
        $id_khach_hang = $_POST['id_khach_hang'];
        $ngay = date('Y-m-d H:i:s');
        $tong_tien = $_POST['tong_tien'];
        $ghi_chu = $_POST['ghi_chu'];
        $tinh_trang = $_POST['tinh_trang'];

        $id_don_hang = $this->orderUserModel->createOrder($id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang);
        if ($id_don_hang) {
            echo "Tạo đơn hàng thành công";
        } else {
            echo "Tạo đơn hàng thất bại";
        }
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$orderUserController = new OrderUserController();
switch ($action) {
    case 'index':
        $orderUserController->createOrder();
        break;
    default:
        $orderUserController->createOrder();
}
