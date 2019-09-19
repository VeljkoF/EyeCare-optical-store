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
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 15): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista prodavca</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/ArchiveSales">Nazad</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo @$message; ?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <table style="width: 600px; padding: 10px;">
                            <tr>
                                <td style="padding: 10px">Ime i prezime: </td>
                                <td colspan="2" style="padding: 10px"><?php echo $customer[0]->name_customer; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Godina rođenja: </td>
                                <td colspan="2" style="padding: 10px"><?php echo $customer[0]->year_customer; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Broj telefona: </td>
                                <td colspan="2" style="padding: 10px"><?php echo $customer[0]->phone_customer; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Email: </td>
                                <td colspan="2" style="padding: 10px"><?php echo $customer[0]->email_customer; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Napomena: </td>
                                <td colspan="2" style="padding: 10px"><?php echo $customer[0]->note_customer; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px"></td>
                                <td colspan="2" style="padding: 10px">
<!--                                    <a href="<?php echo base_url() ?>administration/sales/FormSingle/insert/<?php echo $customer[0]->id_customer ?>">Dodaj novi revers</a>
                                    </br>-->
<!--                                    <a href="<?php echo base_url() ?>administration/sales/FormSingle/delete/<?php echo $customer[0]->id_customer ?>">Obriši reverse</a>-->
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Reversi: </td>
                                <td colspan="2" style="padding: 10px">
                                    <?php foreach ($forms as $f): ?>
                                        <a href="<?php echo base_url() ?>administration/sales/FormSingle/index/<?php echo $f->id_customer ?>/<?php echo $f->id_form ?>">Revers br: 
                                            <?php
                                            echo $f->number_form . ",&nbsp datum: ";
                                            echo date('d. M. Y.', $f->date_form);
                                            ?>
                                        </a>
                                        <br/>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
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