<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 21): ?>
                    <h3><?php echo $t->name_menu; ?></h3>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <h2 style="text-indent: 20px; text-align: justify">Dodavanje/Izmena kupca</h2>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/sales/ArchiveSales">Nazad</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo @$message; ?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php echo form_open('', $form_customer); ?>
                        <table style="width: 500px; margin: 0px auto; padding: 10px;">
                            <tr>
                                <td style="padding: 10px">Ime i prezime: </td>
                                <td style="padding: 10px"><?php echo form_input($form_name_customer); ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Godina rođenja: </td>
                                <td style="padding: 10px"><?php echo form_input($form_year_customer); ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Broj telefona: </td>
                                <td style="padding: 10px"><?php echo form_input($form_phone_customer); ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Email: </td>
                                <td style="padding: 10px"><?php echo form_input($form_email_customer); ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 10px">Napomena: </td>
                                <td style="padding: 10px"><?php echo form_textarea($form_note_customer); ?></td>
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