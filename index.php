<?php include "layouts/head.php" ?>
    <body>
<?php include "layouts/header.php" ?>
    <!-- header area end here -->
<?php include "layouts/slide.php" ?>
    <!-- slider area end here -->
    <section class="offer-package" style="margin-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title-version-2-black text-center">
                        <h2>Tin tức mới nhất</h2>
                    </div>
                </div>
            </div>
            <?php $new_news = $db->query("SELECT * FROM tin_tuc WHERE hien_thi = 1  ORDER BY id_tin DESC LIMIT 6") ?>
            <div class="row">
                <?php foreach ($new_news as $item): ?>

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
                                   class="travel-booking-btn-lg hvr-shutter-out-horizontal">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        </div>
    </section>


    <section class="offer-package" style="margin-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title-version-2-black text-center">
                        <h2>Tin tức xem nhiều nhất</h2>
                    </div>
                </div>
            </div>
            <?php $top_news = $db->query("SELECT * FROM tin_tuc WHERE hien_thi = 1  ORDER BY luot_xem DESC LIMIT 6") ?>
            <div class="row">
                <?php foreach ($top_news as $item): ?>

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
    </section>
    <br><br>
<?php include "layouts/footer.php" ?>