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
        <div class="m-5 text-center">
            <div class="mx-5">
                <form action="?controller=student&action=process_edit" method="post">
                    <h2 class="mb-4">SỬA THÔNG TIN SINH VIÊN</h2>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text ms-5" id="addon-wrapping">Mã sinh viên</span>
                        <input type="text" class="form-control me-5 bg-warning" aria-label="id" aria-describedby="addon-wrapping" name="id" value="<?php echo $student->getId(); ?>" readonly>
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text ms-5" id="addon-wrapping">Tên sinh viên</span>
                        <input type="text" class="form-control me-5" aria-label="nameStudent" aria-describedby="addon-wrapping" name="nameStudent" value="<?php echo $student->getNameStudent(); ?>">
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text ms-5" id="addon-wrapping">email</span>
                        <input type="email" class="form-control me-5" aria-label="email" aria-describedby="addon-wrapping" name="email" value="<?php echo $student->getEmail(); ?>">
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text ms-5" id="addon-wrapping">Ngày sinh</span>
                        <input type="date" class="form-control me-5" aria-label="dateOfBirth" aria-describedby="addon-wrapping" name="dateOfBirth" value="<?php echo $student->getDateOfBirth(); ?>">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text ms-5" for="inputGroupSelect01">Mã lớp học</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="idClass1" value="<?php echo $student->getIdClass1(); ?>">
                            <?php
                            foreach ($classes1 as $class1) {
                            ?>
                                <?php if ($student->getIdClass1() == $class1->getId()) { ?>
                                    <option selected>
                                        <?php echo $class1->getNameClass1(); ?>
                                    </option>
                                <?php } else { ?>
                                    <option value="<?php echo $class1->getId(); ?>">
                                        <?php echo $class1->getNameClass1(); ?>
                                    </option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end me-5">
                        <button type="submit" name="sbmSave" class="btn btn-success px-4 m-0">Lưu lại</button>
                        <a href="?controller=student&action=index">
                            <button type="button" class="btn btn-warning px-4 m-0">Quay lại</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>