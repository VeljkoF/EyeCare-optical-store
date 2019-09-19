<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 23): ?>
                    <h3><?php echo $t->name_menu; ?> / Prodavci</h3>
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
                    <h2 style="text-indent: 20px; text-align: justify">Lista prodavca</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/OtherSales">Nazad</a></h3>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/SellerSales/insert">Dodaj novog prodavca</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <table style="width: 300px; margin: 0px auto; padding: 10px; margin-bottom: 30px; margin-top: 20px">
                            <th class="text-alignC">Naziv prodavaca</th>
                            <th class="text-alignC">Akcija</th>
                            <?php foreach ($sellers as $s): ?>
                                <tr>
                                    <td class="border text-alignC"><?php echo $s->name_seller ?></td>
                                    <td class="border text-alignC ">
                                        <a href="<?php echo base_url() ?>administration/sales/SellerSales/edit/<?php echo $s->id_seller ?>">Izmeni</a> 
                                        &nbsp;|&nbsp;
                                        <a href="<?php echo base_url() ?>administration/sales/SellerSales/delete/<?php echo $s->id_seller ?>">Obriši</a>
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