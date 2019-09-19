<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 14): ?>
                    <h3><?php echo $t->name_menu; ?></h3>
                <?php endif; ?>
            <?php endforeach; ?>

            <br/>
            <?php
            if (!empty($this->session->flashdata('message'))):
                echo $this->session->flashdata('message');
                $this->session->flashdata('message', '');
            endif;
            ?>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 14): ?>
                    <h2 style="text-indent: 20px; text-align: justify"><?php echo $t->name_menu ?></h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12" >
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php echo form_open_multipart('', $form_company_information); ?>
                        <table style="width: 50%;  padding: 10px; margin-top: 50px 50px; margin: 0px auto">
                            <tr>
                                <td style="padding: 10px">Ime preduzeća 1: </td>
                                <td style="padding: 10px"><?php echo form_input($form_name_company_1); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbNameCompany1Css"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Ime preduzeća 2: </td>
                                <td style="padding: 10px"><?php echo form_input($form_name_company_2); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbNameCompany2Css"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Adresa preduzeća: </td>
                                <td style="padding: 10px"><?php echo form_input($form_address_company); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbAddressCompanyCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Grad preduzeća: </td>
                                <td style="padding: 10px"><?php echo form_input($form_city_company); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbCityCompanyCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Telefon preduzeća: </td>
                                <td style="padding: 10px"><?php echo form_input($form_phone_company); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbPhoneCompanyCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Mail preduzeća: </td>
                                <td style="padding: 10px"><?php echo form_input($form_mail_company); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbMailCompanyCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Radni dani preduzeća: </td>
                                <td style="padding: 10px"><?php echo form_input($form_working_days_company); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbWorkingDaysCompanyCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Radno vreme preduzeća: </td>
                                <td style="padding: 10px"><?php echo form_input($form_working_time_company); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbWorkingTimeCompanyCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px"></td>
                                <td style="padding: 10px"><?php echo form_submit($form_update_company_information); ?></td>
                            </tr>
                        </table>
                        <?php echo form_close(); ?>
                    </div>
                </div> <!-- /col-md-4 -->
            </div> <!--/ .row -->
        </div> <!-- end sidetab container -->
    </div>
</div>
</div>
<!-- //tabs -->    <!-- services -->