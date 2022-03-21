<?php $categoryMenu = $this->requestAction('/categories/menu/');
?>
<section class="navbar main-menu">
    <div class="navbar-inner main-menu">
        <a href="<?php echo Router::url('/')?>" class="logo pull-left">
            <?php
            echo $this->Html->image("../template_story/themes/images/logo.png", array('class'=> "site_logo",'alt'=>""));
            ?>
            
        </a>
        <nav id="menu" class="pull-right">
            <?php if(!empty($categoryMenu)):?>
                <ul>
                    <?php foreach ($categoryMenu as $key => $value) { ?>
                        <li><!--<a href="#"><?php echo $value['Category']['name'];?></a>-->
                                <?php
                                    echo $this->Html->link($value['Category']['name'],
                                        array(
                                            'controller' => 'pages',
                                            'action' => 'view_genre',
                                            'id' => $value['Category']['id'],
                                            'slug' => strtolower(Inflector::slug($value['Category']['name']))),
                                            array('class'=> "")
                                        );
                                ?>
                        </li>
                    <?php }?>
                </ul>
            <?php endif;?>
        </nav>
    </div>
</section>