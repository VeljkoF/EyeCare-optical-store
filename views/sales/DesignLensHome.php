<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 23): ?>
                    <h3><?php echo $t->name_menu; ?> / Dizajn sočiva</h3>
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
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 15): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista dizajna sočiva</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/OtherSales">Nazad</a></h3>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/DesignLensSales/insert">Dodaj novog dizajn sočiva</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo @$message; ?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <table style="width: 400px; margin: 0px auto; padding: 10px; margin-bottom: 30px; margin-top: 20px">
                            <th colspan="2" style="padding: 10px" class="text-alignC">Naziv dizajna sočiva</th>
                            <th colspan="3" style="padding: 10px" class="text-alignC">Akcija</th>
                            <?php foreach ($design_lens as $s): ?>
                                <tr>
                                    <td colspan="2" style="padding: 15px" class="border text-alignC"><?php echo $s->name_design_lens ?></td>
                                    <td colspan="3" style="padding: 15px" class="border text-alignC">
                                        <a href="<?php echo base_url() ?>administration/sales/DesignLensSales/edit/<?php echo $s->id_design_lens ?>">Izmeni</a> 
                                        &nbsp;|&nbsp;
                                        <a href="<?php echo base_url() ?>administration/sales/DesignLensSales/delete/<?php echo $s->id_design_lens ?>">Obriši</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div> <!-- / .col-md-8 -->
        </div> <!--/ .row -->
    </div> <!-- end sidetab container -->
</div>
</div>
</div>
<!-- //tabs -->    <!-- services -->