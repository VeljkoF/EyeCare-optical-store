<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 23): ?>
                    <h3><?php echo $t->name_menu; ?></h3>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 15): ?>
                    <!--                    <h2 style="text-indent: 20px; text-align: justify">Lista kupaca</h2>-->
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>

        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/SellerSales">Prodavac</a></h3>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/ExchangeSales">Kurs eura</a></h3>
                        <br>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/ProducerLensSales">Proizvođač sočiva</a></h3>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/MaterialLensSales">Materijal sočiva</a></h3>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/TypeLensSales">Tip sočiva</a></h3>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/DesignLensSales">Dizajn sočiva</a></h3>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/IndexLensSales">Index sočiva</a></h3>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/NameLensSales">Naziv sočiva</a></h3>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/FinishingLensSales">Dorada sočiva</a></h3>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/DiameterLensSales">Prečnik sočiva</a></h3>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/RangeDioptreLensSales">Opseg dioptrije sočiva</a></h3>
                    </div>
                </div> <!-- / .col-md-8 -->
            </div> <!--/ .row -->
        </div> <!-- end sidetab container -->
    </div>
</div>
</div>
<!-- //tabs -->    <!-- services -->