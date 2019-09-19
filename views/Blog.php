<!-- classes -->	<!-- blog -->
        <div class="line">
        </div>
        <div id="blog" class="banner-bottom blog">
            <div class="container">
                <div class="w3ls-heading">
                    <?php foreach ($menu as $m):?>
                    <?php if($m->id_menu == 6): ?>
                    <h3><?php echo $m->name_menu; ?></h3>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php foreach ($blog as $b): ?>
                <div class="modal about-modal fade" id="<?php echo $b->id_blog?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="span2" aria-hidden="true">&times;</span></button>						
                        <h4 class="modal-title"><?php echo $b->title_blog?></h4>
                    </div> 
                    <div class="modal-body">
                        <div class="agileits-w3layouts-info">
                            <img src="<?php echo base_url();?>images/blog/<?php echo $b->pic_blog?>" alt="<?php echo $b->pic_blog; ?>" />
                            <p style="text-indent: 30px; text-align: justify"><?php echo $b->text_blog?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <?php endforeach; ?>
                <div class="w3layouts_classes_grids">
                    <ul id="flexiselDemo1">	
                        <?php foreach ($blog as $b):?>
                        <li>
                            <div class="w3_agile_class_grid">
                                <div class="w3layouts_team_grid agileits_w3layouts_class">
                                    <img src="<?php echo base_url();?>images/blog/<?php echo $b->pic_blog?>" alt="<?php echo $b->title_blog?>" class="img-responsive" />
                                    <div class="w3layouts_team_grid_pos">
                                        <div class="wthree_text">
                                            <a class="agile_class" href="#" data-toggle="modal" data-target="#<?php echo $b->id_blog?>"> Više</a>
                                        </div>
                                    </div>
                                    <div class="agileits_w3layouts_class_pos">
                                        <ul>
                                            <li><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo date("d/m/Y", $b->date_blog); ?></li>
<!--                                            <li><i class="fa fa-comments-o" aria-hidden="true"></i><a href="#">11</a></li>
                                            <li><i class="fa fa-share" aria-hidden="true"></i><a href="#">9</a></li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="w3_agileits_class_grid">
                                    <h4><a href="#" data-toggle="modal" data-target="#<?php echo $b->id_blog?>"><?php echo $b->title_blog?></a></h4>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
<!--                        <li>
                            <div class="w3_agile_class_grid">
                                <div class="w3layouts_team_grid agileits_w3layouts_class">
                                    <img src="<?php echo base_url();?>images/20.jpg" alt=" " class="img-responsive" />
                                    <div class="w3layouts_team_grid_pos">
                                        <div class="wthree_text">
                                            <a class="agile_class" href="#" data-toggle="modal" data-target="#myModal">Learn More</a>
                                        </div>
                                    </div>
                                    <div class="agileits_w3layouts_class_pos">
                                        <ul>
                                            <li><i class="fa fa-calendar-o" aria-hidden="true"></i>15/3/2017</li>
                                            <li><i class="fa fa-comments-o" aria-hidden="true"></i><a href="#">24</a></li>
                                            <li><i class="fa fa-share" aria-hidden="true"></i><a href="#">11</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="w3_agileits_class_grid">
                                    <h4><a href="#" data-toggle="modal" data-target="#myModal">auctor eget sem feugiat</a></h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="w3_agile_class_grid">
                                <div class="w3layouts_team_grid agileits_w3layouts_class">
                                    <img src="<?php echo base_url();?>images/21.jpg" alt=" " class="img-responsive" />
                                    <div class="w3layouts_team_grid_pos">
                                        <div class="wthree_text">
                                            <a class="agile_class" href="#" data-toggle="modal" data-target="#myModal">Learn More</a>
                                        </div>
                                    </div>
                                    <div class="agileits_w3layouts_class_pos">
                                        <ul>
                                            <li><i class="fa fa-calendar-o" aria-hidden="true"></i>16/3/2017</li>
                                            <li><i class="fa fa-comments-o" aria-hidden="true"></i><a href="#">26</a></li>
                                            <li><i class="fa fa-share" aria-hidden="true"></i><a href="#">22</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="w3_agileits_class_grid">
                                    <h4><a href="#" data-toggle="modal" data-target="#myModal">blandit dolor venenatis</a></h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="w3_agile_class_grid">
                                <div class="w3layouts_team_grid agileits_w3layouts_class">
                                    <img src="<?php echo base_url();?>images/1.jpg" alt=" " class="img-responsive">
                                    <div class="w3layouts_team_grid_pos">
                                        <div class="wthree_text">
                                            <a class="agile_class" href="#" data-toggle="modal" data-target="#myModal">Learn More</a>
                                        </div>
                                    </div>
                                    <div class="agileits_w3layouts_class_pos">
                                        <ul>
                                            <li><i class="fa fa-calendar-o" aria-hidden="true"></i>17/3/2017</li>
                                            <li><i class="fa fa-comments-o" aria-hidden="true"></i><a href="#">29</a></li>
                                            <li><i class="fa fa-share" aria-hidden="true"></i><a href="#">10</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="w3_agileits_class_grid">
                                    <h4><a href="#" data-toggle="modal" data-target="#myModal">cursus urna urna quis</a></h4>
                                </div>
                            </div>
                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- //classes -->	<!-- //blog -->