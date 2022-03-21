<?php $randomStorys = $this->requestAction('/stories/randomstory/');
      $readBestStorys = $this->requestAction('/stories/readbeststory/');
?>
<div class="span3 col">
    <div class="block"> 
        <ul class="nav nav-list">
            <li class="nav-header">SUB CATEGORIES</li>
            <li><a href="products.html">Nullam semper elementum</a></li>
            <li class="active"><a href="products.html">Phasellus ultricies</a></li>
            <li><a href="products.html">Donec laoreet dui</a></li>
            <li><a href="products.html">Nullam semper elementum</a></li>
            <li><a href="products.html">Phasellus ultricies</a></li>
            <li><a href="products.html">Donec laoreet dui</a></li>
        </ul>
        <br/>
        <ul class="nav nav-list below">
            <li class="nav-header">MANUFACTURES</li>
            <li><a href="products.html">Adidas</a></li>
            <li><a href="products.html">Nike</a></li>
            <li><a href="products.html">Dunlop</a></li>
            <li><a href="products.html">Yamaha</a></li>
        </ul>
    </div>
    <div class="block">
        <h4 class="title">
            <span class="pull-left"><span class="text">Truyện ngẫu nhiên</span></span>
            <span class="pull-right">
                <a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
            </span>
        </h4>
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
            <?php if(!empty($randomStorys)):?>
                <?php foreach ($randomStorys as $key => $value):
                    if($key == 0){
                        $class_acvite = "active";
                    }else $class_acvite = "";
                ?>
                    <div class="<?php echo $class_acvite;?> item">
                        <ul class="thumbnails listing-products">
                            <li class="span3">
                                <div class="product-box">
                                    <?php $image_name =  $DataComponent->get_image(IMG_DIR . DS . STORIES_DIR . DS, $value['Story']['id'].'.jpg');?>
                                    <?php
                                    $img =  $this->Html->image($image_name, array('alt'=>$value['Story']['name']));
                                    echo $this->Html->link($img,
                                        array(
                                            'controller' => 'pages',
                                            'action' => 'detail_story',
                                            'id' => $value['Story']['id'],
                                            'slug' => strtolower(Inflector::slug($value['Story']['name']))),
                                            array('escape'=>false)
                                        );
                                    ?>
                                    <br/>
                                    <?php
                                        echo $this->Html->link($value['Story']['name'],
                                            array(
                                                'controller' => 'pages',
                                                'action' => 'detail_story',
                                                'id' => $value['Story']['id'],
                                                'slug' => strtolower(Inflector::slug($value['Story']['name']))),
                                                array('class'=> "title")
                                                );
                                    ?>
                                    <br/>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            </div>
        </div>
    </div>
    <div class="block">                             
        <h4 class="title"><strong>Đọc nhiều</strong> Nhất</h4>                             
        <ul class="small-product">
            <?php if(!empty($readBestStorys)):?>
                <?php foreach ($readBestStorys as $key => $value):
                ?>
                <li>
                    <?php $image_name =  $DataComponent->get_image(IMG_DIR . DS . STORIES_DIR . DS, $value['Story']['id'].'.jpg');?>
                    <?php
                    $img =  $this->Html->image($image_name, array('alt'=>$value['Story']['name']));
                    echo $this->Html->link($img,
                        array(
                            'controller' => 'pages',
                            'action' => 'detail_story',
                            'id' => $value['Story']['id'],
                            'slug' => strtolower(Inflector::slug($value['Story']['name']))),
                            array('escape'=>false, "title"=> $value['Story']['name'])
                        );
                    ?>
                    <?php
                        echo $this->Html->link($value['Story']['name'],
                            array(
                                'controller' => 'pages',
                                'action' => 'detail_story',
                                'id' => $value['Story']['id'],
                                'slug' => strtolower(Inflector::slug($value['Story']['name']))),
                                array('class'=> "")
                                );
                    ?>
                </li>
                <?php endforeach;?>
            <?php endif?>
        </ul>
    </div>
</div>