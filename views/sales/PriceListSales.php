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
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 15): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista kupaca</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/PriceListLensSales/insert">Dodaj novu stavku u cenovnik</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
//                        if (!empty($this->session->flashdata('notice'))):
//                            $notice = $this->session->flashdata('notice');
//                            echo "<script type='text/javascript'>alert('" . $notice . "');</script>";
//                        endif;
                        ?>
                        <div id="customers" >
                            <div class="search">
                                <table  style="width: 70%; border: 1px solid; padding: 20px; margin: 10px 15px; float: right">
                                    <tr>
                                        <th class=" text-alignC" rowspan="2" style="padding: 5px;">Pretraga:</th>
                                        <th class=" text-alignC" style="padding: 5px;">Proizvođač</th>
                                        <th class=" text-alignC" style="padding: 5px;">Materijal</th>
                                        <th class=" text-alignC" style="padding: 5px;">Tip</th>
                                        <th class=" text-alignC" style="padding: 5px;">Dizajn</th>
                                        <th class=" text-alignC" style="padding: 5px;">Index</th>
                                        <th class=" text-alignC" style="padding: 5px;">Naziv</th>
                                        <th class=" text-alignC" style="padding: 5px;">Dorada</th>
                                    </tr>
                                    <tr class=" text-alignC">
                                        <td class=" text-alignC" style="padding: 5px;">
                                            <?php echo $ddlNameProducerLens ?>
                                        </td>
                                        <td class=" text-alignC" style="padding: 5px;">
                                            <?php echo $ddlNameMaterialLens ?>
                                        </td>
                                        <td class=" text-alignC" style="padding: 5px;">
                                            <?php echo $ddlNameTypeLens ?>
                                        </td>
                                        <td class=" text-alignC" style="padding: 5px;">
                                            <?php echo $ddlNameDesignLens ?>
                                        </td>
                                        <td class=" text-alignC" style="padding: 5px;">
                                            <?php echo $ddlNameIndexLens ?>
                                        </td>
                                        <td class=" text-alignC" style="padding: 5px;">
                                            <?php echo $ddlNameNameLens ?>
                                        </td>
                                        <td class=" text-alignC" style="padding: 5px;">
                                            <?php echo $ddlNameFinishingLens ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="ispis">
                                <table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">
                                    <tr class="border3">
                                        <th class="border text-alignC">Proizvođač</th>
                                        <th class="border text-alignC">Materijal</th>
                                        <th class="border text-alignC">Tip</th>
                                        <th class="border text-alignC">Dizajn</th>
                                        <th class="border text-alignC">Index</th>
                                        <th class="border text-alignC">Naziv</th>
                                        <th class="border text-alignC">Dorada</th>
                                        <th class="border text-alignC">Cena u &euro;</th>
                                        <th class="border text-alignC">Min Sph / Max Sph / Cyl / Add / &#8960;</th>
                                        <th class="border text-alignC" colspan="1">Akcija</th>
                                    </tr>
                                    <?php foreach ($pricelist_lens as $p): ?>
                                        <?php //foreach ($range_dioptre_lens as $r): ?>
                                        <tr class="border text-alignC">
                                            <td class="border">
                                                <a href="<?php echo base_url(); ?>administration/sales/PriceListLensSales/edit/<?php echo $p->id_pricelist_lens ?>"><?php echo $p->name_producer_lens; ?></a>
                                            <td class="border">
                                                <a href="<?php echo base_url(); ?>administration/sales/PriceListLensSales/edit/<?php echo $p->id_pricelist_lens ?>"><?php echo $p->name_material_lens; ?></a>
                                            </td>
                                            <td class="border">
                                                <a href="<?php echo base_url(); ?>administration/sales/PriceListLensSales/edit/<?php echo $p->id_pricelist_lens ?>"><?php echo $p->name_type_lens; ?></a>
                                            </td>
                                            <td class="border">
                                                <a href="<?php echo base_url(); ?>administration/sales/PriceListLensSales/edit/<?php echo $p->id_pricelist_lens ?>"><?php echo $p->name_design_lens; ?></a>
                                            </td>
                                            <td class="border">
                                                <a href="<?php echo base_url(); ?>administration/sales/PriceListLensSales/edit/<?php echo $p->id_pricelist_lens ?>"><?php echo $p->name_index_lens; ?></a>
                                            </td>
                                            <td class="border">
                                                <a href="<?php echo base_url(); ?>administration/sales/PriceListLensSales/edit/<?php echo $p->id_pricelist_lens ?>"><?php echo $p->name_name_lens; ?></a>
                                            </td>
                                            <td class="border">
                                                <a href="<?php echo base_url(); ?>administration/sales/PriceListLensSales/edit/<?php echo $p->id_pricelist_lens ?>"><?php echo $p->name_finishing_lens; ?></a>
                                            </td>
                                            <td class="border">
                                                <a href="<?php echo base_url(); ?>administration/sales/PriceListLensSales/edit/<?php echo $p->id_pricelist_lens ?>"><?php echo $p->price_pricelist_lens; ?></a>
                                            <td class="border">
                                                <a href="<?php echo base_url(); ?>administration/sales/PriceListLensSales/edit/<?php echo $p->id_pricelist_lens ?>">
                                                    <?php
                                                    //echo $p->id_min_sph_range_dioptre_lens;
                                                    foreach ($sph_range_dioptre_lenses as $s):
                                                        if ($p->id_min_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                                                            echo $s->value_sph_range_dioptre_lens;
                                                        endif;
                                                    endforeach;
                                                    echo " / ";
                                                    foreach ($sph_range_dioptre_lenses as $s):
                                                        if ($p->id_max_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                                                            echo $s->value_sph_range_dioptre_lens;
                                                        endif;
                                                    endforeach;
                                                    echo " / " . $p->cyl_range_dioptre_lens;
                                                    if ($p->add_range_dioptre_lens != null):
                                                        echo " / " . $p->add_range_dioptre_lens;
                                                    endif;
                                                    echo " / &#8960; " . $p->name_diameter_lens;
                                                    ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>administration/sales/PriceListLensSales/edit/<?php echo $p->id_pricelist_lens ?>">Izmeni</a>
                                                &nbsp;|&nbsp;
                                                <a href="#" class="deletePriceListSeles" data-id="<?php echo $p->id_pricelist_lens ?>">Obriši</a>
                                            </td>
                                        </tr>                        
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- / .col-md-8 -->
        </div> <!--/ .row -->
    </div> <!-- end sidetab container -->
</div>
</div>
</div>
<!-- //tabs -->    <!-- services -->