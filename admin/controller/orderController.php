<?php
include __DIR__ . '/../model/orderModel.php';

class orderController
{


    private $orderModel;


    public function __construct()
    {
        $this->orderModel = new orderModel();
    }
    public function showOrderList()
    {
        $orders = $this->orderModel->getAllOrders();
        if ($_SESSION['qldon_hang'] != 1) {
            exit("Bạn không có quyền truy cập vào trang này!");
        }

        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $orders = $this->orderModel->searchOrder($keyword);
        }

        include __DIR__ . '/../view/orderView.php';
    }

    public function showAddOrderForm()
    {

        $customers = $this->orderModel->getAllCustomersSelect();
        include __DIR__ . '/../view/addOrder.php';
    }

    public function addOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_khach_hang = $_POST['id_khach_hang'];
            $ngay = $_POST['ngay'];
            $tong_tien = $_POST['tong_tien'];
            $ghi_chu = $_POST['ghi_chu'];
            $tinh_trang = $_POST['tinh_trang'];

            $result = $this->orderModel->createOrder($id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang);

            if ($result) {
                echo "Thêm đơn đặt hàng thành công!";
            } else {
                echo "Thêm đơn đặt hàng không thành công.";
            }
        }
    }
    public function deleteOrder()
    {
        if (isset($_GET['id'])) {
            $order_id = $_GET['id'];
            $result = $this->orderModel->deleteOrder($order_id);
        }
    }
    public function showUpdateOrderForm()
    {
        if (isset($_GET['id'])) {
            $order_id = $_GET['id'];
            $order = $this->orderModel->getOrderById($order_id);
            $customers = $this->orderModel->getAllCustomersSelect();
            $status = $this->orderModel->getStatusSelect();
            include __DIR__ . '/../view/updateOrder.php';
        }
    }

    public function updateOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $id_khach_hang = $_POST['id_khach_hang'];
            $ngay = $_POST['ngay'];
            $tong_tien = $_POST['tong_tien'];
            $ghi_chu = $_POST['ghi_chu'];
            $tinh_trang = $_POST['tinh_trang'];

            $result = $this->orderModel->updateOrder($id, $id_khach_hang, $ngay, $tong_tien, $ghi_chu, $tinh_trang);

            if ($result) {
                echo "Cập nhật đơn đặt hàng thành công!";
            } else {
                echo "Cập nhật đơn đặt hàng không thành công.";
            }
        }
    }

    public function viewOrderDetail()
    {
        if ($_SESSION['qldon_hang'] != 1) {
            exit("Bạn không có quyền truy cập vào trang này!");
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $orderDetails = $this->orderModel->getOderDetailsSelect($id);
            include __DIR__ . '/../view/orderDetailView.php';
        }
    }
    // public function toggleOrderStatus()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['orderId'])) {
    //         $orderId = $_POST['orderId'];
    //         $order = $this->orderModel->getOrderById($orderId);
    //         if ($order) {
    //             $newStatus = ($order['tinh_trang'] == 'Chờ xác nhận') ? 'Giao thành công' : 'Chờ xác nhận';
    //             $result = $this->orderModel->updateOrderStatus($orderId, $newStatus);
    //             if ($result) {
    //                 return header('Location: index.php?ctrl=orderController');
    //             } else {
    //                 echo 'error';
    //             }
    //         }
    //     }
    // }


    public function toggleOrderStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['orderId'])) {
            $orderId = $_POST['orderId'];
            $order = $this->orderModel->getOrderById($orderId);
            if ($order) {
                // $newStatus = ($order['tinh_trang'] == 'Chờ xác nhận') ? 'Giao thành công' : 'Chờ xác nhận';

                if ($order['tinh_trang'] == 'Chờ xác nhận') {
                    $newStatus = 'Đang xử lý';
                } else if ($order['tinh_trang'] == 'Đang xử lý') {
                    $newStatus = 'Đang giao';
                } else if ($order['tinh_trang'] == 'Đang giao') {
                    $newStatus = 'Thành công';
                }


                $result = $this->orderModel->updateOrderStatus($orderId, $newStatus);
                if ($result) {
                    return header('Location: index.php?ctrl=orderController');
                } else {
                    echo 'error';
                }
            }
        }
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showOrderList';
}

$orderController = new orderController();
switch ($action) {
    case 'index':
        $orderController->showOrderList();
        break;
    case 'viewAddOrder':
        $orderController->showAddOrderForm();
        break;
    case 'addOrder':
        $orderController->addOrder();
        break;
    case 'deleteOrder':
        $orderController->deleteOrder();
        break;
    case 'updateOrderView':
        $orderController->showUpdateOrderForm();
        break;
    case 'updateOrder':
        $orderController->updateOrder();
        break;
    case 'toggleOrderStatus':
        $orderController->toggleOrderStatus();
        break;
    case 'viewOrderDetail':
        $orderController->viewOrderDetail();
        break;
    default:
        $orderController->showOrderList();
}
