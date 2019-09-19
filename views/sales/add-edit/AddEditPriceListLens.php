<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 22): ?>
                    <h3><?php echo $t->name_menu; ?></h3>
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
            </div>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <h2 style="text-indent: 20px; text-align: justify">Dodavanje/Izmena kupca</h2>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/sales/PriceListLensSales">Nazad</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php echo form_open('', $form_pricelist_lens); ?>
                        <table style="width: 500px; margin: 0px auto; padding: 10px;">
                            <tr>
                                <td style="padding: 10px">Proizvođač sočiva: </td>
                                <td style="padding: 10px"><?php echo $ddlProducerLens ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlProducerLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Materijal sočiva: </td>
                                <td style="padding: 10px"><?php echo $ddlMaterialLens; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlMaterialLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Tip sočiva: </td>
                                <td style="padding: 10px"><?php echo $ddlTypeLens; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlTypeLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Dizajn sočiva: </td>
                                <td style="padding: 10px"><?php echo $ddlDesignLens; ?></td>
                            </tr><tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlDesignLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Index sočiva: </td>
                                <td style="padding: 10px"><?php echo $ddlIndexLens ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlIndexLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Naziv sočiva: </td>
                                <td style="padding: 10px"><?php echo $ddlNameLens ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlNameLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Dorada sočiva: </td>
                                <td style="padding: 10px"><?php echo $ddlFinishingLens ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlFinishingLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Cena u &euro;: </td>
                                <td style="padding: 10px"><?php echo form_input($form_price_pricelist_lens); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="tbPriceLensPricelistCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Opseg dioptrije sočiva: </td>
                                <td style="padding: 10px"><?php echo $ddlRangeDioptreLens ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlRangeDioptreLensCss"></span></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Prečnik sočiva: </td>
                                <td style="padding: 10px"><?php echo $ddlDiameterLens ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 15px" class="ddlDiameterLensCss"></span></td>
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