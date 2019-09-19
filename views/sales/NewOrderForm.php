<script>
    $(document).ready(function () {
//autoload funkcija
        addForm();

        //autoload preracunavanje pd
        $distancePdPolje = $('#tbDistancePdForm');
        $distancePdValue = $('#tbDistancePdForm').val();
        $proximityPdPolje = $('#tbProximityPdForm');

        if ($distancePdPolje.val() != "") {
            $proximityPdPolje.val(Number($distancePdValue) - 2);
        }
    });
</script>
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
            <br/>
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
                <h2 style="text-indent: 20px; text-align: justify">Nova porudžbina: <?php echo $customer[0]->name_customer ?></h2>
            <?php else: ?>
                <h2 style="text-indent: 20px; text-align: justify">Nova porudžbina: </h2>
            <?php endif; ?>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/sales/NewOrder/index">Nazad</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php //echo @$message; ?>
                        <?php //echo $this->session->flashdata('message'); ?>
                        <?php //echo @$datum; echo @$dan;?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php if (!empty($customer)): ?>
                            <?php echo form_open('administration/sales/NewOrder/newOrder/' . $customer[0]->id_customer, $form_order); ?>
                        <?php else: ?>
                            <?php echo form_open('administration/sales/NewOrder/newOrder', $form_order); ?>
                        <?php endif; ?>

                        <!-- begin panel group -->
                        <div class="panel-group" style="margin-top: 50px; margin-bottom: 80px">
                            <input type="hidden" id="hdItHas" value="1" data-id="<?php echo base_url()?>administration/sales/NewOrder">
                            <?php if (!empty($customer)): ?>
                                <?php // echo form_open('administration/sales/NewOrder/confirmNewOrder/' . $customer[0]->id_customer, $form_order); ?>
                            <!--<input type="hidden" id="hdItHas" value="1" data-id="<?php // echo base_url()?>administration/sales/NewOrder">-->
                                <?php for ($i = 0; $i < count($customer); $i++): ?>
                                    <div style="float: right">Datum: <?php echo date('d. M. Y.', time()) ?></div>
                                    <br/><br/>
                                    <!-- panel 1 -->
                                    <div class="panel panel-default">
                                        <!--wrap panel heading in span to trigger image change as well as collapse -->
                                        <span>
                                            <div class="panel-heading">
                                                <h4>Klijent</h4>
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
                                                    <tr>
                                                        <?php foreach ($right_left as $rl): ?>
                                                            <?php
                                                            if ($rl->id_right_left == 3):
                                                                $data = array(
                                                                    'name' => 'chbRightLeft',
                                                                    'value' => $rl->id_right_left,
                                                                    'class' => 'chbRightLeft',
                                                                    'checked' => true
                                                                );
                                                            else:
                                                                $data = array(
                                                                    'name' => 'chbRightLeft',
                                                                    'value' => $rl->id_right_left,
                                                                    'class' => 'chbRightLeft'
                                                                );
                                                            endif;
                                                            ?>
                                                            <td colspan="2" class="text-alignC">
                                                                <?php
                                                                echo form_radio($data);
                                                                echo $rl->name_right_left;
                                                                ?>
                                                            </td>
                                                        <?php endforeach; ?>
                                                    </tr>
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
                                                    if (isset($chbDistanceProximity)):
                                                        if (isset($chbDistanceProximity1)):
                                                            $dataDistance = array(
                                                                'name' => 'chbDistanceProximity',
                                                                'value' => '1',
                                                                'class' => 'chbDistanceProximity',
                                                                'onload' => $chbDistanceProximity,
                                                                'checked' => $chbDistanceProximity1
                                                            );
                                                        else:
                                                            $dataDistance = array(
                                                                'name' => 'chbDistanceProximity',
                                                                'value' => '1',
                                                                'class' => 'chbDistanceProximity',
                                                                'onload' => $chbDistanceProximity
                                                            );
                                                        endif;
                                                        if (isset($chbDistanceProximity2)):
                                                            $dataProximity = array(
                                                                'name' => 'chbDistanceProximity',
                                                                'value' => '2',
                                                                'class' => 'chbDistanceProximity',
                                                                'onload' => $chbDistanceProximity,
                                                                'checked' => $chbDistanceProximity2
                                                            );
                                                        else:
                                                            $dataProximity = array(
                                                                'name' => 'chbDistanceProximity',
                                                                'value' => '2',
                                                                'class' => 'chbDistanceProximity',
                                                                'onload' => $chbDistanceProximity
                                                            );
                                                        endif;
                                                    else:
                                                        $dataDistance = array(
                                                            'name' => 'chbDistanceProximity',
                                                            'value' => '1',
                                                            'class' => 'chbDistanceProximity'
                                                        );
                                                        $dataProximity = array(
                                                            'name' => 'chbDistanceProximity',
                                                            'value' => '2',
                                                            'class' => 'chbDistanceProximity'
                                                        );
                                                    endif;
                                                    ?>
                                                    <td colspan="3" class="text-alignC" width="200px">
                                                        <?php
                                                        echo form_radio($dataDistance);
                                                        echo "<span id='rbDistance'>Daljina</span>";
                                                        ?>
                                                    </td>
                                                    <td colspan="3" class="text-alignC" width="200px">
                                                        <?php
                                                        echo form_radio($dataProximity);
                                                        echo "<span id='rbProximity'>Blizina</span>";
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan='6'>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: center; padding-bottom: 5px;" class="chbDistanceProximityCss"></span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="col-md-12" id="distanceProximity" >
                                                <br/>
                                                <p class="text-alignC"><b id="distanceProximityTitle"></b></p>
                                                <br/>
                                                <table style=' margin: 0px auto'>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Naziv okvir: </td>
                                                        <td class="text-alignC" style="padding: 10px"><?php echo form_input($frame_form);?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 10px;" class="tbFrameFormCss"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Cena okvira: </td>
                                                        <td class="text-alignC" style="padding: 10px"><?php echo form_input($frame_price_form);?> RSD</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 10px;" class="tbFramePriceFormCss"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Popust na okvir: </td>
                                                        <td class="text-alignC" style="padding: 10px"><?php echo form_input($frame_discount_form); ?>(%)</td>
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
                                                        <td class="text-alignC" style="padding: 10px"><?php echo $ddlMaterialLens ?></td>
