<section id="footer-bar">
    <div class="row">
        <div class="span7">
            <h4>Liên kết</h4>
            <ul class="nav">
                <li><a href="/">Trang chủ</a></li>  
                <li><a href="http://nongdanit.info">Nongdanit</a></li>
                <li><a href="http://doctruyen.local/chi-tiet/one_pice-1.html/">Oncepice</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </div>
        <div class="span5">
            <p class="logo">
            <?php
                echo $this->Html->image("../template_story/themes/images/logo.png", array('class'=> "site_logo",'alt'=>""));
            ?>
            </p>
            <p>Truyện tranh mới nhất, cập nhật nhanh nhất, các truyện hay nhất</p>
            <br/>
        </div>
    </div>  
</section>
<section id="copyright">
    <span>Copyright 2017 truyentranhonline.com.vn.</span>
</section>
<?php
    echo $this->Html->script(array(
        '../template_story/themes/js/common.js',
    ));
?>