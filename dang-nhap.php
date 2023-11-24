<?php include "layouts/head.php" ?>
<body>
    <?php include "layouts/header.php" ?>
    <!-- header area end here -->
    <?php include "layouts/slide.php" ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $error = array();
        if (postInput('email') == null) {
            $error['email'] = "email không được để trống";
        }
        else {
            $email = postInput('email');
        }

        if (postInput('password') == null) {
            $error['password'] = "Mật khẩu không được để trống";
        } else {
            $password = md5(postInput('password'));
        }

        if (empty($error)) {

            $is_check = mysqli_fetch_assoc($db->query("SELECT * FROM nguoi_dung WHERE email = '$email' AND mat_khau = '$password'"));
            if (isset($is_check) != NULL) {
                $_SESSION['ten_nguoi_dung'] = $is_check['ho_ten'];
                $_SESSION['nguoi_dung_id'] = $is_check['id_nguoi_dung'];
                $_SESSION['nguoi_dung_email'] = $is_check['email'];
                echo "<script>alert('Đăng nhập thành công');location.href='index.php'</script>";

            } else {
                $_SESSION['error_login_customer'] = "Tài khoản hoặc mật khẩu không chính xác";

            }
        }
    }
    ?>


    <section class="offer-package" style="margin-top: 20px">
        <div class="container">
          <form action="" method="post" class="beta-form-checkout">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>
                    <?php if (isset($_SESSION['error_login_customer'])):?>
                        <div class="text text-danger">
                            <?php echo $_SESSION['error_login_customer']; session_unset();?>
                        </div>
                    <?php endif ?>
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="text" name="email" class="form-control" value="<?= old('email') ?>">
                        <?php
                        if (isset($error['email']))
                            echo "<p class='text-danger'>" . $error['email'];
                        ?>

                    </div><br>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" name="password" class="form-control" value="<?= old('password') ?>">
                        <?php
                        if (isset($error['password']))
                            echo "<p class='text-danger'>" . $error['password'];
                        ?>
                    </div>
                    <br>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div>
</section>
<br><br>
<?php include "layouts/footer.php" ?>