<!--                                                        <td class="text-alignC" style="padding: 10px">
                                                            <select style = "width: 220px" name="ddlMaterialLens" id="ddlMaterialLens" disabled="true">
                                                                <option value="0">Izaberi...</option>
                                                            </select>
                                                        </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlMaterialLensCss"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Tip sočiva: </td>
                                                        <td class="text-alignC" style="padding: 10px"><?php echo $ddlTypeLens ?></td>
<!--                                                        <td class="text-alignC" style="padding: 10px">
                                                            <select style = "width: 220px" name="ddlTypeLens" id="ddlTypeLens" disabled="true">
                                                                <option value="0">Izaberi...</option>
                                                            </select>
                                                        </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlTypeLensCss"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Dizajn sočiva: </td>
                                                        <td class="text-alignC" style="padding: 10px"><?php echo $ddlDesignLens ?></td>
<!--                                                        <td class="text-alignC" style="padding: 10px">
                                                            <select style = "width: 220px" name="ddlDesignLens" id="ddlDesignLens" disabled="true">
                                                                <option value="0">Izaberi...</option>
                                                            </select>
                                                        </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlDesignLensCss"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Index sočiva: </td>
                                                        <td class="text-alignC" style="padding: 10px"><?php echo $ddlIndexLens ?></td>
<!--                                                        <td class="text-alignC" style="padding: 10px">
                                                            <select style = "width: 220px" name="ddlIndexLens" id="ddlIndexLens" disabled="true">
                                                                <option value="0">Izaberi...</option>
                                                            </select>
                                                        </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlIndexLensCss"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Naziv sočiva: </td>
                                                        <td class="text-alignC" style="padding: 10px"><?php echo $ddlNameLens ?></td>
