<?php
require_once APP_ROOT.'/app/models/Category.php';

class CategoryService {
    // Lay DS the loai
    public function getAllCategories() {
        // B1: Ket noi Database
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM category ORDER BY id DESC;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            //Buoc 3: Xu ly ket qua
            $Categories = [];
            while ($row = $stmt->fetch()){
                $Category = new Category($row['id'], $row['nameCategory']);
                $Categories[] = $Category;
            }

            return $Categories;

        } else {
            return $Categories = [];
        }
    }

    // Them the loai
    public function addCategory($nameCategory){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM category;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xử lý kết quả
            $rowCount = $stmt->rowCount();

            for ($i=1; $i<=$rowCount; $i++) {
                $sql = "SELECT * FROM category WHERE id = '$i';";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount()<=0){
                    break;
                }
            }

            $sql = "INSERT INTO category (id, nameCategory) VALUES ('$i','$nameCategory');";
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

    // Sua the loai
    public function getByCategoryId($id){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM category WHERE id = '$id'; ";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xu ly ket qua
            $row = $stmt->fetchAll();

            $Category = new Category($row[0]['id'], $row[0]['nameCategory']);

            return $Category;
        } else {
            return null;
        }
        
    }

    public function editCategory($id, $nameCategory){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "UPDATE category SET nameCategory = '$nameCategory' WHERE id = '$id'";

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
    public function deleteCategory($id){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "DELETE FROM category WHERE id = '$id' ";
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