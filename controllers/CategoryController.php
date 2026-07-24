<?php
// controllers/CategoryController.php
require_once __DIR__ . '/../models/CategoryModel.php';

class CategoryController {
    private $model;

    public function __construct() {
        $this->model = new CategoryModel();
    }

    public function index() {
        $categories =$this->model->all();
        require __DIR__ . '/../views/category/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');

            if (strlen($name) < 2) {$_SESSION['flash_error'] = "Tên danh mục quá ngắn!";
            } else {
                if ($this->model->create($name, $description)) {$_SESSION['flash_success'] = "Thêm mới danh mục thành công!";
                    header("Location: index.php?controller=category&action=index");
                    exit;
                } else {
                    $_SESSION['flash_error'] = "Lỗi: Tên danh mục đã tồn tại hoặc lỗi CSDL!";
                }
            }
        }
        require __DIR__ . '/../views/category/create.php';
    }

    public function edit() {
        $id =$_GET['id'] ?? null;
        $category = $this->model->find((int)$id);

        if (!$category) {$_SESSION['flash_error'] = "Không tìm thấy danh mục!";
            header("Location: index.php?controller=category&action=index");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');

            if (strlen($name) < 2) {$_SESSION['flash_error'] = "Tên danh mục quá ngắn!";
            } else {
                if ($this->model->update($id,$name, $description)) {$_SESSION['flash_success'] = "Cập nhật thành công!";
                    header("Location: index.php?controller=category&action=index");
                    exit;
                } else {
                    $_SESSION['flash_error'] = "Lỗi cập nhật hoặc tên bị trùng!";
                }
            }
        }
        require __DIR__ . '/../views/category/edit.php';
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id =$_POST['id'] ?? null;
            if ($id &&$this->model->delete((int)$id)) {$_SESSION['flash_success'] = "Đã xóa danh mục!";
            } else {
                $_SESSION['flash_error'] = "Lỗi khi xóa!";
            }
        }
        header("Location: index.php?controller=category&action=index");
        exit;
    }
}