<!--                                                        <td class="text-alignC" style="padding: 10px">
                                                            <select style = "width: 220px" name="ddlNameLens" id="ddlNameLens" disabled="true">
                                                                <option value="0">Izaberi...</option>
                                                            </select>
                                                        </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlNameLensCss"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Dorada sočiva: </td>
                                                        <td class="text-alignC" style="padding: 10px"><?php echo $ddlFinishingLens ?></td>
<!--                                                        <td class="text-alignC" style="padding: 10px">
                                                            <select style = "width: 220px" name="ddlFinishingLens" id="ddlFinishingLens" disabled="true">
                                                                <option value="0">Izaberi...</option>
                                                            </select>
                                                        </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlFinishingLensCss"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Opseg dioptrije: </td>
                                                        <td class="text-alignC" style="padding: 10px"><?php echo $ddlRangeDioptreLens ?></td>
<!--                                                        <td class="text-alignC" style="padding: 10px">
                                                            <select style = "width: 220px" name="ddlRangeDioptreLens" id="ddlRangeDioptreLens" disabled="true">
                                                                <option value="0">Izaberi...</option>
                                                            </select>
                                                        </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlRangeDioptreLensCss"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Prečnik sočiva: </td>
                                                        <td class="text-alignC" style="padding: 10px"><?php echo $ddlDiameterLens ?></td>
