<?php
include(__DIR__ . '/../model/customerUserModel.php');
include(__DIR__ . '/../model/cartModel.php');


class CustomerUserController
{
    private $customerModel;
    private $cartModel;

    public function __construct()
    {
        $this->customerModel = new customerUserModel();
        $this->cartModel = new CartModel();
    }


    public function viewCustomerInfo()
    {
        $customer = $this->customerModel->getCustomerByIdNguoiDung();
        include __DIR__ . '/../view/infoUser.php';
    }

    public function viewOrderList()
    {
        $customer = $this->customerModel->getCustomerByIdNguoiDung();
        $customerId = $customer[0]['id']; // Lấy ID khách hàng
        $orders = $this->customerModel->getOrdersByCustomerId($customerId);
        include __DIR__ . '/../view/orderList.php';
    }

    public function showUpdateCustomerForm()
    {
        if (isset($_GET['id'])) {
            $customer_id = $_GET['id'];
            $customer = $this->customerModel->getCustomerById($customer_id);
            include __DIR__ . '/../view/editCustomer.php';
        }
    }
    public function updateCustomer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $customer_id = $_POST['customer_id'];
            $ten = $_POST['ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $id_nguoi_dung = $_POST['id_nguoi_dung'];

            $result = $this->customerModel->updateCustomer($customer_id, $ten, $so_dien_thoai, $email, $dia_chi);

            if ($result) {
                echo "Cập nhật khách hàng thành công!";
            } else {
                echo "Cập nhật khách hàng không thành công.";
            }
        }
    }

    public function viewOrderDetail()
    {


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $orderDetails = $this->customerModel->getOrderDetailsByOrderId($id);
            $warrantyInfo = $this->cartModel->getWarrantyInfoByOrderId($id);
            include __DIR__ . '/../view/orderDetailUserView.php';
        }
    }




    public function updateWarrantyInfo()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_GET['id'];
        $warranty_id = $_POST['warranty_id'];
        $ghi_chu = trim($_POST['ghi_chu']);
        $tinh_trang = 'Chờ xử lý';

        if ($ghi_chu == '') {
            echo "<script>alert('Ghi chú không được để trống!')</script>";
            
        } else {
            // Cập nhật thông tin bảo hành
            $result = $this->cartModel->updateWarrantyInfo($warranty_id, $tinh_trang, $ghi_chu);
            if ($result) {
                echo "<script>alert('Cập nhật thông tin bảo hành thành công!')</script>";
            } else {
                echo "<script>alert('Cập nhật thông tin bảo hành không thành công.')</script>";
            }
        }

        echo "<script>window.location.href = 'index.php?ctrl=customerUserController&action=viewOrderDetail&id=$id';</script>";
    }
}




    public function deleteOrder()
    {
        if (isset($_GET['id'])) {
            $order_id = $_GET['id'];
            $result = $this->customerModel->deleteOrder($order_id);
        }
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$customerUserController = new CustomerUserController();
switch ($action) {
    case 'index':
        $customerUserController->viewCustomerInfo();
        break;
    case 'deleteOrder':
        $customerUserController->deleteOrder();
        break;
    case 'showUpdateCustomerForm':
        $customerUserController->showUpdateCustomerForm();
        break;
    case 'updateCustomer':
        $customerUserController->updateCustomer();
        break;
    case 'viewOrderList':
        $customerUserController->viewOrderList();
        break;
    case 'updateWarrantyInfo':
        $customerUserController->updateWarrantyInfo();
        break;
    case 'viewOrderDetail':
        $customerUserController->viewOrderDetail();
        // break;
    default:
        $customerUserController->viewCustomerInfo();
}
