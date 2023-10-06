<?php
require_once APP_ROOT.'/app/services/SongService.php';
require_once APP_ROOT.'/app/services/CategoryService.php';

class SongController {
    //DS
    public function index() {
        // Gọi dữ liệu từ Class1tService
        $songService = new SongService();
        $songs = $songService->getAllSongs();

        include APP_ROOT.'/app/views/song/index.php';
    }

    // Them
    public function add_song(){

        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategories();

        include APP_ROOT.'/app/views/song/add_song.php';
    }

    public function process_add(){

        if(isset($_POST['sbmSave'])){

            $nameSong = $_POST['nameSong'];
            $singer = $_POST['singer'];
            $idCategory = $_POST['idCategory'];

            $songService = new SongService();
            $check = $songService->addSong($nameSong, $singer, $idCategory);

            if ($check){
                $this->index();
            } else {
                $this->add_song();
            }
        }
    }

    // Sua
    public function edit_song(){

        $id = isset($_GET['idSelect'])? $_GET['idSelect'] : null;

        $songService = new SongService();
        $song = $songService->getBySongId($id);

        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategories();

        include APP_ROOT.'/app/views/song/edit_song.php';
    }

    public function process_edit(){

        if(isset($_POST['sbmSave'])){

            $id = $_POST['id'];
            $nameSong = $_POST['nameSong'];
            $singer = $_POST['singer'];
            $idCategory = $_POST['idCategory'];

            $songService = new SongService();
            $check = $songService->editSong($id, $nameSong, $singer, $idCategory);

            if ($check){
                $this->index();
            }else{
                $this->edit_song();
            }
        }
    }

    // Xoa
    public function delete_song(){

        $id = isset($_GET['idSelect']) ? $_GET['idSelect'] : null;

        $songService = new SongService();
        $check = $songService->deleteSong($id);

        $this->index();
    }
}

?>