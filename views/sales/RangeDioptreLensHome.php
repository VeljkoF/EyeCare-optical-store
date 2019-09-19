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
                    <h2 style="text-indent: 20px; text-align: justify">Lista opsega dioptrije</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/OtherSales">Nazad</a></h3>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/RangeDioptreLensSales/insert">Dodaj novi opseg dioptrije sočiva</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="customers" >
                            <div class="search">
                                <table  style="width: 50%; border: 1px solid; padding: 20px; margin: 10px 15px; float: right">
                                    <tr>
                                        <th class=" text-alignC" rowspan="2" style="padding: 5px;">Pretraga:</th>
                                        <th class=" text-alignC" style="padding: 5px;">Minimalni iznos sph</th>
                                        <th class=" text-alignC" style="padding: 5px;">Maximalni iznos sph</th>
                                    </tr>
                                    <tr class=" text-alignC">
                                        <td class=" text-alignC" style="padding: 5px;">
                                            <?php echo $ddlMinSphRangeDioptreLens?>
                                        </td>
                                        <td class=" text-alignC" style="padding: 5px;">
                                            <?php echo $ddlMaxSphRangeDioptreLens?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="ispis">
                                <table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">
                                    <tr class="border3">
                                        <th class="border text-alignC">Minimalni iznos sph</th>
                                        <th class="border text-alignC">Maximalni iznos sph</th>
                                        <th class="border text-alignC">Iznos cyl</th>
                                        <th class="border text-alignC">Iznos Adicije</th>
                                        <th class="border text-alignC">Akcija</th>
                                    </tr>
                                    <?php foreach ($range_dioptre_lens as $c): ?>
                                        <tr class="border text-alignC">
                                            <td class="border">
                                                <?php
                                                foreach ($sph_range_dioptre_lenses as $s):
                                                    if ($c->id_min_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                                                        echo $s->value_sph_range_dioptre_lens;
                                                    endif;
                                                endforeach;
                                                ?>
                                            </td>
                                            <td class="border">
                                                <?php
                                                foreach ($sph_range_dioptre_lenses as $s):
                                                    if ($c->id_max_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                                                        echo $s->value_sph_range_dioptre_lens;
                                                    endif;
                                                endforeach;
                                                ?>
                                            </td>
                                            <td class="border"><?php echo $c->cyl_range_dioptre_lens; ?></td>
                                            <td class="border"><?php echo $c->add_range_dioptre_lens; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>administration/sales/RangeDioptreLensSales/edit/<?php echo $c->id_range_dioptre_lens ?>">Izmeni</a>
                                                &nbsp;|&nbsp;
                                                <a href="#" class="deleteRangeDioptreLens" data-id="<?php echo $c->id_range_dioptre_lens ?>">Obriši</a>
                                            </td>
                                        </tr>                        
                                    <?php endforeach; ?>
                                </table>
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