<!--                                                        <td class="text-alignC" style="padding: 10px">
                                                            <select style = "width: 220px" name="ddlDiameterLens" id="ddlDiameterLens" disabled="true">
                                                                <option value="0">Izaberi...</option>
                                                            </select>
                                                        </td>-->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlDiameterLensCss"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-alignR" style="padding: 10px">Cena sočiva: </td>
                                                        <td class="text-alignL" style="padding: 10px"><?php echo form_input($lensPrice); ?> RSD</td>
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
                                                        <td class="text-alignL" style="padding: 10px"><?php echo form_textarea($note_order_form);?></td>
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
                                <?php endfor; ?>
                            <?php else: ?>
                                <?php // echo form_open('administration/sales/NewOrder/confirmNewOrder', $form_order); ?>
                                <div style="float: right">Datum: <?php echo date('d. M. Y.', time()) ?></div>
                                <br/><br/>
                                <!-- panel 1 -->
                                <div class="panel panel-default">
                                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                                    <span>
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Klijent</h4>

                                        </div>
                                    </span>
                                    <div class="panel-body">
                                        <fieldset style="padding: 10px;margin: 20px">
                                            <table style=' margin: 0px auto'>
                                                <tr>
                                                    <td colspan='4' class="text-alignR"><b>Poručivanje lagera: &nbsp;</b></td>
                                                    <td colspan='11' class=""><?php echo form_checkbox($form_stock); ?></td>
                                                </tr>
                                                <tr style="height: 30px"></tr>
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
                                                <tr id="name">
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
                                                <tr id="year">
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
                                                <tr id="phone">
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
                                                <tr id="email">
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
                                            <table style=' margin: 0px auto'>
                                                <tr>
                                                    <?php foreach ($right_left as $rl): ?>
                                                        <?php
                                                        if ($rl->id_right_left == 3):
                                                            $data = array(
                                                                'name' => 'chbRightLeft',
                                                                'value' => $rl->id_right_left,
                                                                'class' => 'chbRightLeft',
                                                                'checked' => true
                                                            );
                                                        else:
                                                            $data = array(
                                                                'name' => 'chbRightLeft',
                                                                'value' => $rl->id_right_left,
                                                                'class' => 'chbRightLeft'
                                                            );
                                                        endif;
                                                        ?>
                                                        <td colspan="2" class="text-alignC">
                                                            <?php
                                                            echo form_radio($data);
                                                            echo $rl->name_right_left;
                                                            ?>
                                                        </td>
                                                    <?php endforeach; ?>
                                                </tr>
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
                                            <br>
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
                                        <table style=' margin: 0px auto' id="chbDistanceProximityTable">
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
                                                if (isset($chbDistanceProximity)):
                                                        if (isset($chbDistanceProximity1)):
                                                            $dataDistance = array(
                                                                'name' => 'chbDistanceProximity',
                                                                'value' => '1',
                                                                'class' => 'chbDistanceProximity',
                                                                'onload' => $chbDistanceProximity,
                                                                'checked' => $chbDistanceProximity1
                                                            );
                                                        else:
                                                            $dataDistance = array(
                                                                'name' => 'chbDistanceProximity',
                                                                'value' => '1',
                                                                'class' => 'chbDistanceProximity',
                                                                'onload' => $chbDistanceProximity
                                                            );
                                                        endif;
                                                        if (isset($chbDistanceProximity2)):
                                                            $dataProximity = array(
                                                                'name' => 'chbDistanceProximity',
                                                                'value' => '2',
                                                                'class' => 'chbDistanceProximity',
                                                                'onload' => $chbDistanceProximity,
                                                                'checked' => $chbDistanceProximity2
                                                            );
                                                        else:
                                                            $dataProximity = array(
                                                                'name' => 'chbDistanceProximity',
                                                                'value' => '2',
                                                                'class' => 'chbDistanceProximity',
                                                                'onload' => $chbDistanceProximity
                                                            );
                                                        endif;
                                                    else:
                                                        $dataDistance = array(
                                                            'name' => 'chbDistanceProximity',
                                                            'value' => '1',
                                                            'class' => 'chbDistanceProximity'
                                                        );
                                                        $dataProximity = array(
                                                            'name' => 'chbDistanceProximity',
                                                            'value' => '2',
                                                            'class' => 'chbDistanceProximity'
                                                        );
                                                    endif;
                                                ?>
                                                <td colspan="3" class="text-alignC" width="200px">
                                                    <?php
                                                    echo form_radio($dataDistance);
                                                    echo "<span id='rbDistance'>Daljina</span>";
                                                    ?>
                                                </td>
                                                <td colspan="3" class="text-alignC" width="200px">
                                                    <?php
                                                    echo form_radio($dataProximity);
                                                    echo "<span id='rbProximity'>Blizina</span>";
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan='6'>
                                                    <span style="color: orangered; font-size: 0.8em; display:none; text-align: center; padding-bottom: 5px;" class="chbDistanceProximityCss"></span>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="col-md-12" id="distanceProximity" >
                                            <br/>
                                            <p class="text-alignC"><b id="distanceProximityTitle"></b></p>
                                            <br/>
                                            <table style=' margin: 0px auto'>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Naziv okvir: </td>
                                                    <td class="text-alignC" style="padding: 10px"><?php echo form_input($frame_form);?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 10px;" class="tbFrameFormCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Cena okvira: </td>
                                                    <td class="text-alignC" style="padding: 10px"><?php echo form_input($frame_price_form);?> RSD</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 10px;" class="tbFramePriceFormCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Popust na okvir: </td>
                                                    <td class="text-alignC" style="padding: 10px"><?php echo form_input($frame_discount_form);?>(%)</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 10px;" class="tbFrameDiscountFormCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Proizvođač sočiva: </td>
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
                                                    <td class="text-alignC" style="padding: 10px"><?php echo $ddlMaterialLens ?></td>
<!--                                                    <td class="text-alignC" style="padding: 10px">
                                                        <select style = "width: 220px" name="ddlMaterialLens" id="ddlMaterialLens" disabled="true">
                                                            <option value="0">Izaberi...</option>
                                                        </select>
                                                    </td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlMaterialLensCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Tip sočiva: </td>
                                                    <td class="text-alignC" style="padding: 10px"><?php echo $ddlTypeLens ?></td>
