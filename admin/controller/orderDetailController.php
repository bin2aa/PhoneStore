<?php
include __DIR__ . '/../model/orderDetailModel.php';
// class orderDetailController
// {
//     private $orderDetailModel;

//     public function __construct()
//     {
//         $this->orderDetailModel = new OrderDetailModel();
//     }
//     public function viewOrderDetail()
//     {
//         if (isset($_GET['id'])) {
//             $id = $_GET['id'];
//             $orderDetails = $this->orderDetailModel->getOrderDetailsByOrderId($id);
//             include __DIR__ . '/../view/orderDetailView.php';
//         }
//     }
// }

// $action = 'index';
// if (isset($_GET['action'])) {
//     $action = $_GET['action'];
// } else {
//     $action = 'viewOrderDetail';
// }

// $orderDetailController = new orderDetailController();
// switch ($action) {
//     case 'viewOrderDetail':
//         $orderDetailController->viewOrderDetail();
//         break;
//     default:
//         $orderDetailController->viewOrderDetail();
// }