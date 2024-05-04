<?php
include(__DIR__ . '/../../admin/model/commentModel.php');
class CommentProductController
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
    }

    public function addComment()
    {

        // if ($_SESSION['qlbinh_luan'] != 1) {
        //     exit("Bạn không có quyền thêm bình luận!");
        // }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id_khach_hang'])) {
                $id_san_pham = $_POST['id_san_pham'];
                $id_khach_hang = $_POST['id_khach_hang'];
                $noi_dung = $_POST['noi_dung'];
                $nguoi_dung = $_POST['nguoi_dung'];
                $ngay_gio_binh_luan = date('Y-m-d H:i:s');
                $ngay_gio_binh_luan = $_POST['ngay_gio_binh_luan'];
                $result = $this->commentModel->createComment($id_san_pham, $id_khach_hang, $noi_dung, $nguoi_dung, $ngay_gio_binh_luan);

                if ($result) {
                    echo "<script> 
                    alert('Thêm bình luận thành công!');
                    window.location.href='index.php?ctrl=productControllerUser&action=detail&id=$id_san_pham'; 
                    </script>";
                } else {
                    echo "Thêm bình luận không thành công.";
                }
            } else {
                echo "<script> alert('Vui lòng đăng nhập để bình luận.')</script>";
                echo "<script> window.location.href = '/login/index.php?ctrl=loginController';</script>";
            }
        }
    }

    public function deleteComment()
    {

        //Kiểm tra Session id_khach_hang có = với id_khach_hang của binh_luan mới xóa được
        //Hoặc phải có quyền bình luận mới được xóa

        if (isset($_GET['id'])) {
            $comment_id = $_GET['id'];
            $comment = $this->commentModel->getCommentById($comment_id);
            // Kiểm tra xem id_khach_hang của bình luận có khớp với id_khach_hang của người dùng đang đăng nhập không
            if ($comment['id_khach_hang'] == $_SESSION['id_khach_hang'] || $_SESSION['qlbinh_luan'] == 1) {
                $result = $this->commentModel->deleteComment($comment_id);
            } else {
                echo "Bạn không có quyền xóa bình luận này.";
                exit;
            }
        }
    }


    // public function updateComment()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $comment_id = $_POST['comment_id'];
    //         $id_san_pham = $_POST['id_san_pham'];
    //         $id_khach_hang = $_POST['id_khach_hang'];
    //         $noi_dung = $_POST['noi_dung'];
    //         $nguoi_dung = $_POST['nguoi_dung'];
    //         $ngay_gio_binh_luan = $_POST['ngay_gio_binh_luan'];
    //         $result = $this->commentModel->updateComment($comment_id, $id_san_pham, $id_khach_hang, $noi_dung, $nguoi_dung, $ngay_gio_binh_luan);
    //         if ($result) {
    //             echo "Cập nhật bình luận thành công!";
    //         } else {
    //             echo "Cập nhật bình luận không thành công.";
    //         }
    //     }
    // }
}
$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
   echo "huhu";
}
$commentController = new CommentProductController();

switch ($action) {
    case 'addComment':
        $commentController->addComment();
        break;
    case 'deleteComment':
        $commentController->deleteComment();
        break;
        // case 'updateComment':
        //     $commentController->updateComment();
        //     break;
    default:
        $commentController->addComment();
}