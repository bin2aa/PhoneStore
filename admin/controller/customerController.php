<?php
include(__DIR__ . '/../model/customerModel.php');

class customerController
{
    private $customerModel;

    public function __construct()
    {
        $this->customerModel = new customerModel();
    }
    public function showCustomerList()
    {
        if ($_SESSION['qlkhach_hang'] != 1) {
            exit("Bạn không có quyền truy cập vào trang này!");
        }
        $customers = $this->customerModel->getAllcustomers();


        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $customers = $this->customerModel->searchCustomer($keyword);
        }


        include __DIR__ . '/../view/customerView.php';
    }

    public function showAddCustomerForm()
    {
        $users = $this->customerModel->getAllUserSelect();
        include __DIR__ . '/../view/addCustomer.php';
    }

    public function addCustomer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $id_nguoi_dung = $_POST['id_nguoi_dung'];

            $result = $this->customerModel->createCustomer($ten, $so_dien_thoai, $email, $dia_chi, $id_nguoi_dung);

            if ($result) {
                echo "Thêm khách hàng thành công!";
            } else {
                echo "Thêm khách hàng không thành công.";
            }
        }
    }
    public function deleteCustomer()
    {
        if (isset($_GET['id'])) {
            $customer_id = $_GET['id'];
            $result = $this->customerModel->deleteCustomer($customer_id);
        }
    }
    public function showUpdateCustomerForm()
    {
        $users = $this->customerModel->getAllUserSelect();
        if (isset($_GET['id'])) {
            $customer_id = $_GET['id'];
            $customer = $this->customerModel->getCustomerById($customer_id);
            include __DIR__ . '/../view/updateCustomer.php';
        }
    }

    public function updateCustomer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $customer_id = $_POST['id'];
            $ten = $_POST['ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $id_nguoi_dung = $_POST['id_nguoi_dung'];

            $result = $this->customerModel->updateCustomer($customer_id, $ten, $so_dien_thoai, $email, $dia_chi, $id_nguoi_dung);

            if ($result) {
                echo "Cập nhật khách hàng thành công!";
            } else {
                echo "Cập nhật khách hàng không thành công.";
            }
        }
    }

    
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showCustomerList';
}

$customerController = new customerController();
switch ($action) {
    case 'index':
        $customerController->showCustomerList();
        break;
    case 'viewAddCustomer':
        $customerController->showAddCustomerForm();
        break;
    case 'addCustomer':
        $customerController->addCustomer();
        break;
    case 'deleteCustomer':
        $customerController->deleteCustomer();
        break;
    case 'updateCustomerView':
        $customerController->showUpdateCustomerForm();
        break;
    case 'updateCustomer':
        $customerController->updateCustomer();
        break;
    default:
        $customerController->showCustomerList();
}
