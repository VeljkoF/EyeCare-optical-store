<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="slider">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 9): ?>
                    <h3><?php echo $t->name_menu; ?></h3>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <?php
            if (!empty($this->session->flashdata('message'))):
                echo $this->session->flashdata('message');
                $this->session->set_flashdata('message', '');
            endif;
            ?>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 9): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista <?php echo $t->name_menu ?></h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/admin/SliderAdmin/insert">Dodaj slajder</a></h3>
            <br/>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <?php echo validation_errors('<div class="error">', '</div>'); ?>
                <div class="row">
                    <div class="col-md-4">
                        <!-- begin panel group -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php for ($i = 0; $i < count($slider); $i++): ?>
                                <!-- panel 1 -->
                                <div class="panel panel-default">
                                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                                    <span class="side-tab" data-target="#tabSlider<?php echo $slider[$i]->id_slider ?>" data-toggle="tab" role="tab" aria-expanded="false">
                                        <div class="panel-heading" role="tab" id="headingSlider<?php echo $slider[$i]->id_slider ?>"data-toggle="collapse" data-parent="#accordion" href="#slider<?php echo $slider[$i]->id_slider ?>" aria-expanded="false" aria-controls="slider<?php echo $slider[$i]->id_slider ?>">
                                            <h4 class="panel-title">Slider <?php echo $i + 1; ?></h4>
                                        </div>
                                    </span>
                                    <div id="slider<?php echo $slider[$i]->id_slider ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSlider<?php echo $slider[$i]->id_slider ?>">
                                        <div class="panel-body">
                                            <!-- Tab content goes here -->
                                            <?php
                                            $form_slider = array(
                                                'class' => 'form-group'
                                            );
                                            $form_title_slider = array(
                                                'class' => 'size tbTitleSlider',
                                                'name' => 'tbTitleSlider',
                                                'value' => $slider[$i]->title_slider,
                                                'placeholder' => 'Naslov',
                                                'data-id' => $slider[$i]->id_slider
                                            );
                                            $form_text_slider = array(
                                                'class' => 'size_textarea taTextSlider',
                                                'name' => 'taTextSlider',
                                                'value' => $slider[$i]->text_slider,
                                                'placeholder' => 'Tekst',
                                                'data-id' => $slider[$i]->id_slider
                                            );
                                            $form_name_pic_slider = array(
                                                'class' => 'size tbPicNameSlider',
                                                'name' => 'tbPicNameSlider',
                                                'value' => $slider[$i]->name_pic_slider,
                                                'placeholder' => 'Ime slike',
                                                'required' => true,
                                                'data-id' => $slider[$i]->id_slider
                                            );
                                            $form_pic_slider = array(
                                                'class' => 'size fPicSlider',
                                                'name' => 'fPicSlider',
                                                'data-id' => $slider[$i]->id_slider
                                            );
                                            $form_update_submit = array(
                                                'name' => 'btnEdit',
                                                'value' => 'Izmeni',
                                                'style' => 'width: 80px; margin-top:10px; font-weight: bold; padding: 7px; border-radius: 10px',
                                                'class' => 'btn-primary'
                                            );
                                            ?>
                                            <?php echo form_open_multipart(base_url() . "administration/admin/SliderAdmin/index/" . $slider[$i]->id_slider, $form_slider); ?>
                                            <table>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="font-size: 0.8em">* Obavezna polja</span><a style="float: right" href="<?php echo base_url(); ?>administration/admin/SliderAdmin/delete/<?php echo $slider[$i]->id_slider ?>">Obriši</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Naslov: </td>
                                                    <td><?php echo form_input($form_title_slider); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="tbTitleSliderCss<?php echo $slider[$i]->id_slider ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Tekst: </td>
                                                    <td><?php echo form_textarea($form_text_slider); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="taTextSliderCss<?php echo $slider[$i]->id_slider ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ime slike: * </td>
                                                    <td><?php echo form_input($form_name_pic_slider); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="tbPicNameSliderCss<?php echo $slider[$i]->id_slider ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Slika: * </td>
                                                    <td><?php echo form_upload($form_pic_slider); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="fPicSliderCss<?php echo $slider[$i]->id_slider ?>"></span></td>
                                                </tr>
                                                <tr style="padding-top: 10px">
                                                    <td></td>
                                                    <td><?php echo form_submit($form_update_submit); ?></td>
                                                </tr>
                                            </table>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div> 
                                <!-- / panel 1 -->
                            <?php endfor; ?>
                        </div> <!-- / panel-group -->
                    </div> <!-- /col-md-4 -->
                    <div class="col-md-8">
                        <?php //echo validation_errors('<div class="error">', '</div>'); ?>
                        <!-- begin macbook pro mockup -->
                        <div class="md-macbook-pro md-glare">
                            <div class="md-lid">
                                <div class="md-camera"></div>
                                <div class="md-screen">
                                    <!-- content goes here -->                
                                    <div class="tab-featured-image">
                                        <div class="tab-content">
                                            <?php for ($i = 0; $i < count($slider); $i++): ?>
                                                <div class="tab-pane" id="tabSlider<?php echo $slider[$i]->id_slider ?>">
                                                    <img src="<?php echo base_url() ?>images/slider/<?php echo $slider[$i]->pic_slider ?>" alt="<?php echo $slider[$i]->name_pic_slider ?>" class="img img-responsive">
                                                </div>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md-base"></div>
                        </div> <!-- end macbook pro mockup -->
                    </div> <!-- / .col-md-8 -->
                </div> <!--/ .row -->
            </div> <!-- end sidetab container -->
        </div>
    </div>
</div>
<!-- //tabs -->    <!-- services -->