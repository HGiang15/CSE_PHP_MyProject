<?php
require_once APP_ROOT.'/app/models/Song.php';

class SongService {
    // Lay DS
    public function getAllSongs() {
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM song;";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            //Buoc 3: Xu ly ket qua
            $songs = [];
            while ($row = $stmt->fetch()){
                $song = new Song(
                    $row['id'],
                    $row['nameSong'],
                    $row['singer'],
                    $row['idCategory']);
                $songs[] = $song;
            }

            return $songs;
        }else{
            return $songs = [];
        }

    }

    // Them
    public function addSong($nameSong, $singer, $idCategory){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM category WHERE id = '$idCategory'; ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount()<= 0){
                return false;
            }

            $sql = "SELECT * FROM song;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xử lý kết quả
            $rowCount = $stmt->rowCount();

            for ($i=1; $i<=$rowCount; $i++) {
                $sql = "SELECT * FROM song WHERE id = '$i'; ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount()<= 0){
                    break;
                }
            }

            $sql = "INSERT INTO song (id, nameSong, singer, idCategory) 
            VALUES ('$i', '$nameSong', '$singer', '$idCategory');";
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
    public function getBySongId($id){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM song WHERE id = '$id'; ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xu ly ket qua
            $row = $stmt->fetchAll();
            $song = new Song(
                $row[0]['id'],
                $row[0]['nameSong'],
                $row[0]['singer'],
                $row[0]['idCategory']);
            return $song;
        }else{
            return null;
        }
    }

    public function editSong($id, $nameSong, $singer, $idCategory){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM category WHERE id = '$idCategory'; ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount()<= 0){
                return false;
            }

            //Buoc 3: Xử lý kết quả

            $sql = "UPDATE song SET nameSong = '$nameSong', singer = '$singer', idCategory = '$idCategory'
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
    public function deleteSong($id){
        
        //Buoc 1: Mo ket noi
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn != null){
            //Buoc 2: Thuc hien truy van
            $sql = "DELETE FROM song WHERE id = '$id'";
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