<!--                                                    <td class="text-alignC" style="padding: 10px">
                                                        <select style = "width: 220px" name="ddlTypeLens" id="ddlTypeLens" disabled="true">
                                                            <option value="0">Izaberi...</option>
                                                        </select>
                                                    </td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlTypeLensCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Dizajn sočiva: </td>
                                                    <td class="text-alignC" style="padding: 10px"><?php echo $ddlDesignLens ?></td>
<!--                                                    <td class="text-alignC" style="padding: 10px">
                                                        <select style = "width: 220px" name="ddlDesignLens" id="ddlDesignLens" disabled="true">
                                                            <option value="0">Izaberi...</option>
                                                        </select>
                                                    </td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlDesignLensCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Index sočiva: </td>
                                                    <td class="text-alignC" style="padding: 10px"><?php echo $ddlIndexLens ?></td>
<!--                                                    <td class="text-alignC" style="padding: 10px">
                                                        <select style = "width: 220px" name="ddlIndexLens" id="ddlIndexLens" disabled="true">
                                                            <option value="0">Izaberi...</option>
                                                        </select>
                                                    </td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlIndexLensCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Naziv sočiva: </td>
                                                    <td class="text-alignC" style="padding: 10px"><?php echo $ddlNameLens ?></td>
<!--                                                    <td class="text-alignC" style="padding: 10px">
                                                        <select style = "width: 220px" name="ddlNameLens" id="ddlNameLens" disabled="true">
                                                            <option value="0">Izaberi...</option>
                                                        </select>
                                                    </td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlNameLensCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Dorada sočiva: </td>
                                                    <td class="text-alignC" style="padding: 10px"><?php echo $ddlFinishingLens ?></td>
<!--                                                    <td class="text-alignC" style="padding: 10px">
                                                        <select style = "width: 220px" name="ddlFinishingLens" id="ddlFinishingLens" disabled="true">
                                                            <option value="0">Izaberi...</option>
                                                        </select>
                                                    </td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlFinishingLensCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Opseg dioptrije: </td>
                                                    <td class="text-alignC" style="padding: 10px"><?php echo $ddlRangeDioptreLens ?></td>
<!--                                                    <td class="text-alignC" style="padding: 10px">
                                                        <select style = "width: 220px" name="ddlRangeDioptreLens" id="ddlRangeDioptreLens" disabled="true">
                                                            <option value="0">Izaberi...</option>
                                                        </select>
                                                    </td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlRangeDioptreLensCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Prečnik sočiva: </td>
                                                    <td class="text-alignC" style="padding: 10px"><?php echo $ddlDiameterLens ?></td>
<!--                                                    <td class="text-alignC" style="padding: 10px">
                                                        <select style = "width: 220px" name="ddlDiameterLens" id="ddlDiameterLens" disabled="true">
                                                            <option value="0">Izaberi...</option>
                                                        </select>
                                                    </td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <span style="color: orangered; font-size: 0.8em; display:none; text-align: left; padding-bottom: 5px; padding-left: 20px;" class="ddlDiameterLensCss"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-alignR" style="padding: 10px">Cena sočiva: </td>
                                                    <td class="text-alignL" style="padding: 10px"><?php echo form_input($lensPrice); ?> RSD</td>
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
                                                    <td class="text-alignL" style="padding: 10px"><?php echo form_textarea($note_order_form);?></td>
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
                                </div><!-- / panel 3 -->
                                <!-- panel 4-->
                                <div class="panel panel-default">
                                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                                    <span>
                                        <div class="panel-heading">
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
                                </div> <!-- / panel 4-->
                                <table style=' margin: 0px auto; margin-top: 5px'>
                                    <tr id="note">
                                        <td colspan='15'><?php echo form_submit($form_order_submit); ?></td>
                                    </tr>
                                    <tr style="height: 30px"></tr>
                                </table>
                                <?php // echo form_close(); ?>
                            <?php endif; ?>
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