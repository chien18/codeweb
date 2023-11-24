<?php include "layouts/head.php" ?>

<?php
if (isset($_POST['s'])) {
    $key = $_POST['s'];
    $sql = "SELECT * FROM tin_tuc WHERE tieu_de LIKE '%$key%'";
    $news = $db->query($sql);
    $total = $db->count_sql($sql);

}
?>
 ?>
<body>
    <?php include "layouts/header.php" ?>
    <!-- header area end here -->
    <?php include "layouts/slide.php" ?>

    
    <!-- slider area end here -->
    <section class="offer-package" style="margin-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-left" style="color: blue">
                        <h4>Tìm thấy <span style="color: red"><?= $total ?></span> kết quả</h4>
                    </div>
                </div>
            </div>


            
            <div class="row">
                <?php foreach($news as $item): ?>
                    <div class="col-md-6">
                        <div class="media row" style="margin-bottom: 20px">
                            <div class="col-md-6">
                                <div class="media-left" style="width="100%">
                                    <img class="img-responsive" style="height: 190px"  src="<?= base_url() ?>public/uploads/tintuc/<?= $item['hinh_anh'] ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media-body">
                                    <a href="chitiettin.php?id_tin=<?= $item['id_tin'] ?>">
                                        <h4 class="media-heading"><?= $item['tieu_de'] ?></h4>
                                    </a>
                                    <p><?= limitWords($item['noi_dung'], 22)?></p>
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

<br><br>
<?php include "layouts/footer.php" ?>
