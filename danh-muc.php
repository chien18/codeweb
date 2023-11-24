<?php include "layouts/head.php" ?>
<body>
    <?php include "layouts/header.php" ?>
    <!-- header area end here -->
    <?php include "layouts/slide.php" ?>

    <?php 
    $id_danh_muc = getInput('id');

    if (isset($_GET['p'])) {
        $p = $_GET['p'];
    } else {
        $p = 1;
    }

    $ten_danh_muc = $db->fetchsql("SELECT * FROM danh_muc WHERE id = $id_danh_muc");
    $sql = "SELECT * FROM tin_tuc WHERE danh_muc_id = $id_danh_muc and hien_thi=1 ORDER BY id_tin DESC";

    $total = $db->count_sql($sql);


    $datas = $db->fetchJones("tin_tuc",$sql,$total,$p,8,true);
//var_dump($data);
    $total_page = $datas['page'];
    unset($datas['page']);
    $path = $_SERVER['SCRIPT_NAME'];

    ?>
    <!-- slider area end here -->
    <section class="offer-package" style="margin-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-left" style="color: blue">
                        <h3><?= $ten_danh_muc['ten_danh_muc'] ?></h3>
                    </div>
                </div>
            </div>


            
            <div class="row">
                <?php foreach($datas as $item): ?>
                    <div class="col-md-6" style="height: 250px">
                    <div class="media row" style="margin-bottom: 20px">
                        <div class="col-md-6">
                            <div class="media-left" style="width=" 100%
                            ">
                            <img class="img-responsive" style="height: 190px"
                                 src="<?= base_url() ?>public/uploads/tintuc/<?= $item['hinh_anh'] ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="media-body">
                            <a href="chitiettin.php?id_tin=<?= $item['id_tin'] ?>">
                                <h4 class="media-heading"><?= $item['tieu_de'] ?></h4>
                            </a>

                            <p><?= limitWords($item['noi_dung'], 22) ?></p>
                            <div class="offer-btn">
                                <a href="chitiettin.php?id_tin=<?= $item['id_tin'] ?>"
                                   class="travel-booking-btn-lg hvr-shutter-out-horizontal">Chi
                                    tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>
<div class="clearfix">

</div>
<div style="text-align: center">
    <nav aria-label="...">
        <ul class="pagination">

            <?php for ($i = 1; $i <= $total_page; $i++): ?>
                <?php
                if (isset($_GET['p']) && $_GET['p'] == $i) {
                    $active = "active";
                } else {
                    $active = "";
                }

                ?>
                <li class="page-item <?php echo $active ?>">
                    <a class="page-link" href="<?php echo $path ?>?id=<?=$id_danh_muc?>&p=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor ?>

        </ul>
    </nav>
</div>
<br><br>
<?php include "layouts/footer.php" ?>
<?php if (!isset($_GET['p'])) {
    echo '<script>
    $(".pagination li:nth-child(1)").addClass("active");
    </script>';
} ?>