<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 19): ?>
                    <?php if (!empty($customer)): ?>
                        <h3><?php echo $t->name_menu; ?> / Klijent: <?php echo $customer[0]->name_customer ?></h3>
                    <?php else: ?>
                        <h3><?php echo $t->name_menu; ?> / Klijent:</h3>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="message">
                <?php
                if (!empty($this->session->flashdata('message'))):
                    echo $this->session->flashdata('message');
                    $this->session->set_flashdata('message', '');
                endif;
                ?>
                <?php
                if (!empty($this->session->flashdata('message2'))):
                    echo $this->session->flashdata('message2');
                    $this->session->set_flashdata('message2', '');
                endif;
                ?>
            </div>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <?php if (!empty($customer)): ?>
                <h2 style="text-indent: 20px; text-align: justify">Pregled nove porudžbine: <?php echo $customer[0]->name_customer ?></h2>
            <?php else: ?>
                <h2 style="text-indent: 20px; text-align: justify">Pregled nove porudžbine: </h2>
            <?php endif; ?>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/sales/NewOrder/newOrder">Nazad</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php // echo @$message; ?>
                        <?php // echo $this->session->flashdata('message'); ?>
                        <?php //echo @$datum; echo @$dan;?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php if (isset($_SESSION['customer'])): ?>
                            <?php echo form_open('administration/sales/NewOrder/confirmNewOrder/' . $_SESSION['customer'], $form_order); ?>
                            <?php unset($_SESSION['customer']); ?>
                        <?php else: ?>
                            <?php echo form_open('administration/sales/NewOrder/confirmNewOrder', $form_order); ?>
                        <?php endif; ?>

                        <!-- begin panel group -->
                        <div class="panel-group" style="margin-top: 50px; margin-bottom: 80px">
                            <div style="float: right">Datum: <?php echo date('d. M. Y.', $_SESSION['date_order_list']) ?></div>
                            <br/><br/>
                            <!-- panel 1 -->
                            <div class="panel panel-default">
                                <!--wrap panel heading in span to trigger image change as well as collapse -->
                                <span>
                                    <div class="panel-heading" >
                                        <h4 class="panel-title">Klijent</h4>

                                    </div>
                                </span>
                                <div class="panel-body">
                                    <fieldset style="padding: 10px; margin: 20px">
                                        <table style=' margin: 0px auto'>
                                            <tr>
                                                <td colspan='4' class="text-alignR"><b>Broj reversa: &nbsp;</b></td>
                                                <td colspan='11' class=""><?php echo form_input($form_number_form); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan='4'></td>
                                                <td colspan='11'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 0px;" class="tbNumberFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr style="height: 30px"></tr>
                                            <tr>
                                                <td colspan='4' class="text-alignR"><b>Ime i prezime: &nbsp;</b></td>
                                                <td colspan='11' class=""><?php echo form_input($form_name_customer); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan='4'></td>
                                                <td colspan='11'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 0px;" class="tbNameCustomerCss"></span>
                                                </td>
                                            </tr>
                                            <tr style="height: 30px"></tr>
                                            <tr>
                                                <td colspan='4' class="text-alignR"><b>Godište: &nbsp;</b></td>
                                                <td colspan='11' class=""><?php echo form_input($form_year_customer); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan='4'></td>
                                                <td colspan='11'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 0px;" class="tbYearCustomerCss"></span>
                                                </td>
                                            </tr>
                                            <tr style="height: 30px"></tr>
                                            <tr>
                                                <td colspan='4' class="text-alignR"><b>Telefon: &nbsp;</b></td>
                                                <td colspan='11' class=""><?php echo form_input($form_phone_customer); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan='4'></td>
                                                <td colspan='11'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 0px;" class="tbPhoneCustomerCss"></span>
                                                </td>
                                            </tr>
                                            <tr style="height: 30px"></tr>
                                            <tr>
                                                <td colspan='4' class="text-alignR"><b>Email: &nbsp;</b></td>
                                                <td colspan='11' class=""><?php echo form_input($form_email_customer); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan='4'></td>
                                                <td colspan='11'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 0px;" class="tbEmailCustomerCss"></span>
                                                </td>
                                            </tr>
                                            <tr style="height: 30px"></tr>
                                            <tr id="note">
                                                <td colspan='4' class="text-alignR"><b>Napomena: &nbsp;</b></td>
                                                <td colspan='11'><?php echo form_textarea($form_note_customer); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan='4'></td>
                                                <td colspan='11'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 0px;" class="taNoteCustomerCss"></span>
                                                </td>
                                            </tr>
                                            <tr style="height: 30px"></tr>
                                        </table>
                                    </fieldset>
                                </div>
                            </div> 
                            <!-- / panel 1 -->
                            <!-- panel 2 -->
                            <div class="panel panel-default">
                                <!--wrap panel heading in span to trigger image change as well as collapse -->
                                <span>
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Dioptrija</h4>
                                    </div>
                                </span>
                                <div class="panel-body">
                                    <fieldset style="padding: 10px; margin: 20px">
                                        <table style=' margin: 0px auto; width: 300px'>
                                            <?php
                                            if (isset($_SESSION['chbRightLeft'])):
                                                if ($_SESSION['chbRightLeft'] == 1):
                                                    ?>
                                                    <tr>
                                                        <td colspan="6" class="text-alignC"><b><i>Desno</i></b></td>
                                                    </tr>
                                                    <?php
                                                elseif ($_SESSION['chbRightLeft'] == 2):
                                                    ?>
                                                    <tr>
                                                        <td colspan="6" class="text-alignC"><b><i>Levo</i></b></td>
                                                    </tr>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="6" class="text-alignC"><b><i>Oba</i></b></td>
                                                    </tr>
                                                <?php
                                                endif;
                                            endif;
                                            ?>
                                            <tr>
                                                <td colspan="6" class="text-alignC"><b><i>PD</i></b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-alignC">
                                                    <?php echo form_input($form_distance_pd_form); ?>
                                                </td>
                                                <td colspan="3" class="text-alignC">
                                                    <?php echo form_input($form_proximity_pd_form); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan='6'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: center; padding-bottom: 10px;" class="tbPdFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-alignC"><b><i>Desno</i></b></td>
                                                <td colspan="3" class="text-alignC"><b><i>Levo</i></b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-alignC ">
                                                    <table>
                                                        <tr>
                                                            <th class="text-alignC border-top border-left border-bottom">SPH</th>
                                                            <th class="text-alignC border-top border-left border-bottom">CYL</th>
                                                            <th class="text-alignC border-top border-left border-bottom">AX</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-alignC border-left border-bottom"><?php echo form_input($form_distance_od_sph_form) ?></td>
                                                            <td class="text-alignC border-left border-bottom"><?php echo form_input($form_distance_od_cyl_form) ?></td>
                                                            <td class="text-alignC border-left border-bottom"><?php echo form_input($form_distance_od_ax_form) ?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td colspan="3" class="text-alignC ">
                                                    <table>
                                                        <tr>
                                                            <th class="text-alignC border-top border-left border-bottom">SPH</th>
                                                            <th class="text-alignC border-top border-left border-bottom">CYL</th>
                                                            <th class="text-alignC border-top border-left border-bottom border-right">AX</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-alignC border-left border-bottom"><?php echo form_input($form_distance_os_sph_form) ?></td>
                                                            <td class="text-alignC border-left border-bottom"><?php echo form_input($form_distance_os_cyl_form) ?></td>
                                                            <td class="text-alignC border-left border-bottom border-right"><?php echo form_input($form_distance_os_ax_form) ?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding-top: 5px" colspan="3">ADD: &nbsp;</td>
                                                <td class="text-alignL" style="padding-top: 5px" colspan="3"><?php echo form_input($form_add_form) ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding-top: 5px" class="text-alignC ">
                                                    <table>
                                                        <tr>
                                                            <th class="text-alignC border-top border-left border-bottom">SPH</th>
                                                            <th class="text-alignC border-top border-left border-bottom">CYL</th>
                                                            <th class="text-alignC border-top border-left border-bottom">AX</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-alignC border-left border-bottom"><?php echo form_input($form_proximity_od_sph_form) ?></td>
                                                            <td class="text-alignC border-left border-bottom"><?php echo form_input($form_proximity_od_cyl_form) ?></td>
                                                            <td class="text-alignC border-left border-bottom"><?php echo form_input($form_proximity_od_ax_form) ?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td colspan="3" style="padding-top: 5px" class="text-alignC ">
                                                    <table>
                                                        <tr>
                                                            <th class="text-alignC border-top border-left border-bottom">SPH</th>
                                                            <th class="text-alignC border-top border-left border-bottom">CYL</th>
                                                            <th class="text-alignC border-top border-left border-bottom border-right">AX</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-alignC border-left border-bottom"><?php echo form_input($form_proximity_os_sph_form) ?></td>
                                                            <td class="text-alignC border-left border-bottom"><?php echo form_input($form_proximity_os_cyl_form) ?></td>
                                                            <td class="text-alignC border-left border-bottom border-right"><?php echo form_input($form_proximity_os_ax_form) ?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan='6'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px;" class="tbDistanceOdSphFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan='6'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px;" class="tbDistanceOdCylFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan='6'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px;" class="tbDistanceOdAxFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan='6'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px;" class="tbDistanceOsSphFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan='6'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px;" class="tbDistanceOsCylFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan='6'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px;" class="tbDistanceOsAxFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan='6'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px;" class="tbAddFormCss"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                </div>
                            </div> 
                            <!-- / panel 2 -->
                            <!-- panel 3 -->
                            <div class="panel panel-default">
                                <!--wrap panel heading in span to trigger image change as well as collapse -->
                                <span>
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Stakla</h4>
                                    </div>
                                </span>
                                <div class="panel-body">
                                    <table style=' margin: 0px auto'>
                                        <tr>
                                            <td colspan="2" width="200px"></td>
                                            <td colspan="2" class="text-alignC" width="200px"><b>Šta poručuješ?</b></td>
                                            <td colspan="2" width="200px"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" width="600px"><br></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            if (isset($_SESSION['chbDistanceProximity'])):
                                                if ($_SESSION['chbDistanceProximity'] == 1):
                                                    ?>
                                                    <td colspan="6" class="text-alignC" width="200px">
                                                        <span id='rbDistance'><b>Daljina</b></span>
                                                    </td>
                                                <?php elseif ($_SESSION['chbDistanceProximity'] == 2):
                                                    ?>
                                                    <td colspan="6" class="text-alignC" width="200px">
                                                        <span id='rbProximity'><b>Blizina</b></span>
                                                    </td>
                                                    <?php
                                                endif;
                                            endif;
                                            ?>
                                        </tr>
                                    </table>
                                    <div class="col-md-12">
                                        <br/>
                                        <p class="text-alignC"><b id="distanceProximityTitle"></b></p>
                                        <br/>
                                        <table style=' margin: 0px auto'>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Naziv okvir: </td>
                                                <td class="text-alignL" style="padding: 10px">
                                                    <?php
                                                    $frame = array(
                                                        'id' => 'tbFrameForm',
                                                        'name' => 'tbFrameForm',
                                                        'style' => 'width: 220px',
                                                        'value' => $_SESSION['frame_form'],
                                                        'disabled' => 'true'
                                                    );
                                                    echo form_input($frame);
                                                    ?> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 10px;" class="tbFrameFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Cena okvira: </td>
                                                <td class="text-alignL" style="padding: 10px">
                                                    <?php
                                                    $framePrice = array(
                                                        'id' => 'tbFramePriceForm',
                                                        'name' => 'tbFramePriceForm',
                                                        'style' => 'width: 100px',
                                                        'value' => $_SESSION['frame_price_form'],
                                                        'disabled' => 'true'
                                                    );
                                                    echo form_input($framePrice);
                                                    ?> RSD
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 10px;" class="tbFramePriceFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Popust na okvir: </td>
                                                <td class="text-alignL" style="padding: 10px">
                                                    <?php
                                                    $frameDiscount = array(
                                                        'id' => 'tbFrameDiscountForm',
                                                        'name' => 'tbFrameDiscountForm',
                                                        'style' => 'width: 100px',
                                                        'value' => $_SESSION['frame_discount_form'],
                                                        'disabled' => 'true'
                                                    );
                                                    echo form_input($frameDiscount);
                                                    ?> (%)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 10px;" class="tbFrameDiscountFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Proizvođač stakla: </td>
                                                <td class="text-alignC" style="padding: 10px"><?php echo $ddlProducerLens ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlProducerLensCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Materijal sočiva: </td>
                                                <td class="text-alignC" style="padding: 10px">
                                                    <?php echo $ddlMaterialLens ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlMaterialLensCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Tip sočiva: </td>
                                                <td class="text-alignC" style="padding: 10px">
                                                    <?php echo $ddlTypeLens ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlTypeLensCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Dizajn sočiva: </td>
                                                <td class="text-alignC" style="padding: 10px">
                                                    <?php echo $ddlDesignLens ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlDesignLensCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Index sočiva: </td>
                                                <td class="text-alignC" style="padding: 10px">
                                                    <?php echo $ddlIndexLens ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlIndexLensCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Naziv sočiva: </td>
                                                <td class="text-alignC" style="padding: 10px">
                                                    <?php echo $ddlNameLens ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlNameLensCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Dorada sočiva: </td>
                                                <td class="text-alignC" style="padding: 10px">
                                                    <?php echo $ddlFinishingLens ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlFinishingLensCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Opseg dioptrije: </td>
                                                <td class="text-alignC" style="padding: 10px">
                                                    <?php echo $ddlRangeDioptreLens ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlRangeDioptreLensCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Prečnik sočiva: </td>
                                                <td class="text-alignC" style="padding: 10px">
                                                    <?php echo $ddlDiameterLens ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlDiameterLensCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Cena sočiva: </td>
                                                <td class="text-alignL" style="padding: 10px"><?php
                                                    // echo $_SESSION['cena'];
                                                    echo form_input($lensPrice);
                                                    ?> RSD</td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Popust sočiva: </td>
                                                <td class="text-alignL" style="padding: 10px">
                                                    <?php
                                                    echo form_input($lensDiscount);
                                                    ?> (%)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 10px;" class="tbLensDiscountFormCss"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-alignR" style="padding: 10px">Napomena proizvođaču: </td>
                                                <td class="text-alignL" style="padding: 10px">
                                                    <?php
                                                    echo form_textarea($taNoteProducer);
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 10px;" class="taNoteProducerCss"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- / panel 3 -->
                            <!-- panel 4-->
                            <div class="panel panel-default">
                                <!--wrap panel heading in span to trigger image change as well as collapse -->
                                <span>
                                    <div class="panel-heading" >
                                        <h4 class="panel-title">Prodavac</h4>
                                    </div>
                                </span>
                                <div class="panel-body">
                                    <fieldset style="padding: 10px; margin: 20px">
                                        <table style=' margin: 0px auto; width: 300px'>
                                            <tr>
                                                <td style="padding: 5px" class="border-bottom border-top3 border-left3 border-right3  text-alignC"><b><i>Akontacija: </i></b></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 5px" class="border-right3 border-bottom3 border-left3 border-top text-alignC"><?php echo form_input($form_advance_payment_form); ?> RSD</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: center; padding-bottom: 5px; padding-left: 0px;" class="tbAdvancePaymentFormCss"></span>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <table style=' margin: 0px auto; width: 300px'>
                                            <tr>
                                                <td style="padding: 5px" class="border-bottom border-top3 border-left3 border-right3  text-alignC"><b><i>Prodavac: </i></b></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 5px" class="border-right3 border-bottom3 border-left3 border-top text-alignC"><?php echo $ddlSeller ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: center; padding-bottom: 5px; padding-left: 0px;" class="ddlSellerCss"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                </div>
                            </div> 
                            <!-- / panel 4-->
                            <table style=' margin: 0px auto; margin-top: 5px'>
                                <tr id="note">
                                    <td colspan='15'><?php echo form_submit($form_order_submit); ?></td>
                                </tr>
                                <tr style="height: 30px"></tr>
                            </table>
                        </div> <!-- / panel-group -->
                        <?php echo form_close(); ?>
                    </div> <!-- /col-md-12 -->
                </div> <!-- / .col-md-8 -->
            </div> <!--/ .row -->
        </div> <!-- end sidetab container -->
    </div>
</div>
</div>
<!-- //tabs -->    <!-- services -->