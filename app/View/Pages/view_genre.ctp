<?php //print_r($data);?>
<div id="resultsDiv">
    <section class="header_text sub">
        <h4><span><?php echo $data["dataGenre"]["Category"]["name"];?></span></h4>
    </section>
    <section class="main-content">
        <div class="row">                       
            <div class="span9">                             
                <ul class="thumbnails listing-products">
                <?php if(!empty($data["dataStory"])):?>
                    <?php
                    // Paginator options
                    $this->Paginator->options(array(
                        "update" => "#resultsDiv",
                        "before" => $this->Js->get("#spinner")->effect("fadeIn", array("buffer" => false)),
                        "complete" => '$("html, body").animate({scrollTop: 0}, "slow");',
                        'evalScripts' => true, 
                        ));
                    ?>
                    <?php foreach($data["dataStory"] as $row) :?>
                    <li class="span3">
                        <div class="product-box">
                            <span class="sale_tag"></span>
                            <!-- <a href="product_detail.html"> -->
                                <?php $image_name =  $DataComponent->get_image(IMG_DIR . DS . STORIES_DIR . DS, $row['Story']['id'].'.jpg');?>
                                <?php
                                // echo $this->Html->image($image_name, array('alt'=>$row['Story']['name']));
                                $img = $this->Html->image($image_name, array('alt' => $row['Story']['name']));
                                echo $this->Html->link(
                                    $img,
                                    array(
                                        'controller' => 'pages',
                                        'action' => 'detail_story',
                                        'id' => $row['Story']['id'],
                                        'slug' => strtolower(Inflector::slug($row['Story']['name']))
                                    ),
                                    array('class' => "title", 'escape' => false)
                                );
                                ?>
                            </a>
                            <br/>
                            <a class="title">
                                <?php 
                                    // echo $row["Story"]["name"]
                                    echo $this->Html->link(
                                        $row['Story']['name'],
                                        array(
                                            'controller' => 'pages',
                                            'action' => 'detail_story',
                                            'id' => $row['Story']['id'],
                                            'slug' => strtolower(Inflector::slug($row['Story']['name']))
                                        ),
                                        array('class' => "title")
                                    );
                                ?>
                            </a><br/>
                            <a href="#" class="category"><?php echo $data["dataGenre"]["Category"]["name"];?></a>
                            <p class="price"><?php echo $row["Story"]["view"]?></p>
                        </div>
                    </li>
                    <?php endforeach;?>
                <?php endif;?>
                </ul>
                <hr>
                <!-- <div class="pagination pagination-small pagination-centered">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div> -->
                <div class="pagination pagination-small pagination-centered">
                    <div id="spinner" style="display: none;">
                        <?php echo $this->Html->image("loading.gif", array("id" => "busy-indicator")); ?>
                    </div>
                    <?php if($this->Paginator->param('count') > 6):?>
                    <?php
                     $this->Paginator->options(array('url' => array('id'=>$data["dataGenre"]["Category"]["id"],'slug' => strtolower(Inflector::slug($data["dataGenre"]["Category"]["name"])))));
                     ?>
                     <?php echo $this->Paginator->prev("Prev"); ?>
                     <?php echo $this->Paginator->numbers(array("separator"=>" ")); ?>
                     <?php echo $this->Paginator->next("Next"); ?>
                    <?php endif;?>
                    <?php echo $this->Js->writeBuffer();?>
                </div>
            </div>
            <div>
                <?php echo $this->element('story/nav');?>
            </div>
        </div>
    </section>
</div>
