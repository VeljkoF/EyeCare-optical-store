<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 23): ?>
                    <h3><?php echo $t->name_menu; ?> / Opseg dioptrije</h3>
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
            <h2 style="text-indent: 20px; text-align: justify">Dodavanje/Izmena opsega dioptrije</h2>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/sales/RangeDioptreLensSales">Nazad</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php echo form_open('', $form_range_dioptre_lens); ?>
                        <table style="width: 500px; margin: 0px auto; padding: 10px;">
                            <tr>
                                <td style="padding: 10px">Minimalni iznos sph: </td>
                                <td style="padding: 10px"><?php echo $ddlMinSphRangeDioptreLens; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlMinSphRangeDioptreLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Maximalni iznos sph: </td>
                                <td style="padding: 10px"><?php echo $ddlMaxSphRangeDioptreLens; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlMaxSphRangeDioptreLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px"></td>
                                <td style="padding: 10px">
                                    <a href='<?php echo base_url() ?>administration/sales/RangeDioptreLensSales/viewDioptre'>Dodaj iznos sph</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Iznos cyl: </td>
                                <td style="padding: 10px"><?php echo form_input($form_cyl_range_dioptre_lens); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbCylRangeLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Iznos adicije: </td>
                                <td style="padding: 10px"><?php echo form_input($form_add_range_dioptre_lens); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbAddRangeLensCss"></span></td>
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