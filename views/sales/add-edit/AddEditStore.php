<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 23): ?>
                    <h3><?php echo $t->name_menu; ?> / Radnja</h3>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <h2 style="text-indent: 20px; text-align: justify">Dodavanje/Izmena naziva radnje</h2>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/sales/StoreSales">Nazad</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo @$message; ?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php echo form_open('', $form_store); ?>
                        <table style="width: 300px; margin: 0px auto; padding: 10px; margin-bottom: 100px; margin-top: 70px">
                            <tr>
                                <td colspan="2" style="padding-bottom: 15px" class="text-alignC"><?php echo form_input($form_name_store); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-alignC"><?php echo form_submit($form_add_submit); ?></td>
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