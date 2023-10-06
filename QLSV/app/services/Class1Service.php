<?php
require_once APP_ROOT.'/app/models/Class1.php';
class Class1Service {
    // Lấy DS Lop
    public function getAllClasses1() {
        // B1: Ket noi Database
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM class1 ORDER BY id DESC;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            //Buoc 3: Xu ly ket qua
            $Classes1 = [];
            while ($row = $stmt->fetch()){
                $Class1 = new Class1($row['id'], $row['nameClass1']);
                $Classes1[] = $Class1;
            }

            return $Classes1;

        } else {
            return $Classes1 = [];
        }

    }
    // Phan trang
    public function getByClass1Count($key)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $n = 10 * ($key - 1);
            $sql = "SELECT * FROM class1 LIMIT $n, 9";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $Classes1 = [];
            while ($row = $stmt->fetch()) {
                $Class1 = new Class1($row['id'],$row['nameClass1']);
                $Classes1[] = $Class1;
            }
            return $Classes1;
        } else {
            return $Classes1 = [];
        }
    }

    // Them Lop
    public function addClass($nameClass1){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM class1;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xử lý kết quả
            $rowCount = $stmt->rowCount();

            for ($i=1; $i<=$rowCount; $i++) {
                $sql = "SELECT * FROM class1 WHERE id = '$i';";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount()<=0){
                    break;
                }
            }

            $sql = "INSERT INTO class1 (id, nameClass1) VALUES ('$i','$nameClass1');";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }

    // Sua Lop
    public function getByClass1Id($id){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM class1 WHERE id = '$id'; ";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xu ly ket qua
            $row = $stmt->fetchAll();

            $Classs = new Class1($row[0]['id'], $row[0]['nameClass1']);

            return $Classs;
        } else {
            return null;
        }
        
    }

    public function editClass1($id, $nameClass1){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "UPDATE class1 SET nameClass1 = '$nameClass1' WHERE id = '$id'";

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


    // Xoa lop
    public function deleteClass1($id){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "DELETE FROM class1 WHERE id = '$id' ";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();

            //Buoc 3: Xử lý kết quả
            
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
        
    }
    
}

?>