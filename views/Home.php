<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <br/>
    <div class="message2">
        <?php
        if(isset($alert)):
            echo $alert;
        endif;
//        if (!empty($this->session->flashdata('message'))):
//            echo $this->session->flashdata('message');
//            $this->session->set_flashdata('message', '');
//        endif;
        ?>
    </div>
    <!-- banner -->


    <div id="home" class="w3ls-banner"> 
        <!-- header -->
        <div class="header-w3layouts"> 
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top"> 
                <div class="container">
                    <div class="navbar-header page-scroll">                         
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Medical_care</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1>
                            <a class="navbar-brand1" href="<?php echo base_url(); ?>"><?php echo $company[0]->name_company_1 ?></a>
                            <a class="navbar-brand2" href="<?php echo base_url(); ?>"><?php echo $company[0]->name_company_2 ?></a>
                        </h1>
                    </div> 
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right cl-effect-15">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
                            <?php if (@$id_role == null): ?>
                                <?php foreach ($menu as $m): ?>
                                    <?php if ($m->id_menu == "1"): ?>
                                        <li><a class="page-scroll scroll" href="#home"><?php echo $m->name_menu ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php foreach ($menu as $m): ?>
                                    <?php if ($m->id_menu == "2"): ?>
                                        <li><a class="page-scroll scroll" href="#optics"><?php echo $m->name_menu ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php foreach ($menu as $m): ?>
                                    <?php if ($m->id_menu == "3"): ?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ordinacija <span class="caret"></span></a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php foreach ($menu as $m): ?>
                                        <?php if ($m->id_menu == "4"): ?>
                                            <ul class="dropdown-menu">
                                                <li><a class="page-scroll scroll" href="#ordination"><?php echo $m->name_menu ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($menu as $m): ?>
                                            <?php if ($m->id_menu == "5"): ?>
                                                <li><a class="page-scroll scroll" href="#cabinet"><?php echo $m->name_menu ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <?php foreach ($menu as $m): ?>
                                    <?php if ($m->id_menu == "6"): ?>
                                        <li><a class="page-scroll scroll" href="#blog"><?php echo $m->name_menu ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php foreach ($menu as $m): ?>
                                    <?php if ($m->id_menu == "7"): ?>
                                        <li><a class="page-scroll scroll" href="#contact"><?php echo $m->name_menu ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>


                            <?php elseif ($id_role == 1): ?>
                                <?php foreach ($menu as $m): ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $m->name_menu ?><span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($submenu as $s): ?>
                                                <?php //foreach ($menu as $mm):?>
                                                <?php if ($s->parent == $m->id_menu): ?>
                                                    <li><a  href="<?php echo base_url() ?>administration/<?php echo $s->path_menu ?>"><?php echo $s->name_menu ?></a></li>
                                                <?php endif; ?>
                                                <?php //endforeach;?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            <?php elseif ($id_role == 2): ?>
                                <?php foreach ($menu as $m): ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $m->name_menu ?><span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($submenu as $s): ?>
                                                <?php //foreach ($menu as $mm):?>
                                                <?php if ($s->parent == $m->id_menu): ?>
                                                    <li><a  href="<?php echo base_url() ?>administration/<?php echo $s->path_menu ?>"><?php echo $s->name_menu ?></a></li>
                                                <?php endif; ?>
                                                <?php //endforeach;?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif ?>



                            <!--                  <?php foreach ($menu as $m): ?>
                                <?php if ($m->parent != $m->id_menu): ?>
                                                                                              <li class="dropdown"><a href="<?php echo base_url() ?>administration/admin/HomeAdmin/<?php echo $m->path_menu ?>"><?php echo $m->name_menu ?><span class="caret"></span></a>
                                <?php else: ?> 
                                                                                              <li class="dropdown"><a href="<?php echo base_url() ?>administration/admin/HomeAdmin<?php echo $m->path_menu ?>"><?php echo $m->name_menu ?><span class="caret"></span></a>
                                                                                                  <ul class="dropdown-menu">
                                                                                                      <li><a href="<?php echo base_url() ?>administration/admin/HomeAdmin/<?php echo $m->path_menu ?>"><?php echo $m->name_menu ?></a></li>
                                                                                                  </ul>
                                <?php endif ?>
                                                                      </li>
                            <?php endforeach; ?> -->


                            <?php if ($id_role == NULL): ?>
                                <li><a href="<?php echo base_url(); ?>Login/login" data-toggle="modal" data-target="#login-modal">Prijava</a></li>
                            <?php else: ?>
                                <li><a href="<?php echo base_url(); ?>Login/logout">Odjava</a></li>
                            <?php endif; ?>

                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>  
        </div>
        <!-- Login form -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>Prijava na vaš nalog</h1><br>
                    <form method="POST" action="<?php echo base_url() ?>Login/login">
                        <input type="text" name="tbUserName" id="tbUserName" placeholder="Korisničko ime" required="true">
                        <input type="password" name="tbPassword" id="tbPassword" placeholder="Lozinka" required="true">
                        <input type="submit" name="btnLogin" id="btnLogin" class="agile_class" value="Prijava">
                    </form>          
                    <!--                    <div class="login-help">
                                            <a href="#">Register</a> - <a href="#">Forgot Password</a>
                                        </div>-->
                </div>
            </div>
        </div>
        <!-- //header -->
        <!--banner-->
        <?php if ($id_role == NULL): ?>

            <!--Slider-->
            <div class="w3l_banner_info">
                <div class="col-md-5 banner-form-agileinfo">
                    <img src="<?php echo base_url(); ?>images/bla22.png" alt="" />
                </div>
                <div class="col-md-7 slider slajder">
                    <div class="callbacks_container">
                        <ul class="rslides" id="slider3">
                            <?php foreach ($slider as $s): ?>
                                <li>
                                    <div class="slider_banner_info">
                                        <img src="<?php echo base_url(); ?>images/slider/<?php echo $s->pic_slider ?>" alt="<?php echo $s->name_pic_slider ?>"/>
                                        <h2><?php echo $s->title_slider ?></h2>
                                        <p><?php echo $s->text_slider ?></p>
                                    </div>

                                </li>
                            <?php endforeach; ?>

                            <!--                            <li>
                                                            <div class="slider_banner_info">
                                                                <h4>Nothing cures health</h4>
                                                                <p>Never go to a doctor whose office plants have died.You know what they call the fellow who finishes last in his medical school graduating class? They call him 'Doctor. </p>
                                                            </div>
                                                                
                                                        </li>-->
                            <!--                            <li>
                                                            <div class="slider_banner_info">
                                                                <h4>We do best treatment</h4>
                                                                <p>Time is generally the best doctor.so well choose your best doctor before time lossesThe art of medicine consists in amusing the patient while nature cures the disease.</p>
                                                            </div>
                                                                
                                                        </li>-->
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!--//Slider-->

            </div>
            <!--//banner-->
        <?php endif; ?>

    </div>	
    <!-- //banner --> 
    <?php if (isset($order_list_check)): ?>
        <div style="padding: 30px 0px 30px 0px">
            <div class="container">
                <div class="w3ls-heading">
                    <h3>Poštovani <?php echo $order_list_check[0]->name_customer ?>,</h3>
                </div>
                <div class="col-md-12 text-alignC" style="padding: 10px 0px 10px 0px">
                    <p>Status vaše porudžbine br. <?php echo $order_list_check[0]->id_order_list ?> poručena <?php echo date('d. m. Y.', $order_list_check[0]->date_order_list) ?> je <b><?php echo $order_list_check[0]->name_order_status ?>.</b></p>
                    <p>Ukoliko imate neke nedoumice slobodno nas možete kontaktirati na naš broj telefona ili mail adresu.</p>
                    <p>S poštovanjem,</p><p>Vaša optika <?php echo $company[0]->name_company_1 . " " . $company[0]->name_company_2 ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>