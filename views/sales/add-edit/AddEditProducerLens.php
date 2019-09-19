<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 23): ?>
                    <h3><?php echo $t->name_menu; ?> / Proizvodjač sočiva</h3>
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
            <h2 style="text-indent: 20px; text-align: justify">Dodavanje/Izmena naziva proizvodjač sočiva</h2>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/sales/ProducerLensSales">Nazad</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php echo form_open('', $form_producer_lens); ?>
                        <table style="width: 500px; margin: 0px auto; padding: 10px;">
                            <tr>
                                <td style="padding: 10px 0px">Ime proizvođača: </td>
                                <td style="padding: 10px 0px"><?php echo form_input($form_name_producer_lens); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; padding-bottom:  10px;" class="tbNameProducerLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 0px">Adresa proizvođača: </td>
                                <td style="padding: 10px 0px"><?php echo form_input($form_address_producer_lens); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; padding-bottom: 10px;" class="tbAddressProducerLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 0px">Grad proizvođača: </td>
                                <td style="padding: 10px 0px"><?php echo form_input($form_city_producer_lens); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; padding-bottom: 10px;" class="tbCityProducerLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 0px">Država proizvođača: </td>
                                <td style="padding: 10px 0px"><?php echo form_input($form_state_producer_lens); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; padding-bottom: 10px;" class="tbStateProducerLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 0px">Broj telefona proizvođača: </td>
                                <td style="padding: 10px 0px"><?php echo form_input($form_phone_producer_lens); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; padding-bottom: 10px;" class="tbPhoneProducerLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 0px">Email proizvođača: </td>
                                <td style="padding: 10px 0px"><?php echo form_input($form_email_producer_lens); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; padding-bottom: 10px;" class="tbEmailProducerLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 0px"></td>
                                <td style="padding: 10px 0px"><?php echo form_submit($form_add_submit); ?></td>
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