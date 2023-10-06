<?php
require_once APP_ROOT.'/app/services/Class1Service.php';

class Class1Controller {
    // View DS
    public function index() {

        $title = 'class1';

        $page = isset($_GET['page'])?$_GET['page'] : 1;

        // Gọi dữ liệu từ Class1tService
        $class1Service = new Class1Service();
        $classes1 = $class1Service->getByClass1Count($page);
        $total = count($class1Service->getAllClasses1());
        include APP_ROOT.'/app/views/class1/index.php';

    }

    // View Them
    public function add_class1(){
        $title = 'class1';

        include APP_ROOT.'/app/views/class1/add_class1.php';
    }

    public function process_add(){
        
        if(isset($_POST['nameClass1'])){

            $nameClass1 = $_POST['nameClass1'];

            $class1Service = new Class1Service();
            $check = $class1Service->addClass($nameClass1);
    
            if ($check){
                $this->index();
            } else {
                $this->add_class1();
            }
        }
    }

    // View Sua
    public function edit_class1(){
        $title = 'class1';

        $id = isset($_GET['idSelect'])? $_GET['idSelect'] : null;

        $class1Service = new Class1Service();
        $class1 = $class1Service->getByClass1Id($id);

        include APP_ROOT.'/app/views/class1/edit_class1.php';
    }

    public function process_edit(){

        if(isset($_POST['id']) && isset($_POST['nameClass1'])){

            $id = $_POST['id'];
            $nameClass1 = $_POST['nameClass1'];

            $class1Service = new Class1Service();
            $check = $class1Service->editClass1($id, $nameClass1);

            if ($check){
                $this->index();
            } else {
                $this->edit_class1();
            }
        }
    }



    // Xoa
    public function delete_class1(){

        $id = isset($_GET['idSelect'])? $_GET['idSelect'] : null;

        $class1Service = new Class1Service();
        $class1Service->deleteClass1($id);

        $this->index();
    }
}

?>