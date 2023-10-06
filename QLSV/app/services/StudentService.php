<?php
require_once APP_ROOT.'/app/models/Student.php';

class StudentService {
    // Lay DS
    public function getAllStudents() {
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM student;";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            //Buoc 3: Xu ly ket qua
            $students = [];
            while ($row = $stmt->fetch()){
                $student = new Student(
                    $row['id'],
                    $row['nameStudent'],
                    $row['email'],
                    $row['dateOfBirth'],
                    $row['idClass1']);
                $students[] = $student;
            }

            return $students;
        }else{
            return $students = [];
        }

    }

    // Phan trang
    public function getByStudentCount($key){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $n = 10 * ($key - 1);
            $sql = "SELECT * FROM student LIMIT $n, 9";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $students = [];
            while ($row = $stmt->fetch()) {
                $student = new Student(
                    $row['id'],
                    $row['nameStudent'],
                    $row['email'],
                    $row['dateOfBirth'],
                    $row['idClass1']
                );
                $students[] = $student;
            }
            return $students;
        } else {
            return $students = [];
        }
    }

    // Them
    public function addStudent($nameStudent, $email, $dateOfBirth, $idClass1){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM class1 WHERE id = '$idClass1'; ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount()<= 0){
                return false;
            }

            $sql = "SELECT * FROM student;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xử lý kết quả
            $rowCount = $stmt->rowCount();

            for ($i=1; $i<=$rowCount; $i++) {
                $sql = "SELECT * FROM student WHERE id = '$i'; ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount()<= 0){
                    break;
                }
            }

            $sql = "INSERT INTO student (id, nameStudent, email, dateOfBirth, idClass1) 
            VALUES ('$i', '$nameStudent', '$email', '$dateOfBirth', '$idClass1');";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();
            if ($result) {
                return true;
            } else {
                return false;
            }

        }else{
            return false;
        }
        
    }

    // Sua
    public function getByStudentId($id){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM student WHERE id = '$id'; ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xu ly ket qua
            $row = $stmt->fetchAll();
            $student = new Student(
                $row[0]['id'],
                $row[0]['nameStudent'],
                $row[0]['email'],
                $row[0]['dateOfBirth'],
                $row[0]['idClass1']);
            return $student;
        }else{
            return null;
        }
    }

    public function editStudent($id, $nameStudent, $email, $dateOfBirth, $idClass1){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM class1 WHERE id = '$idClass1'; ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount()<= 0){
                return false;
            }

            //Buoc 3: Xử lý kết quả

            $sql = "UPDATE student SET nameStudent = '$nameStudent', email = '$email', dateOfBirth = '$dateOfBirth', idClass1 = '$idClass1'
                    WHERE id = '$id';";

            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();
            if ($result) {
                return true;
            } else {
                return false;
            }
        }else{
            return true;
        }
    }

    // Xoa 
    public function deleteStudent($id){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "DELETE FROM student WHERE id = '$id'";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();

            //Buoc 3: Xử lý kết quả
            
            if ($result) {
                return true;
            } else {
                return false;
            }
        }else{
            return true;
        }
    }
}

?>