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
                    <a href="?controller=class1&action=add_class1">
                        <button type="button" class="btn btn-success my-4">Thêm mới Lớp học</button>
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã lớp học</th>
                                <th scope="col">Tên Lớp</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($classes1 as $class1) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $class1->getId(); ?></th>
                                    <td><?php echo $class1->getNameClass1(); ?></td>
                                    <td>
                                        <a class="fs-4 color-primary" href="?controller=class1&action=edit_class1&idSelect=<?php echo $class1->getId(); ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="fs-4 color-primary user-delete-link" href="" data-bs-toggle="modal" data-bs-target="#modal<?php echo $class1->getId(); ?>">
                                            <i class="fa-solid fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal<?php echo $class1->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa Lớp có id: <?php echo $class1->getId(); ?>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="?controller=class1&action=delete_class1&idSelect=<?php echo $class1->getId(); ?>">
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
    
    <!-- Phân trang -->
    <aside>
        <div class="container">
            <div class="wrapper mt-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php if ($page > 1) { ?>
                            <li class="page-item"><a class="page-link" href="?controller=class1&action=index&page=<?php echo $page - 1; ?>">Previous</a></li>
                        <?php } ?>
    
                        <?php
                        if ($page < $total / 10 || $page + 1 < $total / 10) {
                            for ($i = $page; $i <= $page + 1; $i++) { ?>
                                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?controller=class1&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php
                            }
                        } else { ?>
                            <li class="page-item active">
                                <a class="page-link" href="?controller=class1&action=index&page=<?php echo $page; ?>"><?php echo $page; ?></a>
                            </li>
                        <?php } ?>
    
                        <?php if ($page < $total / 10) { ?>
                            <li class="page-item"><a class="page-link" href="?controller=class1&action=index&page=<?php echo $page + 1; ?>">Next</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>

    <footer>
        <?php require_once APP_ROOT.'/app/views/layout/footer.php'; ?>
    </footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>