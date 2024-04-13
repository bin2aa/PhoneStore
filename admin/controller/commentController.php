<?php
// include(__DIR__ . '/../model/commentModel.php');

// class CommentController
// {

//     private $commentModel;

//     public function __construct()
//     {
//         $this->commentModel = new CommentModel();
//     }

//     public function showCommentList()
//     {
//         // if ($_SESSION['qlbinh_luan'] != 1) {
//         //     exit("Bạn không có quyền truy cập vào trang này!");
//         // }

//         $comments = $this->commentModel->getAllComments();
//         include __DIR__ . '/../view/commentView.php';
//     }

//     public function showAddCommentForm()
//     {
//         include __DIR__ . '/../view/addComment.php';
//     }

//     public function addComment()
//     {
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             $id_san_pham = $_POST['id_san_pham'];
//             $id_khach_hang = $_POST['id_khach_hang'];
//             $noi_dung = $_POST['noi_dung'];
//             $nguoi_dung = $_POST['nguoi_dung'];
//             $ngay_gio_binh_luan = $_POST['ngay_gio_binh_luan'];
//             $result = $this->commentModel->createComment($id_san_pham, $id_khach_hang, $noi_dung, $nguoi_dung, $ngay_gio_binh_luan);

//             if ($result) {
//                 echo "Thêm bình luận thành công!";
//             } else {
//                 echo "Thêm bình luận không thành công.";
//             }
//         }
//     }

//     public function deleteComment()
//     {
//         if (isset($_GET['id'])) {
//             $comment_id = $_GET['id'];
//             $result = $this->commentModel->deleteComment($comment_id);
//         }
//     }

//     public function showUpdateCommentForm()
//     {
//         if (isset($_GET['id'])) {
//             $comment_id = $_GET['id'];
//             $comment = $this->commentModel->getCommentById($comment_id);
//             include __DIR__ . '/../view/updateComment.php';
//         }
//     }

//     public function updateComment()
//     {
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             $comment_id = $_POST['comment_id'];
//             $id_san_pham = $_POST['id_san_pham'];
//             $id_khach_hang = $_POST['id_khach_hang'];
//             $noi_dung = $_POST['noi_dung'];
//             $nguoi_dung = $_POST['nguoi_dung'];
//             $ngay_gio_binh_luan = $_POST['ngay_gio_binh_luan'];
//             $result = $this->commentModel->updateComment($comment_id, $id_san_pham, $id_khach_hang, $noi_dung, $nguoi_dung, $ngay_gio_binh_luan);

//             if ($result) {
//                 echo "Cập nhật bình luận thành công!";
//             } else {
//                 echo "Cập nhật bình luận không thành công.";
//             }
//         }
//     }

//     public function getProductComments($id_san_pham)
//     {
//         $comments = $this->commentModel->getCommentsByProductId($id_san_pham);
//         include __DIR__ . '/../../user/view/updateComment.php';
//         // return $comments;
        
//     }
// }

// $action = 'index';
// if (isset($_GET['action'])) {
//     $action = $_GET['action'];
// } else {
//     $action = 'showCommentList';
// }
// $commnetController = new CommentController();
// switch ($action) {
//     case 'showCommentList':
//         $commnetController->showCommentList();
//         break;
//     case 'showAddCommentForm':
//         $commnetController->showAddCommentForm();
//         break;
//     case 'addComment':
//         $commnetController->addComment();
//         break;
//     case 'deleteComment':
//         $commnetController->deleteComment();
//         break;
//     case 'showUpdateCommentForm':
//         $commnetController->showUpdateCommentForm();
//         break;
//     case 'updateComment':
//         $commnetController->updateComment();
//         break;
//     default:
//         $commnetController->showCommentList();
//         break;
// }
