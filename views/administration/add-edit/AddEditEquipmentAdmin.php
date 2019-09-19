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
            <h2 style="text-indent: 20px; text-align: justify">Dodavanje opreme</h2>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/admin/EquipmentAdmin">Nazad</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php echo form_open_multipart('', $form_equipment); ?>
                        <table style="width: 50%;  padding: 10px; margin: 50px 50px; margin: 0px auto">
                            <tr>
                                <td style="padding: 10px">Pod meni: * </td>
                                <td style="padding: 10px"><?php echo form_input($form_submenu_equipment); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbSubmenuEquipmentCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Naslov: * </td>
                                <td style="padding: 10px"><?php echo form_textarea($form_title_equipment); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="taTitleEquipmentCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Tekst: * </td>
                                <td style="padding: 10px"><?php echo form_textarea($form_text_equipment); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="taTextEquipmentCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Link: * </td>
                                <td style="padding: 10px"><?php echo form_input($form_link_equipment); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbLinkEquipmentCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Slika: * </td>
                                <td style="padding: 10px"><?php echo form_upload($form_pic_equipment); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="fPicEquipmentCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px"></td>
                                <td style="padding: 10px"><?php echo form_submit($form_add_submit); ?></td>
                            </tr>
                        </table>
                        <?php echo form_close(); ?>
                    </div>
                </div> <!-- / .col-md-8 -->
            </div> <!--/ .row -->
        </div> <!-- end sidetab container -->
    </div>
</div>
</div>
<!-- //tabs -->    <!-- services -->