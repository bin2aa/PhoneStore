<?php
include __DIR__ . '/../model/discountModel.php';

class discountController
{
    private $discountModel;

    public function __construct()
    {
        $this->discountModel = new discountModel();
    }



    public function showDiscountList()
    {
        if ($_SESSION['qlgiam_gia'] != 1) {
            exit("Bạn không có quyền truy cập vào trang này!");
        }
        $discounts = $this->discountModel->getAllDiscounts();
        include __DIR__ . '/../view/discountView.php';
    }

    public function showAddDiscountForm()
    {
        include __DIR__ . '/../view/addDiscount.php';
    }

    public function addDiscount()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $dieu_kien_mua = $_POST['dieu_kien_mua'];
            $phan_tram_giam_gia = $_POST['phan_tram_giam_gia'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];

            $result = $this->discountModel->createDiscount($ten, $dieu_kien_mua, $phan_tram_giam_gia, $ngay_bat_dau, $ngay_ket_thuc);

            if ($result) {
                echo "Thêm khuyến mãi thành công!";
            } else {
                echo "Thêm khuyến mãi không thành công.";
            }
        }
    }

    public function deleteDiscount()
    {
        if (isset($_GET['id'])) {
            $discount_id = $_GET['id'];
            $result = $this->discountModel->deleteDiscount($discount_id);
        }
    }

    public function showUpdateDiscountForm()
    {
        if (isset($_GET['id'])) {
            $discount_id = $_GET['id'];
            $discount = $this->discountModel->getDiscountById($discount_id);
            include __DIR__ . '/../view/updateDiscount.php';
        }
    }

    public function updateDiscount()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $discount_id = $_POST['id'];
            $ten = $_POST['ten'];
            $dieu_kien_mua = $_POST['dieu_kien_mua'];
            $phan_tram_giam_gia = $_POST['phan_tram_giam_gia'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $result = $this->discountModel->updateDiscount($discount_id, $ten, $dieu_kien_mua, $phan_tram_giam_gia, $ngay_bat_dau, $ngay_ket_thuc);
            if ($result) {
                echo "Cập nhật khuyến mãi thành công!";
            } else {
                echo "Cập nhật khuyến mãi không thành công.";
            }
        }
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
$discountController = new discountController();
switch ($action) {
    case 'index':
        $discountController->showDiscountList();
        break;
    case 'addDiscount':
        $discountController->addDiscount();
        break;
    case 'deleteDiscount':
        $discountController->deleteDiscount();
        break;
    case 'showUpdateDiscountForm':
        $discountController->showUpdateDiscountForm();
        break;
    case 'updateDiscount':
        $discountController->updateDiscount();
        break;
    case 'showAddDiscountForm':
        $discountController->showAddDiscountForm();
        break;
    default:
        $discountController->showDiscountList();
        break;
}
