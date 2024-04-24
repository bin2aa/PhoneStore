<?php
include(__DIR__ . '/../../admin/model/orderModel.php');
class buyController
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new orderModel();
    }
    public function showOrderList()
    {
        $orders = $this->orderModel->getAllOrders();
        include __DIR__ . '/../view/buyView.php';
    }


    public function buy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_khach_hang = $_POST['id_khach_hang'];
            $ngay = $_POST['ngay'];
            $tong_tien = $_POST['tong_tien'];
            $ghi_chu = $_POST['ghi_chu'];
            $tinh_trang = $_POST['tinh_trang'];
            $result = $this->orderModel->createOrder($id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang);
        }
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'buy';
}

$buyController = new buyController();
switch ($action) {
    case 'index':
        $buyController->showOrderList();
        break;
    case 'buy':
        $buyController->buy();
        break;
    default:
        $buyController->showOrderList();
}
