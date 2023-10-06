<?php
require_once APP_ROOT.'/app/services/CategoryService.php';

class CategoryController {
    // view DS
    public function index() {
        // Gọi dữ liệu từ CategoryService
        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategories();

        include APP_ROOT.'/app/views/category/index.php';
    }

    // View Them
    public function add_category(){
        include APP_ROOT.'/app/views/category/add_category.php';
    }

    public function process_add(){
        
        if(isset($_POST['sbmSave'])){

            $nameCategory = $_POST['nameCategory'];

            $categoryService = new CategoryService();
            $check = $categoryService->addCategory($nameCategory);
    
            if ($check){
                $this->index();
            } else {
                $this->add_category();
            }
        }
    }

    // View Sua
    public function edit_category(){

        $id = isset($_GET['idSelect'])? $_GET['idSelect'] : null;

        $categoryService = new CategoryService();
        $category = $categoryService->getByCategoryId($id);

        include APP_ROOT.'/app/views/category/edit_category.php';
    }

    public function process_edit(){

        if(isset($_POST['sbmSave'])){

            $id = $_POST['id'];
            $nameCategory = $_POST['nameCategory'];

            $categoryService = new CategoryService();
            $check = $categoryService->editCategory($id, $nameCategory);

            if ($check){
                $this->index();
            } else {
                $this->edit_category();
            }
        }
    }

    // Xoa
    public function delete_category(){

        $id = isset($_GET['idSelect'])? $_GET['idSelect'] : null;

        $categoryService = new CategoryService();
        $categoryService->deleteCategory($id);

        $this->index();
    }
}


?>