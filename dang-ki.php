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
        $is_check = $db->fetchOne("nguoi_dung"," email = '".postInput('email')."' ");
        if ($is_check != NULL) {
            $error['email_isset'] = 'Email đã tồn tại.';
        }
        else {
            $email = postInput('email');
        }

        if (postInput('fullname') == null) {
            $error['fullname'] = "Họ tên không được để trống";
        } else {
            $fullname = postInput('fullname');
        }

        if (postInput('password') == null) {
            $error['password'] = "Mật khẩu không được để trống";
        } else {
            $password = md5(postInput('password'));
        }

        if (postInput('re_password') == null) {
            $error['re_password'] = "Nhập lại mật khẩu";
        }

        if (postInput('re_password') !=  postInput('password') ) {
            $error['re_password1'] = "Mật khẩu không khớp";
        }

        if (empty($error)) {
            $result = $db->query("INSERT INTO  nguoi_dung(ho_ten, mat_khau, email) VALUES('$fullname', '$password', '$email')");
            if (isset($result)) {
                echo "<script>alert('Bạn đã đăng kí thành công');location.href='dang-nhap.php'</script>";
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
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Địa chỉ email*</label>
                        <input type="text" name="email" placeholder="Email address" class="form-control" value="<?= old('email') ?>">
                        <?php
                        if (isset($error['email']))
                            echo "<p class='text-danger'> " . $error['email'];
                        if (isset($error['email_isset']))
                            echo "<p class='text-danger' " . $error['email_isset'];
                        ?>
                    </div>
                    <br>
                    <div class="form-block">
                        <label for="your_last_name">Họ tên*</label>
                        <input type="text" name="fullname"  placeholder="Họ tên" class="form-control" value="<?= old('fullname') ?>">
                        <?php
                        if (isset($error['fullname']))
                            echo "<p class='text-danger'>" . $error['fullname'];
                        ?>
                    </div>
                    <br>
                    <div class="form-block">
                        <label for="phone">Mật khẩu *</label>
                        <input type="password" name="password" placeholder="Password" class="form-control" value="<?= old('password') ?>">
                        <?php
                        if (isset($error['password']))
                            echo "<p class='text-danger' >" . $error['password'];
                        ?>
                    </div>
                    <br>
                    <div class="form-block">
                        <label for="phone">Nhập lại mật khẩu*</label>
                        <input type="password" name="re_password"  placeholder="Re password" class="form-control" value="<?= old('re_password') ?>">
                        <?php
                        if (isset($error['re_password']))
                            echo "<p class='text-danger' >" . $error['re_password'];
                        if (isset($error['re_password1']))
                            echo "<p class='text-danger'>" . $error['re_password1'];
                        ?>


                    </div>
                    <br>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary ">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div>
</section>
<br><br>
<?php include "layouts/footer.php" ?>