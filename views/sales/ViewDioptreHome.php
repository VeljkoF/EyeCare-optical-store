<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 23): ?>
                    <h3><?php echo $t->name_menu; ?> / Dioptrije</h3>
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
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 15): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista dioptrija</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/RangeDioptreLensSales/insert">Nazad</a></h3>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/RangeDioptreLensSales/viewDioptre/insert">Dodaj novu dioptriju sočiva</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="customers" >
                            <div class="ispis">
                                <table style="width: 20%; border: 1px solid; padding: 10px; margin: 0px auto; ">
                                    <tr class="border3">
                                        <th class="border text-alignC">Sph</th>
                                        <th class="border text-alignC">Akcija</th>
                                    </tr>
                                    <?php foreach ($sph_range_dioptre_lenses as $c): ?>
                                        <tr class="border text-alignC">
                                            <td class="border" style="width: 40%"><?php echo $c->value_sph_range_dioptre_lens; ?></td>
                                            <td style="width: 60%">
                                                <a href="<?php echo base_url(); ?>administration/sales/RangeDioptreLensSales/viewDioptre/edit/<?php echo $c->id_sph_range_dioptre_lens ?>">Izmeni</a>
                                                &nbsp;|&nbsp;
                                                <a href="#" class="deleteShpDioptre" data-id="<?php echo $c->id_sph_range_dioptre_lens ?>">Obriši</a>
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