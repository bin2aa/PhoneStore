<?php
include(__DIR__ . '/../model/categoryModel.php');

class CategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function showCategoryList()
    {
        $categories = $this->categoryModel->getAllCategories();
        include __DIR__ . '/../view/categoryView.php';
    }

    public function showAddCategoryForm()
    {
        include __DIR__ . '/../view/addCategory.php';
    }

    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $result = $this->categoryModel->createCategory($ten);

            if ($result) {
                echo "Thêm danh mục sản phẩm thành công!";
            } else {
                echo "Thêm danh mục sản phẩm không thành công.";
            }
        }
    }

    public function deleteCategory()
    {
        if (isset($_GET['id'])) {
            $category_id = $_GET['id'];
            $result = $this->categoryModel->deleteCategory($category_id);
        }
    }

    public function showUpdateCategoryForm()
    {
        if (isset($_GET['id'])) {
            $category_id = $_GET['id'];
            $category = $this->categoryModel->getCategoryById($category_id);
            include __DIR__ . '/../view/updateCategory.php';
        }
    }

    public function updateCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category_id = $_POST['category_id'];
            $ten = $_POST['ten'];
            $result = $this->categoryModel->updateCategory($category_id, $ten);

            if ($result) {
                echo "Cập nhật danh mục sản phẩm thành công!";
            } else {
                echo "Cập nhật danh mục sản phẩm không thành công.";
            }
        }
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showCategoryList';
}

$categoryController = new CategoryController();
switch ($action) {
    case 'index':
        $categoryController->showCategoryList();
        break;
    case 'viewAddCategory':
        $categoryController->showAddCategoryForm();
        break;
    case 'addCategory':
        $categoryController->addCategory();
        break;
    case 'deleteCategory':
        $categoryController->deleteCategory();
        break;
    case 'updateCategoryView':
        $categoryController->showUpdateCategoryForm();
        break;
    case 'updateCategory':
        $categoryController->updateCategory();
        break;
    default:
        $categoryController->showCategoryList();
}
?>
