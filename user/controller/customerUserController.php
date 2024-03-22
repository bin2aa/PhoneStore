<?php
include(__DIR__ . '/../model/customerUserModel.php');
class CustomerUserController
{
    private $customerModel;

    public function __construct()
    {
        $this->customerModel = new customerUserModel();
    }

    public function viewCustomerInfo()
    {

        $customer = $this->customerModel->getCustomerById();
        include __DIR__ . '/../view/infoUser.php';
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
    default:
        $customerUserController->viewCustomerInfo();
}
