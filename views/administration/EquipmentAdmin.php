<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 11): ?>
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
                <?php if ($t->id_menu == 11): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista <?php echo $t->name_menu ?></h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <?php if (isset($count_equipment)): ?>
                <?php if ($count_equipment > 6): ?>
                    <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/admin/EquipmentAdmin/insert">Dodaj opremu</a></h3>
                    <br/>
                    <?php
                endif;
            endif;
            ?>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


            <div class="container">
                <div class="row">
                    <?php echo validation_errors('<div class="error">', '</div>'); ?>
                    <div class="col-md-4">
                        <!-- begin panel group -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php for ($i = 0; $i < count($equipment); $i++): ?>
                                <!-- panel 1 -->
                                <div class="panel panel-default">
                                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                                    <span class="side-tab" data-target="#tabOptics<?php echo $equipment[$i]->id_equipment ?>" data-toggle="tab" role="tab" aria-expanded="false">
                                        <div class="panel-heading" role="tab" id="heading<?php echo $equipment[$i]->id_equipment ?>"data-toggle="collapse" data-parent="#accordion" href="#optics<?php echo $equipment[$i]->id_equipment ?>" aria-expanded="false" aria-controls="optics<?php echo $equipment[$i]->id_equipment ?>">
                                            <h4 class="panel-title">Oprema <?php echo $i + 1; ?></h4>

                                        </div>
                                    </span>

                                    <div id="optics<?php echo $equipment[$i]->id_equipment ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $equipment[$i]->id_equipment ?>">
                                        <div class="panel-body">
                                            <!-- Tab content goes here -->
                                            <?php
                                            $form_equipment = array(
                                                'class' => 'form-group'
                                            );
                                            $form_submenu_equipment = array(
                                                'class' => 'size tbSubmenuEquipment',
                                                'name' => 'tbSubmenuEquipment',
                                                'value' => $equipment[$i]->submenu_equipment,
                                                'placeholder' => 'Pod naslov',
                                                'required' => true,
                                                'data-id' => $equipment[$i]->id_equipment
                                            );
                                            $form_title_equipment = array(
                                                'class' => 'size_textarea taTitleEquipment',
                                                'name' => 'taTitleEquipment',
                                                'value' => $equipment[$i]->title_equipment,
                                                'placeholder' => 'Naslov',
                                                'required' => true,
                                                'data-id' => $equipment[$i]->id_equipment
                                            );
                                            $form_text_equipment = array(
                                                'class' => 'size_textarea taTextEquipment',
                                                'name' => 'taTextEquipment',
                                                'value' => $equipment[$i]->text_equipment,
                                                'placeholder' => 'Tekst',
                                                'required' => true,
                                                'data-id' => $equipment[$i]->id_equipment
                                            );
                                            $form_link_equipment = array(
                                                'class' => 'size tbLinkEquipment',
                                                'name' => 'tbLinkEquipment',
                                                'value' => $equipment[$i]->link_equipment,
                                                'placeholder' => 'www.link.com',
                                                'required' => true,
                                                'data-id' => $equipment[$i]->id_equipment
                                            );
                                            $form_pic_equipment = array(
                                                'class' => 'size fPicEquipment',
                                                'name' => 'fPicEquipment',
                                                'data-id' => $equipment[$i]->id_equipment
                                            );
                                            $form_update_submit = array(
                                                'name' => 'btnEdit',
                                                'value' => 'Izmeni',
                                                'style' => 'width: 80px; margin-top:10px; font-weight: bold; padding: 7px; border-radius: 10px',
                                                'class' => 'btn-primary'
                                            );
                                            ?>
                                            <?php echo form_open_multipart(base_url() . "administration/admin/EquipmentAdmin/index/" . $equipment[$i]->id_equipment, $form_equipment); ?>
                                            <table>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="font-size: 0.8em">* Obavezna polja</span><a style="float: right" href="<?php echo base_url(); ?>/administration/admin/EquipmentAdmin/delete/<?php echo $equipment[$i]->id_equipment ?>">Obriši</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Pod meni: * </td>
                                                    <td><?php echo form_input($form_submenu_equipment); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="tbSubmenuEquipmentCss<?php echo $equipment[$i]->id_equipment ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Naslov: * </td>
                                                    <td><?php echo form_textarea($form_title_equipment); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="taTitleEquipmentCss<?php echo $equipment[$i]->id_equipment ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Tekst: * </td>
                                                    <td><?php echo form_textarea($form_text_equipment); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="taTextEquipmentCss<?php echo $equipment[$i]->id_equipment ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Link: * </td>
                                                    <td><?php echo form_input($form_link_equipment); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="tbLinkEquipmentCss<?php echo $equipment[$i]->id_equipment ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Slika: * </td>
                                                    <td><?php echo form_upload($form_pic_equipment); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="fPicEquipmentCss<?php echo $equipment[$i]->id_equipment ?>"></span></td>
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
                        <!-- begin macbook pro mockup -->
                        <div class="md-macbook-pro md-glare">
                            <div class="md-lid">
                                <div class="md-camera"></div>
                                <div class="md-screen">
                                    <!-- content goes here -->                
                                    <div class="tab-featured-image">
                                        <div class="tab-content">
                                            <?php for ($i = 0; $i < count($equipment); $i++): ?>
                                                <?php if (isset($equipment[$i]->pic_equipment)): ?>
                                                    <div class="tab-pane" id="tabOptics<?php echo $equipment[$i]->id_equipment ?>">
                                                        <img style="width: 150px" src="<?php echo base_url() ?>images/equipment/<?php echo $equipment[$i]->pic_equipment ?>" alt="<?php echo $equipment[$i]->title_equipment ?>" class="img img-responsive">
                                                    </div>
                                                <?php endif; ?>
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