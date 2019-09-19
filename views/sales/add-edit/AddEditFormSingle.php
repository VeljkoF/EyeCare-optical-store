<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 21): ?>
                    <h3><?php echo $t->name_menu; ?> / Karton: <?php echo $customer[0]->name_customer ?></h3>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <h2 style="text-indent: 20px; text-align: justify">Dodavanje/Izmena kartona <?php echo $customer[0]->name_customer ?></h2>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/sales/FormCustomer/index/<?php echo $customer[0]->id_customer ?>">Nazad</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo @$message; ?>
                        <?php //echo @$datum; echo @$dan;?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <fieldset style="padding: 10px; width: 900px; border: 2px solid; margin: 20px">
                            <table width="800px" style=' margin: 0px auto'>
                                <tr>
                                    <td colspan="1" class="border text-alignR" width="100px"><b>Broj reversa: &nbsp;</b></td>
                                    <td colspan='1' class="border" width="100px">&nbsp; <?php echo form_input($form_number_form); ?></td>
                                    <td colspan='6' width="400px"></td>
                                    <td colspan='1' class="border text-alignR" width="100px"><b>Datum: &nbsp;</b></td>
                                    <td colspan='1' class="border" width="100px">&nbsp; <?php echo form_input($form_date_form); ?></td>
                                </tr>
                                <tr>
                                    <td colspan='1' class="border text-alignR" width="100px"><b>Radnja: &nbsp;</b></td>
                                    <td colspan='1' class="border" width="100px">&nbsp; <?php echo $ddlStores ?></td>
                                    <td colspan='6' width="400px"></td>
                                    <td colspan='1' class="border text-alignR" width="100px"><b>Godište: &nbsp;</b></td>
                                    <td colspan='1' class="border" width="100px">&nbsp; <?php echo $customer[0]->year_customer ?></td>
                                </tr>
                                <tr style="height: 30px"></tr>
                                <tr>
                                    <td colspan='2' class="text-alignR" width="200px"><b>Ime i prezime: &nbsp;</b></td>
                                    <td colspan='6' class="" width="200px">&nbsp; <?php echo $customer[0]->name_customer ?></td>
                                    <td colspan='2' width="400px"></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr>
                                    <td colspan='2' class="text-alignR" width="200px"><b>Telefon: &nbsp;</b></td>
                                    <td colspan='6' class="" width="200px">&nbsp; <?php echo $customer[0]->phone_customer ?></td>
                                    <td colspan='2' width="400px"></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr>
                                    <td colspan='2' class="text-alignR" width="200px"><b>Email: &nbsp;</b></td>
                                    <td colspan='6' class="" width="200px">&nbsp; <?php echo $customer[0]->email_customer ?></td>
                                    <td colspan='2' width="400px"></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr>
                                    <td colspan='2' class="text-alignR" width="200px"><b>Napomena reversa: &nbsp;</b></td>
                                    <td colspan='6' class="" width="200px">
                                        &nbsp; 
                                        <?php if (isset($form)): ?>    
                                            <?php echo $form[0]->note_form ?>
                                        <?php endif; ?>                                        
                                    </td>
                                    <td colspan='2' width="400px"></td>
                                </tr>
                            </table>
                            <table width="850px" style=' margin: 0px auto'>
                                <tr style="height: 30px"></tr>
                                <tr class="text-alignC">

                                    <?php
                                    if (isset($form)):
                                        foreach ($distance_proximity as $rl):
                                            if ($rl->id_distance_proximity == 1):
                                                $distanceRadioId = $rl->id_distance_proximity;
                                                $distanceRadioName = $rl->name_distance_proximity;
                                                if ($distanceRadioId == $form[0]->id_distance_proximity):
                                                    $distanceRadio = array(
                                                        'name' => 'rbDistanceProximityRadio',
                                                        'value' => $distanceRadioId,
                                                        'checked' => true,
                                                        'disabled' => true
                                                    );
                                                else:
                                                    $distanceRadio = array(
                                                        'name' => 'rbDistanceProximityRadio',
                                                        'value' => $distanceRadioId,
                                                        'disabled' => true
                                                    );
                                                endif;
                                            elseif ($rl->id_distance_proximity == 2):
                                                $proximityRadioId = $rl->id_distance_proximity;
                                                $proximityRadioName = $rl->name_distance_proximity;
                                                if ($proximityRadioId == $form[0]->id_distance_proximity):
                                                    $proximityRadio = array(
                                                        'name' => 'rbDistanceProximityRadio',
                                                        'value' => $proximityRadioId,
                                                        'checked' => true,
                                                        'disabled' => true
                                                    );
                                                else:
                                                    $proximityRadio = array(
                                                        'name' => 'rbDistanceProximityRadio',
                                                        'value' => $proximityRadioId,
                                                        'disabled' => true
                                                    );
                                                endif;
                                            else:
                                                $distanceProximityRadioId = $rl->id_distance_proximity;
                                                $distanceProximityRadioName = $rl->name_distance_proximity;
                                                if ($distanceProximityRadioId == $form[0]->id_distance_proximity):
                                                    $distanceProximityRadio = array(
                                                        'name' => 'rbDistanceProximityRadio',
                                                        'value' => $distanceProximityRadioId,
                                                        'checked' => true,
                                                        'disabled' => true
                                                    );
                                                else:
                                                    $distanceProximityRadio = array(
                                                        'name' => 'rbDistanceProximityRadio',
                                                        'value' => $distanceProximityRadioId,
                                                        'disabled' => true
                                                    );
                                                endif;
                                            endif;
                                        endforeach;
                                    else:
                                        foreach ($distance_proximity as $rl):
                                            if ($rl->id_distance_proximity == 1):
                                                $distanceRadioId = $rl->id_distance_proximity;
                                                $distanceRadioName = $rl->name_distance_proximity;
                                                $distanceRadio = array(
                                                    'name' => 'rbDistanceProximityRadio',
                                                    'value' => $distanceRadioId,
                                                    'required' => true
                                                );
                                            elseif ($rl->id_distance_proximity == 2):
                                                $proximityRadioId = $rl->id_distance_proximity;
                                                $proximityRadioName = $rl->name_distance_proximity;
                                                $proximityRadio = array(
                                                    'name' => 'rbDistanceProximityRadio',
                                                    'value' => $proximityRadioId,
                                                    'required' => true
                                                );
                                            else:
                                                $distanceProximityRadioId = $rl->id_distance_proximity;
                                                $distanceProximityRadioName = $rl->name_distance_proximity;
                                                $distanceProximityRadio = array(
                                                    'name' => 'rbDistanceProximityRadio',
                                                    'value' => $distanceProximityRadioId,
                                                    'required' => true
                                                );
                                            endif;
                                        endforeach;
                                    endif;
                                    ?>

                                    <td colspan='2' width="200px"></td>
                                    <td colspan='2' width="200px"><?php echo form_radio($distanceRadio) ?>&nbsp;<?php echo $distanceRadioName ?></td>
                                    <td colspan='1' width="50px"><?php echo form_radio($distanceProximityRadio) ?>&nbsp;<?php echo $distanceProximityRadioName ?></td>
                                    <td colspan='2' width="200px"><?php echo form_radio($proximityRadio) ?>&nbsp;<?php echo $proximityRadioName ?></td>
                                    <td colspan='2' width="200px"></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='4' class="border text-alignC" width="400px"><i><b>DALJINA</b></i></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='4' class="border text-alignC" width="400px"><i><b>BLIZINA</b></i></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr>
                                    <td colspan='1' width="100px" class="border text-alignR"><b>PD: &nbsp;</b></td>
                                    <td colspan='3' class="border" width="300px">&nbsp; <?php echo form_input($form_distance_pd_form); ?></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='1' width="100px" class="border text-alignR"><b>PD: &nbsp;</b></td>
                                    <td colspan='3' class="border" width="300px">&nbsp; <?php echo form_input($form_proximity_pd_form); ?></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr>
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='1' class="border-right text-alignC" width="100px"><b>SPH</b></td>
                                    <td colspan='1' class="border-right text-alignC" width="100px"><b>CYL</b></td>
                                    <td colspan='1' class="text-alignC" width="100px"><b>AX&#176;</b></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan="1" width="100px"></td>
                                    <td colspan='1' class="border-right text-alignC" width="100px"><b>SPH</b></td>
                                    <td colspan='1' class="border-right text-alignC" width="100px"><b>CYL</b></td>
                                    <td colspan='1' class="text-alignC" width="100px"><b>AX&#176;</b></td>
                                </tr>
                                <tr>
                                    <td colspan='1' class="border-right text-alignR" width="100px"><b>OD. &nbsp;</b></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_distance_od_sph_form); ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_distance_od_cyl_form); ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_distance_od_ax_form); ?>&#176;</td>
                                    <td colspan='1' class="text-alignC" width="50px"> &nbsp; <b>ADD</b> &nbsp; </td>
                                    <td colspan='1' class="border-right text-alignR" width="100px"><b>OD. &nbsp;</b></td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php echo form_input($form_proximity_od_sph_form); ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php echo form_input($form_proximity_od_cyl_form); ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php echo form_input($form_proximity_od_ax_form); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='1' class="border-right text-alignR" width="100px"><b>OS. &nbsp;</b></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_distance_os_sph_form); ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_distance_os_cyl_form); ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_distance_os_ax_form); ?>&#176;</td>
                                    <td colspan='1' class="text-alignC" width="50px">&nbsp; 
                                        <b>
                                            <?php echo form_input($form_add_form); ?>
                                        </b> &nbsp;
                                    </td>
                                    <td colspan='1' class="border-right text-alignR" width="100px"><b>OS. &nbsp;</b></td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php echo form_input($form_proximity_os_sph_form); ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php echo form_input($form_proximity_os_cyl_form); ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php echo form_input($form_proximity_os_ax_form); ?>
                                    </td>
                                </tr>
                                <tr style="height: 30px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='1' width="100px"><b>OKVIR: </b></td>
                                    <td colspan='1' width="100px"><b>CENA: </b></td>
                                    <td colspan='1' width="100px"><b>(%): </b></td>
                                    <td colspan='1' width="100px"><b>CENA SA POPUSTOM: </b></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='1' width="100px"><b>OKVIR: </b></td>
                                    <td colspan='1' width="100px"><b>CENA: </b></td>
                                    <td colspan='1' width="100px"><b>(%): </b></td>
                                    <td colspan='1' width="100px"><b>CENA SA POPUSTOM: </b></td>
                                </tr>
                                <tr>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_distance_frame_form); ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_distance_frame_price_form); ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_distance_frame_discount_form); ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px" id="tbDiscountFrameDistance">
                                        <?php
                                        //$discountFrameDistance = $form[0]->distance_frame_price_form - ($form[0]->distance_frame_price_form / 100) * $form[0]->distance_frame_discount_form;
                                        //echo $discountFrameDistance;
                                        ?>
                                    </td>
                                    <td colspan="1" width="50px"></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_proximity_frame_form); ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_proximity_frame_price_form); ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo form_input($form_proximity_frame_discount_form); ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px" id="tbDiscountFrameProximity">
                                        <?php
                                        //$discountFrameProximity = $form[0]->proximity_frame_price_form - ($form[0]->proximity_frame_price_form / 100) * $form[0]->proximity_frame_discount_form;
                                        //echo $discountFrameProximity;
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <table width="850px" style=' margin: 0px auto'>
                                <tr style="height: 20px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='4' width="400px"><b>STAKLA: </b></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='4' width="400px"><b>STAKLA: </b></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr>
                                    <td colspan='2' class="border-top border-left text-alignR" width="200px"><b>Porizvođač:&nbsp;</b></td>
                                    <td colspan='2' class="border-top  border-right text-alignL" width="200px">
                                        <?php if (isset($form)): ?>
                                            <?php if ($form[0]->distance_lens_producer_form != null): ?>
                                                <?php echo $form[0]->distance_lens_producer_form ?>
                                            <?php else: ?>
                                                <?php echo $ddlProducerDistanceLens ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='2' class="border-top border-left  text-alignR" width="200px"><b>Porizvođač:&nbsp;</b></td>
                                    <td colspan='2' class="border-top  border-right text-alignL" width="200px">
                                        <?php if (isset($form)): ?>
                                            <?php if ($form[0]->proximity_lens_producer_form != null): ?>
                                                <?php echo $form[0]->proximity_lens_producer_form ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo $ddlProducerProximityLens ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="4"></td>
                                    <td colspan="1"></td>
                                    <td class="border-left border-right" colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan='2' class="border-left text-alignR" width="200px"><b>Materijal:&nbsp;</b></td>
                                    <td colspan='2' class="border-right text-alignL" width="200px">
                                        <?php if (isset($form)): ?>
                                            <?php echo $form[0]->distance_lens_material_form ?>
                                        <?php endif; ?>
                                    </td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='2' class="border-left  text-alignR" width="200px"><b>Materijal:&nbsp;</b></td>
                                    <td colspan='2' class="border-right text-alignL" width="200px">
                                        <?php if (isset($form)): ?>
                                            <?php echo $form[0]->proximity_lens_material_form ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="4"></td>
                                    <td colspan="1"></td>
                                    <td class="border-left border-right" colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan='2' class="border-left text-alignR" width="200px"><b>Tip:&nbsp;</b></td>
                                    <td colspan='2' class="border-right text-alignL" width="200px"><?php echo $form[0]->distance_lens_type_form ?></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='2' class="border-left text-alignR" width="200px"><b>Tip:&nbsp;</b></td>
                                    <td colspan='2' class="border-right text-alignL" width="200px"><?php echo $form[0]->proximity_lens_type_form ?></td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="4"></td>
                                    <td colspan="1"></td>
                                    <td class="border-left border-right" colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan='2' class="border-left text-alignR" width="200px"><b>Dizajn:&nbsp;</b></td>
                                    <td colspan='2' class="border-right text-alignL" width="200px"><?php echo $form[0]->distance_lens_designe_form ?></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='2' class="border-left text-alignR" width="200px"><b>Dizajn:&nbsp;</b></td>
                                    <td colspan='2' class="border-right text-alignL" width="200px"><?php echo $form[0]->proximity_lens_designe_form ?></td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="4"></td>
                                    <td colspan="1"></td>
                                    <td class="border-left border-right" colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan='2' class="border-left text-alignR" width="200px"><b>Index:&nbsp;</b></td>
                                    <td colspan='2' class="border-right text-alignL" width="200px"><?php echo $form[0]->distance_lens_index_form ?></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='2' class="border-left text-alignR" width="200px"><b>Index:&nbsp;</b></td>
                                    <td colspan='2' class="border-right text-alignL" width="200px"><?php echo $form[0]->proximity_lens_index_form ?></td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="4"></td>
                                    <td colspan="1"></td>
                                    <td class="border-left border-right" colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan='2' class="border-left text-alignR" width="200px"><b>Naziv:&nbsp;</b></td>
                                    <td colspan='2' class="border-right text-alignL" width="200px"><?php echo $form[0]->distance_lens_name_form ?></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='2' class="border-left text-alignR" width="200px"><b>Naziv:&nbsp;</b></td>
                                    <td colspan='2' class="border-right text-alignL" width="200px"><?php echo $form[0]->proximity_lens_name_form ?></td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="4"></td>
                                    <td colspan="1"></td>
                                    <td class="border-left border-right" colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan='2' class="border-left border-bottom text-alignR" width="200px"><b>Dorada:&nbsp;</b></td>
                                    <td colspan='2' class="border-right border-bottom text-alignL" width="200px"><?php echo $form[0]->distance_lens_finishing_form ?></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='2' class="border-left border-bottom text-alignR" width="200px"><b>Dorada:&nbsp;</b></td>
                                    <td colspan='2' class="border-right border-bottom text-alignL" width="200px"><?php echo $form[0]->proximity_lens_finishing_form ?></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='4' width="400px"><b>CENA: </b></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='4' width="400px"><b>CENA: </b></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='1' width="100px"><b>(%): </b></td>
                                    <td colspan='2' width="200px"><b>CENA SA POPUSTOM: </b></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='1' width="100px"><b>(%): </b></td>
                                    <td colspan='2' width="200px"><b>CENA SA POPUSTOM: </b></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='1' class="border text-alignC" width="100px" id="tbDistanceLensPriceForm">
                                        <?php if ($form[0]->distance_lens_price_form != null): ?>
                                            <?php $distance_lens_price_form = round(($form[0]->distance_lens_price_form * 2) * $form[0]->amount_exchange, -2) ?>
                                            <?php echo number_format($distance_lens_price_form, 2, ',', '.') ?>
                                        <?php endif; ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px" id="tbDistanceLensDiscountForm">
                                        <?php if ($form[0]->distance_lens_discount_form != null): ?>
                                            <?php echo $form[0]->distance_lens_discount_form ?>
                                        <?php endif; ?>
                                    </td>
                                    <td colspan='2' class="border text-alignC" width="200px" id="tbDiscountLensDistance">
                                        <!--<?php // if ($form[0]->distance_lens_price_form != null):       ?>
                                        <?php
                                        // $discountLensDistance = round(($form[0]->distance_lens_price_form * 2) * $form[0]->amount_exchange, -2) - ((round(($form[0]->distance_lens_price_form * 2) * $form[0]->amount_exchange, -2) / 100) * $form[0]->distance_lens_discount_form);
                                        //echo number_format($discountLensDistance, 2, ',', '.');
                                        ?>
                                        <?php // endif; ?> -->
                                    </td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='1' class="border text-alignC" width="100px" id="tbProximityLensPriceForm">
                                        <?php if ($form[0]->proximity_lens_price_form != null): ?>
                                            <?php $proximity_lens_price_form = round(($form[0]->proximity_lens_price_form * 2) * $form[0]->amount_exchange, -2) ?>
                                            <?php echo number_format($proximity_lens_price_form, 2, ',', '.') ?>
                                        <?php endif; ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px" id="tbProximityLensDiscountForm">
                                        <?php if ($form[0]->proximity_lens_discount_form != null): ?>
                                            <?php echo $form[0]->proximity_lens_discount_form ?>
                                        <?php endif; ?>
                                    </td>
                                    <td colspan='2' class="border text-alignC" width="200px" id="tbDiscountLensProximity">
                                        <?php //if ($form[0]->proximity_lens_price_form != null): ?>
                                        <?php
                                        //$discountLensProximity = round(($form[0]->proximity_lens_price_form * 2) * $form[0]->amount_exchange, -2) - ((round(($form[0]->proximity_lens_price_form * 2) * $form[0]->amount_exchange, -2) / 100) * $form[0]->proximity_lens_discount_form);
                                        //echo number_format($discountLensProximity, 2, ',', '.');
                                        ?>
                                        <?php //endif; ?>
                                    </td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='1' width="100px"><b>UKUPNO: &nbsp;</b></td>
                                    <td colspan='1' width="100px" id="tbPriceDistance">
                                        <?php //if (isset($discountLensDistance)): ?>
                                        <?php
                                        //$priceDistance = $form[0]->distance_frame_price_form + $distance_lens_price_form;
                                        //echo number_format($priceDistance, 2, ',', '.');
                                        ?>
                                        <?php //endif; ?>
                                    </td>
                                    <td colspan='1' width="100px"><b>SA (%)</b></td>
                                    <td colspan='1' width="100px" id="tbDiscountDistance">
                                        <?php //if (isset($discountLensDistance)): ?>
                                        <?php
                                        //$discountDistance = $discountFrameDistance + $discountLensDistance;
                                        //echo number_format($discountDistance, 2, ',', '.');
                                        ?>
                                        <?php //endif; ?>
                                    </td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='1' width="100px"><b>UKUPNO: &nbsp;</b></td>
                                    <td colspan='1' width="100px" id="tbPriceProximity">
                                        <?php //if (isset($proximity_lens_price_form)): ?>
                                        <?php
                                        //$priceProximity = $form[0]->proximity_frame_price_form + $proximity_lens_price_form;
                                        //echo number_format($priceProximity, 2, ',', '.');
                                        ?>
                                        <?php //endif; ?>
                                    </td>
                                    <td colspan='1' width="100px"><b>SA (%)</b></td>
                                    <td colspan='1' width="100px" id="tbDiscountProximity">
                                        <?php //if (isset($discountLensProximity)): ?>
                                        <?php
                                        //$discountProximty = $discountFrameProximity + $discountLensProximity;
                                        //echo number_format($discountProximty, 2, ',', '.');
                                        ?>
                                        <?php //endif; ?>
                                    </td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='4' width="400px"></td>
                                    <td colspan='5' class="border-top3 border-right3 border-left3 border-bottom text-alignC" width="450px"><i><b>FINANSIJE</b></i></td>
                                </tr>
                                <tr class="text-alignC">
                                    <td colspan='4' width="400px"></td>
                                    <td colspan='2' class="border border-left3 border-bottom3 text-alignR" width="150px"><b>UKUPAN IZNOS: &nbsp;</b></td>
                                    <td colspan='1' class="border text-alignC" width="100px" id="tbSumDistanceAndProximity">
                                        <?php
                                        //$sumDistanceAndProximity = $priceDistance + $priceProximity;
                                        //echo number_format($sumDistanceAndProximity, 2, ',', '.');
                                        ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px">(%):</td>
                                    <td colspan='1' class="border border-right3 text-alignC" width="100px" id="tbDiscountDistanceAndProximity">
                                        <?php
                                        //$discountDistanceAndProximity = $discountDistance + $discountProximty;
                                        //echo number_format($discountDistanceAndProximity, 2, ',', '.');
                                        ?>
                                    </td>

                                </tr>
                                <tr class="text-alignC">
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='2' class="border-bottom border-top3 border-left3 border-right3  text-alignC" width="200px"><b><i>Prodao</i></b></td>
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='3' class="text-alignC" width="250px"><b>Kurs: <?php echo $ddlExchange ?></b></td>
                                    <td colspan='1' class="border border-left3 text-alignR" width="100px"><b>&nbsp;AKONTACIJA:&nbsp;</b></td>
                                    <td colspan='1' class="border border-right3 text-alignC" width="100px" id="tbAdvancePaymentForm"><?php echo number_format($form[0]->advance_payment_form, 2, ',', '.'); ?></td>
                                </tr>
                                <tr class="text-alignC">
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='2' class="border-right3 border-bottom3 border-left3 border-top text-alignC" width="200px"><?php echo $ddlSellers ?></td>
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='3' class="text-alignC" width="250px"></td>
                                    <td colspan='1' class="border border-left3 border-bottom3 text-alignR" width="100px"><b>DUG: &nbsp;</b></td>
                                    <td colspan='1' class="border border-right3 border-bottom3 text-alignC" width="100px" id="tbDebtDistanceAndProximity">
                                        <?php
                                        //$debtDiscountDistanceAndProximity = $discountDistanceAndProximity - $form[0]->advance_payment_form;
                                        //echo number_format($debtDiscountDistanceAndProximity, 2, ',', '.');
                                        ?>
                                    </td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <!--                            
                                                                
                                                                <tr>
                                                                    <td colspan="1" ></td>
                                                                    <td colspan='5' class="border-right3 border-bottom3 border-left3 border-top text-alignC"><?php echo $form[0]->name_seller; ?></td>
                                                                    <td colspan="2"></td>
                                                                    <td colspan='3'></td>
                                                                    <td colspan='1' class="border border-left3 text-alignR"><b>DUG: &nbsp;</b></td>
                                                                    <td colspan='3' class="border border-right3 text-alignC">
                                <?php
                                $debtDiscountDistanceAndProximity = $discountDistanceAndProximity - $form[0]->advance_payment_form;
                                echo $debtDiscountDistanceAndProximity;
                                ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan='8'></td>
                                                                    <td colspan='3'></td>
                                                                    <td colspan='1' class="border border-left3 border-bottom3 text-alignR"><b>DUG U &euro;: &nbsp;</b></td>
                                                                    <td colspan='3' class="border border-right3 border-bottom3 text-alignC">
                                <?php
                                $debtDiscountDistanceAndProximityEuro = $debtDiscountDistanceAndProximity / $form[0]->amount_exchange;
                                echo round($debtDiscountDistanceAndProximityEuro, $precision = 0);
                                ?>
                                                                        &euro;
                                                                    </td>
                                                                </tr>-->
                            </table>
                        </fieldset>
                    </div>
                </div> <!-- / .col-md-8 -->
            </div> <!--/ .row -->
        </div> <!-- end sidetab container -->
    </div>
</div>
</div>
<!-- //tabs -->    <!-- services -->