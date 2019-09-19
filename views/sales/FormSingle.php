<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 21): ?>
                    <h3><?php echo $t->name_menu; ?> / Karton: <?php echo $customer[0]->name_customer; ?></h3>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 15): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Revers na dan: <?php echo date('d. M. Y.', $form[0]->date_form); ?></h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/FormCustomer/index/<?php echo $form[0]->id_customer ?>">Nazad</a></h3>
            <br>
<!--            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/FormSingle/edit/<?php echo $form[0]->id_customer ?>/<?php echo $form[0]->id_form ?>">Izmeni</a></h3>-->
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo @$message; ?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <fieldset style="padding: 10px; width: 900px; border: 2px solid; margin: 20px">
                            <table width="800px" style=' margin: 0px auto'>
                                <tr>
                                    <td colspan="1" class="border text-alignR" width="100px"><b>Broj reversa: &nbsp;</b></td>
                                    <td colspan='1' class="border" width="100px">&nbsp; <?php echo $form[0]->number_form ?></td>
                                    <td colspan='6' width="400px"></td>
                                    <td colspan='1' class="border text-alignR" width="100px"><b>Datum: &nbsp;</b></td>
                                    <td colspan='1' class="border" width="100px">&nbsp; <?php echo date('d. M. Y.', $form[0]->date_form); ?></td>
                                </tr>
                                <tr>
                                    <td colspan='1' class=" text-alignR" width="100px"></td>
                                    <td colspan='1' class="" width="100px"></td>
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
                                    <td colspan='2' class="text-alignR" width="200px"><b>Napomena: &nbsp;</b></td>
                                    <td colspan='6' class="" width="200px">&nbsp; <?php echo $customer[0]->note_customer ?></td>
                                    <td colspan='2' width="400px"></td>
                                </tr>
                            </table>
                            <table width="850px" style=' margin: 0px auto'>
                                <tr style="height: 30px"></tr>
                                <tr class="text-alignC">

                                    <?php
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
                                        else:
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
                                        endif;
                                    endforeach;
                                    ?>

                                    <td colspan='2' width="200px"></td>
                                    <td colspan='2' width="200px"><?php echo form_radio($distanceRadio) ?>&nbsp;<?php echo $distanceRadioName ?></td>
                                    <td colspan='1' width="50px"></td>
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
                                    <td colspan='3' class="border" width="300px">&nbsp; <?php echo $form[0]->pd_form ?></td>
                                    <td colspan='1' width="50px"></td>
                                    <td colspan='1' width="100px" class="border text-alignR"><b>PD: &nbsp;</b></td>
                                    <td colspan='3' class="border" width="300px">&nbsp; <?php echo $form[0]->pd_form  - 2?></td>
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
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo $form[0]->distance_od_sph_form ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo $form[0]->distance_od_cyl_form ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo $form[0]->distance_od_ax_form ?>&#176;</td>
                                    <td colspan='1' class="text-alignC" width="50px"> &nbsp; <b>ADD</b> &nbsp; </td>
                                    <td colspan='1' class="border-right text-alignR" width="100px"><b>OD. &nbsp;</b></td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php
                                        if ($form[0]->add_form != 0):
                                            $proximity_od_sph_form = $form[0]->distance_od_sph_form + $form[0]->add_form;
                                            echo number_format($proximity_od_sph_form, $decimals = 2);
                                        endif;
                                        ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php
                                        if ($form[0]->add_form != 0):
                                            $proximity_od_cyl_form = $form[0]->distance_od_cyl_form;
                                            echo @number_format($proximity_od_cyl_form, $decimals = 2);
                                        endif;
                                        ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php
                                        if ($form[0]->add_form != 0):
                                            $proximity_od_ax_form = $form[0]->distance_od_ax_form;
                                            echo $proximity_od_ax_form . "&#176;";
                                        endif;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='1' class="border-right text-alignR" width="100px"><b>OS. &nbsp;</b></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo $form[0]->distance_os_sph_form ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo $form[0]->distance_os_cyl_form ?></td>
                                    <td colspan='1' class="border text-alignC" width="100px"><?php echo $form[0]->distance_os_ax_form ?>&#176;</td>
                                    <td colspan='1' class="text-alignC" width="50px">&nbsp; <b><?php echo number_format($form[0]->add_form, $decimals = 2); ?></b> &nbsp;</td>
                                    <td colspan='1' class="border-right text-alignR" width="100px"><b>OS. &nbsp;</b></td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php
                                        if ($form[0]->add_form != 0):
                                            $proximity_os_sph_form = $form[0]->distance_os_sph_form + $form[0]->add_form;
                                            echo number_format($proximity_os_sph_form, $decimals = 2);
                                        endif;
                                        ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php
                                        if ($form[0]->add_form != 0):
                                            $proximity_os_cyl_form = $form[0]->distance_os_cyl_form;
                                            echo @number_format($proximity_os_cyl_form, $decimals = 2);
                                        endif;
                                        ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php
                                        if ($form[0]->add_form != 0):
                                            $proximity_os_ax_form = $form[0]->distance_os_ax_form;
                                            echo $proximity_os_ax_form . "&#176;";
                                        endif;
                                        ?>
                                    </td>
                                </tr>
                                <tr style="height: 30px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='2' width="200px"><b>OKVIR: </b></td>
                                    <td colspan='2' width="200px"><b>CENA: </b></td>
                                    <td colspan='3' width="300px"><b>(%): </b></td>
                                    <td colspan='2' width="200px"><b>CENA SA POPUSTOM: </b></td>
                                </tr>
                                <tr>
                                    <td colspan='2' class="border text-alignC" width="200px"><?php echo $form[0]->frame_form; ?></td>
                                    <td colspan='2' class="border text-alignC" width="200px"><?php echo $form[0]->frame_price_form; ?></td>
                                    <td colspan='3' class="border text-alignC" width="300px"><?php echo $form[0]->frame_discount_form; ?></td>
                                    <td colspan='2' class="border text-alignC" width="200px">
                                        <?php
                                        $discountFrame = $form[0]->frame_price_form - ($form[0]->frame_price_form / 100) * $form[0]->frame_discount_form;
                                        echo $discountFrame;
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <table width="850px" style=' margin: 0px auto'>
                                <tr style="height: 20px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='9' width="900px"><b>PORUČENA STAKLA: </b></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr>
                                    <td colspan='4' class="border-top border-left text-alignR" width="400px"><b>Porizvođač:&nbsp;</b></td>
                                    <td colspan='5' class="border-top  border-right text-alignL" width="500px"><?php echo $form[0]->lens_producer_form ?></td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="9"></td>
                                </tr>
                                <tr>
                                    <td colspan='4' class="border-left text-alignR" width="400px"><b>Materijal:&nbsp;</b></td>
                                    <td colspan='5' class="border-right text-alignL" width="500px"><?php echo $form[0]->lens_material_form ?></td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="9"></td>
                                </tr>
                                <tr>
                                    <td colspan='4' class="border-left text-alignR" width="400px"><b>Tip:&nbsp;</b></td>
                                    <td colspan='5' class="border-right text-alignL" width="500px"><?php echo $form[0]->lens_type_form ?></td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="9"></td>
                                </tr>
                                <tr>
                                    <td colspan='4' class="border-left text-alignR" width="400px"><b>Dizajn:&nbsp;</b></td>
                                    <td colspan='5' class="border-right text-alignL" width="500px"><?php echo $form[0]->lens_designe_form ?></td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="9"></td>
                                </tr>
                                <tr>
                                    <td colspan='4' class="border-left text-alignR" width="400px"><b>Index:&nbsp;</b></td>
                                    <td colspan='5' class="border-right text-alignL" width="500px"><?php echo $form[0]->lens_index_form ?></td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="9"></td>
                                </tr>
                                <tr>
                                    <td colspan='4' class="border-left text-alignR" width="400px"><b>Naziv:&nbsp;</b></td>
                                    <td colspan='5' class="border-right text-alignL" width="500px"><?php echo $form[0]->lens_name_form ?></td>
                                </tr>
                                <tr style="height: 10px">
                                    <td class="border-left border-right" colspan="9"></td>
                                </tr>
                                <tr>
                                    <td colspan='4' class="border-left border-bottom text-alignR" width="400px"><b>Dorada:&nbsp;</b></td>
                                    <td colspan='5' class="border-right border-bottom text-alignL" width="500px"><?php echo $form[0]->lens_finishing_form ?></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='9' width="400px"><b>CENA STAKLA: </b></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='2' width="200px"><b></b></td>
                                    <td colspan='2' width="200px"><b>CENA: </b></td>
                                    <td colspan='3' width="300px"><b>(%): </b></td>
                                    <td colspan='2' width="200px"><b>CENA SA POPUSTOM: </b></td>
                                </tr>
                                <tr style="height: 10px"></tr>
                                <tr class="text-alignC">
                                    <td colspan='2' width="200px"></td>
                                    <td colspan='2' class="border text-alignC" width="200px">
                                        <?php if ($form[0]->lens_price_form != null): ?>
                                            <?php $lens_price_form = round(($form[0]->lens_price_form * 2) * $form[0]->amount_exchange, -2) ?>
                                            <?php echo number_format($lens_price_form, 2, ',', '.') ?>
                                        <?php endif; ?>
                                    </td>
                                    <td colspan='3' class="border text-alignC" width="300px">
                                        <?php if ($form[0]->lens_discount_form != null): ?>
                                            <?php echo $form[0]->lens_discount_form ?>
                                        <?php endif; ?>
                                    </td>
                                    <td colspan='2' class="border text-alignC" width="200px">
                                        <?php if ($form[0]->lens_price_form != null): ?>
                                            <?php
                                            $priceLens = round(($form[0]->lens_price_form * 2) * $form[0]->amount_exchange, -2);
                                            $discountLens = round($priceLens - ($priceLens / 100) * $form[0]->lens_discount_form, -2);
                                            echo number_format($discountLens, 2, ',', '.');
                                            ?>
                                        <?php endif; ?>
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
                                    <td colspan='1' class="border text-alignC" width="100px">
                                        <?php
                                        if ($form[0]->lens_price_form != null):
                                            $lens_price_form = round(($form[0]->lens_price_form * 2) * $form[0]->amount_exchange, -2);
                                        endif;
                                        $sumFrameLens = $form[0]->frame_price_form + $lens_price_form;
                                        echo number_format($sumFrameLens, 2, ',', '.');
                                        ?>
                                    </td>
                                    <td colspan='1' class="border text-alignC" width="100px">(%):</td>
                                    <td colspan='1' class="border border-right3 text-alignC" width="100px">
                                        <?php
                                        $discountFrameLens = $discountFrame + $discountLens;
                                        echo number_format($discountFrameLens, 2, ',', '.');
                                        ?>
                                    </td>

                                </tr>
                                <tr class="text-alignC">
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='2' class="border-bottom border-top3 border-left3 border-right3  text-alignC" width="200px"><b><i>Prodao</i></b></td>
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='3' class="text-alignC" width="250px"><b>Kurs: <?php echo $form[0]->amount_exchange ?></b></td>
                                    <td colspan='1' class="border border-left3 text-alignR" width="100px"><b>&nbsp;AKONTACIJA:&nbsp;</b></td>
                                    <td colspan='1' class="border border-right3 text-alignC" width="100px"><?php echo number_format($form[0]->advance_payment_form, 2, ',', '.'); ?></td>
                                </tr>
                                <tr class="text-alignC">
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='2' class="border-right3 border-bottom3 border-left3 border-top text-alignC" width="200px"><?php echo $form[0]->name_seller; ?></td>
                                    <td colspan='1' width="100px"></td>
                                    <td colspan='3' class="text-alignC" width="250px"></td>
                                    <td colspan='1' class="border border-left3 border-bottom3 text-alignR" width="100px"><b>DUG: &nbsp;</b></td>
                                    <td colspan='1' class="border border-right3 border-bottom3 text-alignC" width="100px">
                                        <?php
                                        $debtDiscountFrameLens = $discountFrameLens - $form[0]->advance_payment_form;
                                        echo number_format($debtDiscountFrameLens, 2, ',', '.');
                                        ?>
                                    </td>
                                </tr>
                                <tr style="height: 10px"></tr>
                            </table>
                        </fieldset>
                    </div>
                </div>
            </div> <!-- / .col-md-8 -->
        </div> <!--/ .row -->
    </div> <!-- end sidetab container -->
</div>
</div>
</div>
<!-- //tabs -->    <!-- services -->