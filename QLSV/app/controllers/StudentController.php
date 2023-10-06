<?php
require_once APP_ROOT.'/app/services/StudentService.php';
require_once APP_ROOT.'/app/services/Class1Service.php';

class StudentController {
    // DS
    public function index() {
        $title = 'student';

        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Gọi dữ liệu từ Class1tService
        $studentService = new StudentService();
        $students = $studentService->getByStudentCount($page);
        $total = count($studentService->getAllStudents());

        include APP_ROOT.'/app/views/student/index.php';
    }

    // Them
    public function add_student(){
        $title = 'student';

        $class1Service = new Class1Service();
        $classes1 = $class1Service->getAllClasses1();

        include APP_ROOT.'/app/views/student/add_student.php';
    }

    public function process_add(){

        if(isset($_POST['sbmSave'])){

            $nameStudent = $_POST['nameStudent'];
            $email = $_POST['email'];
            $dateOfBirth = $_POST['dateOfBirth'];
            $idClass1 = $_POST['idClass1'];

            $studentService = new StudentService();
            $check = $studentService->addStudent($nameStudent, $email, $dateOfBirth, $idClass1);

            if ($check){
                $this->index();
            } else {
                $this->add_student();
            }
        }
    }

    // Sua
    public function edit_student(){
        $title = 'student';

        $id = isset($_GET['idSelect'])? $_GET['idSelect'] : null;

        $studentService = new StudentService();
        $student = $studentService->getByStudentId($id);

        $class1Service = new Class1Service();
        $classes1 = $class1Service->getAllClasses1();

        include APP_ROOT.'/app/views/student/edit_student.php';
    }

    public function process_edit(){

        if(isset($_POST['sbmSave'])){

            $id = $_POST['id'];
            $nameStudent = $_POST['nameStudent'];
            $email = $_POST['email'];
            $dateOfBirth = $_POST['dateOfBirth'];
            $idClass1 = $_POST['idClass1'];

            $studentService = new StudentService();
            $check = $studentService->editStudent($id, $nameStudent, $email, $dateOfBirth, $idClass1);

            if ($check){
                $this->index();
            }else{
                $this->edit_student();
            }
        }
    }

    // Xoa
    public function delete_student(){

        $id = isset($_GET['idSelect']) ? $_GET['idSelect'] : null;

        $studentService = new StudentService();
        $check = $studentService->deleteStudent($id);

        $this->index();
    }
}

?>