<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="ordination">    
    <div class="container"> 
        <?php foreach ($text as $t): ?>
            <?php if ($t->id_menu == 4): ?>
                <div class="w3ls-heading">
                    <?php foreach ($menu as $m): ?>
                        <?php if ($m->id_menu == 4): ?>
                            <h3><?php echo $m->name_menu; ?></h3>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="about-right" style="box-sizing: border-box;">
                    <?php if ($t->title_text_site != ''): ?>
                        <h2 style="text-indent: 20px; text-align: justify"><?php echo $t->title_text_site; ?></h2>
                    <?php endif ?>
                </div>
                <div>
                    <br/>
                    <?php if ($t->pic_text_site != ''): ?>
                        <div class="col-md-6 about-left">
                            <?php if ($t->text_text_site_1 != ''): ?>
                                <p style="text-indent: 20px; text-align: justify; padding-bottom: 10px"><?php echo $t->text_text_site_1; ?></p>
                            <?php endif; ?>
                            <ul style="padding-left: 80px; text-align: justify">
                                <?php foreach ($list as $l): ?>
                                    <?php if ($l->id_text_site == $t->id_text_site): ?>
                                        <li style="padding-bottom: 5px"><?php echo $l->item_list_site; ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                            </p>
                        </div>
                        <?php if ($t->text_text_site_2 != ''): ?>
                            <div class="col-md-6 about-right">
                                <div class="w3labout-img"> 
                                    <img src="<?php echo base_url(); ?>images/<?php echo $t->pic_text_site ?>" alt="<?php echo $t->title_text_site ?>" class="img-responsive" />
                                </div>
                            </div>
                        <?php endif; ?>
                        <br/>
                        <div class="col-md-12 about-right">
                            <p style="text-indent: 50px; text-align: justify; color: black; margin-top: 0px"><?php echo $t->text_text_site_2; ?></p>
                        </div>
                    <?php else: ?>
                        <div class="col-md-6 about-left">
                            <?php if ($t->text_text_site_1 != ''): ?>
                                <p style="text-indent: 20px; text-align: justify; padding-bottom: 10px"><?php echo $t->text_text_site_1; ?></p>
                            <?php endif; ?>
                            <ul style="padding-left: 80px; text-align: justify">
                                <?php foreach ($list as $l): ?>
                                    <?php if ($l->id_text_site == $t->id_text_site): ?>
                                        <li style="padding-bottom: 5px"><?php echo $l->item_list_site; ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                            </p>
                        </div>
                        <br/>
                        <?php if ($t->text_text_site_2 != ''): ?>
                            <div class="col-md-12 about-right">
                                <p style="text-indent: 50px; text-align: justify; color: black; margin-top: 0px"><?php echo $t->text_text_site_2; ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="col-md-12 about-right">
                    <h2 style="text-align: center">Oprema</h2>
                </div>
                <div class="horizontalTab" id="horizontalTab">
                    <ul class="resp-tabs-list list-group">
                        <?php foreach ($equipment as $e): ?>
                            <li class="list-group-item text-center"><?php echo $e->submenu_equipment; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php foreach ($equipment as $e): ?>
                        <div class="resp-tabs-container">
                            <!-- section -->
                            <div class="bhoechie-tab-content active">

                                <div class="services-grids">
                                    <div class="ser-img">
                                        <?php
                                        $arrayImg = array(
                                            'src' => "images/equipment/" . $e->pic_equipment,
                                            'alt' => $e->title_equipment,
                                            'title' => $e->title_equipment
                                        );

                                        echo img($arrayImg);
                                        ?>
                                    </div>
                                    <div class="ser-info">
                                        <h3><?php echo $e->title_equipment; ?></h3>
                                        <p style="text-indent: 30px; text-align: justify"><?php echo $e->text_equipment; ?></p>
                                        <a href="<?php echo $e->link_equipment; ?>" data-toggle="modal"><i class="fa fa-mail-forward" aria-hidden="true"></i> Više detalja</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<!-- //tabs -->    <!-- services -->