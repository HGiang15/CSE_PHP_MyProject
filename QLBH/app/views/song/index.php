<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lớp học</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> -->
</head>

<body>
    <header>
        <?php
        include_once(APP_ROOT . '/app/views/layout/header.php')
        ?>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="?controller=song&action=add_song">
                        <button type="button" class="btn btn-success my-4">Thêm mới bài hát</button>
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã bài hát</th>
                                <th scope="col">Tên bài hát</th>
                                <th scope="col">Ca sỹ</th>
                                <th scope="col">Mã thể loại</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($songs as $song) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $song->getId(); ?></th>
                                    <td><?php echo $song->getNameSong(); ?></td>
                                    <td><?php echo $song->getSinger(); ?></td>
                                    <td><?php echo $song->getIdCategory(); ?></td>
                                    <td>
                                        <a class="fs-4 color-primary" href="?controller=song&action=edit_song&idSelect=<?php echo $song->getId(); ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="fs-4 color-primary user-delete-link" href="" data-bs-toggle="modal" data-bs-target="#modal<?php echo $song->getId(); ?>">
                                            <i class="fa-solid fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal<?php echo $song->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa bài hát có id: <?php echo $song->getId(); ?>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="?controller=song&action=delete_song&idSelect=<?php echo $song->getId(); ?>">
                                                        <button type="button" class="btn btn-primary">Yes</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>