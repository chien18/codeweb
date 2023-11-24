<?php include "layouts/head.php" ?>
<body>
    <?php include "layouts/header.php" ?>
    <!-- header area end here -->
    <?php include "layouts/slide.php" ?>
    <div class="clearfix">

    </div>
    <!-- slider area end here -->
    <?php
    $id_tin = getInput('id_tin');
    $news = $db->fetchsql("SELECT * FROM tin_tuc WHERE id_tin = $id_tin") ;

    ?>
    <section class="offer-package" style="margin-top: 20px">
        <div class="container">
          <h2><?= $news['tieu_de'] ?></h2>
          <p class="text-justify">
            <?= $news['noi_dung'] ?>
        </p>
    </div>

</section>

<?php 
$sessionKey1 = 'post_' . $id_tin;
        // $_SESSION['sessionKey'] = $sessionKey1;
        //  // $sessionView = $_SESSION[$sessionKey];
        // $sessionView = $_SESSION['sessionKey']; 


  if (!isset($_SESSION[$sessionKey1])) { // nếu chưa có session
    $_SESSION[$sessionKey1] = 1;
    dem_lan_xem($id_tin);
}
function dem_lan_xem($id)
{
    $db = new Database();
    $sql_count= "UPDATE tin_tuc SET luot_xem = luot_xem+1 WHERE id_tin = $id";
    $db->query($sql_count);
    return;
}

?>

<section class="offer-package" style="margin-top: 20px">

     <?php
    $id_tin = getInput('id_tin');
    if (isset($_POST['btn_comment'])) {

        $content = postInput('content');
        $id_nguoi_dung =  $_SESSION['nguoi_dung_id'];

        $sql = "INSERT INTO  binh_luan(nguoi_dung_id, tin_tuc_id, noi_dung) VALUES($id_nguoi_dung, $id_tin,'$content')";
        $result = $db->query($sql);
    }
    ?> 
    <div style="width: 100%; float:left;">
        <div class="likeFace" style="float:left;margin-left: 7em;">
            <div  class="fb-like" 
                data-href="http://localhost/tintucdulich" 
                data-layout="standard" 
                data-action="like" 
                data-size="small" 
                data-show-faces="true" 
                data-share="true">
            </div>
        </div>
        <div class="picShare" style="float:left;margin-left: 12em; margin-top: -2em;">
            <div style="background-color:transparent;font-size:14px;padding:10px 0 11px;position:relative;margin-top:10px;color:#a5b2bd;">
                <span style='float:left;margin-left:10px;margin-right:10px;font-size:18px;font-family:Tahoma;color:#a5b2bd;text-transform:uppercase'>
                <img alt='img-like1' class='icon-action' height='40' src='http://i.imgur.com/DdvlrSh.png' width='286'/> </span>
            </div>
        </div>
        <div class="share" style="float:left;">
            <span class='st_sharethis_large' displayText='ShareThis'></span>
            <span class='st_facebook_large' displayText='Facebook'></span>
            <span class='st_twitter_large' displayText='Tweet'></span>
            <span class='st_email_large' displayText='Email'></span>
        </div> 
        
           <div id="fb-root"></div>
            <script>
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
    </div>
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "ur-d207247d-f4a3-e98e-1da2-57aaba9d6ddf"});</script>
    
    <div class="container"><hr>
        <h4>Bình luận</h4>
        <?php if (isset( $_SESSION['ten_nguoi_dung'])) :?>
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" required="" name="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn_comment">Gửi</button>
                </form>
            </div>
        <?php endif; ?>

        <?php $comments = $db->query("SELECT binh_luan.id, binh_luan.nguoi_dung_id, binh_luan.tin_tuc_id, binh_luan.noi_dung, binh_luan.created_at, nguoi_dung.id_nguoi_dung, nguoi_dung.ho_ten FROM binh_luan INNER JOIN nguoi_dung ON binh_luan.nguoi_dung_id = nguoi_dung.id_nguoi_dung WHERE binh_luan.tin_tuc_id = $id_tin ORDER BY binh_luan.id DESC");

        ?>
        <?php foreach($comments as $item) : ?>
            <div class="media">
                <div class="media-body">
                    <?php $timestamp = strtotime($item['created_at']);
                    $new_date_format = date('d-m-Y H:i:s', $timestamp); ?>
                    <h4 class="media-heading"><?= $item['ho_ten'] ?>
                    <small><?=$new_date_format ?></small>
                </h4>
                <p><?= $item['noi_dung'] ?></p>
            </div>

        </div>
    <?php endforeach; ?>
</div>
</section>
<br><br>
</body>
<?php include "layouts/footer.php" ?>