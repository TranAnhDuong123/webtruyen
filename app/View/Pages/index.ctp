<?php if(!empty($dataSlide)):?>
<section  class="homepage-slider" id="home-slider">
	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($dataSlide as $key => $value):?>
				<li>
                    <a href="<?php echo $value["Slide"]["link"]?>">
                    	<?php echo  $this->Html->image(SLIDE_DIR . DS. $value['Slide']['id'].'.jpg', array('alt'=>$value['Slide']['link']));?>
                    </a>
				</li>
			<?php endforeach;?>
		</ul>
	</div>			
</section>
<?php endif;?>
<section class="header_text">
	We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates. 
	<br/>Don't miss to use our cheap abd best bootstrap templates.
</section>
<section class="main-content">
	<div class="row">
		<div class="span12">
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Truyện <strong>Mới nhất</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
						</span>
					</h4>
					<?php if(!empty($dataStoryNewUpdate)):?>
					<div id="myCarousel" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<?php if(!empty($dataStoryNewUpdate["item_active"])):?>
							<div class="active item">
								<ul class="thumbnails">
									<?php foreach ($dataStoryNewUpdate["item_active"] as $key => $value) { ?>
										<li class="span3">
											<div class="product-box">
												<span class="sale_tag"></span>
												<p>
													<?php $image_name =  $DataComponent->get_image(IMG_DIR . DS . STORIES_DIR . DS, $value['Story']['id'].'.jpg');?>
		                                            <?php
		                                            $img =  $this->Html->image($image_name, array('alt'=>$value['Story']['name']));
		                                            echo $this->Html->link($img,
		                                            	array(
				                                            'controller' => 'pages',
				                                            'action' => 'detail_story',
				                                            'id' => $value['Story']['id'],
				                                            'slug' => strtolower(Inflector::slug($value['Story']['name']))),
				                                            array('class'=> "title", 'escape'=>false)
		                                            	);
		                                            ?>
												</p>
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
									<?php }?>
								</ul>
							</div>
							<?php endif;?>
							<?php if(!empty($dataStoryNewUpdate["item"])):?>
							<div class="item">
								<ul class="thumbnails">
								<?php foreach ($dataStoryNewUpdate["item"] as $key => $value) { ?>
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p>
												<?php $image_name =  $DataComponent->get_image(IMG_DIR . DS . STORIES_DIR . DS, $value['Story']['id'].'.jpg');?>
	                                            <?php
	                                            $img =  $this->Html->image($image_name, array('alt'=>$value['Story']['name']));
	                                            echo $this->Html->link($img,
	                                            	array(
			                                            'controller' => 'pages',
			                                            'action' => 'detail_story',
			                                            'id' => $value['Story']['id'],
			                                            'slug' => strtolower(Inflector::slug($value['Story']['name']))),
			                                            array('class'=> "title", 'escape'=>false)
	                                            	);
	                                            ?>
											</p>
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
								<?php }?>
								</ul>
							</div>
							<?php endif;?>
						</div>
					</div>
					<?php endif;?>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Truyện <strong>Xem nhiều</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
						</span>
					</h4>
					<?php if(!empty($dataStoryView)):?>
					<div id="myCarousel-2" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<?php if(!empty($dataStoryView["item_active"])):?>
							<div class="active item">
								<ul class="thumbnails">												
									<?php foreach ($dataStoryView["item_active"] as $key => $value) { ?>
										<li class="span3">
											<div class="product-box">
												<span class="sale_tag"></span>
												<p>
													<?php $image_name =  $DataComponent->get_image(IMG_DIR . DS . STORIES_DIR . DS, $value['Story']['id'].'.jpg');?>
		                                            <?php
		                                            $img =  $this->Html->image($image_name, array('alt'=>$value['Story']['name']));
		                                            echo $this->Html->link($img,
		                                            	array(
				                                            'controller' => 'pages',
				                                            'action' => 'detail_story',
				                                            'id' => $value['Story']['id'],
				                                            'slug' => strtolower(Inflector::slug($value['Story']['name']))),
				                                            array('class'=> "title", 'escape'=>false)
		                                            	);
		                                            ?>
												</p>
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
									<?php }?>
								</ul>
							</div>
							<?php endif;?>
							<?php if(!empty($dataStoryView["item"])):?>
							<div class="item">
								<ul class="thumbnails">
									<?php foreach ($dataStoryView["item"] as $key => $value) { ?>
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p>
												<?php $image_name =  $DataComponent->get_image(IMG_DIR . DS . STORIES_DIR . DS, $value['Story']['id'].'.jpg');?>
	                                            <?php
	                                            $img =  $this->Html->image($image_name, array('alt'=>$value['Story']['name']));
	                                            echo $this->Html->link($img,
	                                            	array(
			                                            'controller' => 'pages',
			                                            'action' => 'detail_story',
			                                            'id' => $value['Story']['id'],
			                                            'slug' => strtolower(Inflector::slug($value['Story']['name']))),
			                                            array('class'=> "title", 'escape'=>false)
	                                            	);
	                                            ?>
											</p>
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
								<?php }?>
								</ul>
							</div>
							<?php endif;?>
						</div>
					</div>
					<?php endif;?>
				</div>
			</div>
			<div class="row feature_box">
				<div class="span4">
					<div class="service">
						<div class="responsive">	
							<img src="../template_story/themes/images/feature_img_2.png" alt="" />
							<h4>MODERN <strong>DESIGN</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
						</div>
					</div>
				</div>
				<div class="span4">	
					<div class="service">
						<div class="customize">			
							<img src="../template_story/themes/images/feature_img_1.png" alt="" />
							<h4>FREE <strong>SHIPPING</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="service">
						<div class="support">	
							<img src="../template_story/themes/images/feature_img_3.png" alt="" />
							<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>	
			</div>		
		</div>				
	</div>
</section>
<section class="our_client">
	<h4 class="title"><span class="text">Manufactures</span></h4>
	<div class="row">					
		<div class="span2">
			<a href="#"><img alt="" src="../template_story/themes/images/clients/14.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="../template_story/themes/images/clients/35.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="../template_story/themes/images/clients/1.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="../template_story/themes/images/clients/2.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="../template_story/themes/images/clients/3.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="../template_story/themes/images/clients/4.png"></a>
		</div>
	</div>
</section>