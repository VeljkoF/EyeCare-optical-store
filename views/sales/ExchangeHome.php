<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 23): ?>
                    <h3><?php echo $t->name_menu; ?> / Kurs &euro;</h3>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 15): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista kursa &euro;</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/OtherSales">Nazad</a></h3>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/ExchangeSales/insert">Dodaj novog kursa &euro;</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo @$message; ?>
                        <?php echo $this->session->flashdata('message'); ?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
<!--                        <input type='radio' class='test' value='1' name='chbDefoultExchangeValuee' id='chbDefoultExchangeValuee'/>-->
                        <div id="ispis" class='alert alert-success hide' style='width: 400px; text-align: center; margin:0px auto'></div>
                        <table id="tableExchange" style="width: 400px; margin: 0px auto; padding: 10px; margin-bottom: 80px; margin-top: 60px">
                            <th class="text-alignC">Iznos &euro; u RSD</th>
                            <th class="text-alignC">Aktivni iznos &euro; u RSD</th>
                            <th class="text-alignC">Akcija</th>

                            <?php foreach ($exchange as $e): ?>
                                <tr>
                                    <td class='border text-alignC'><?php echo $e->amount_exchange ?></td>
                                    <?php if ($e->default_amount_exchange == 1): ?>
                                        <td class='border text-alignC'>
                                            <input type='radio' class='test' value='<?php echo $e->id_exchange ?>' name='chbDefoultExchangeValue' id='chbDefoultExchangeValue' checked='checked' />
                                        </td>
                                    <?php else: ?>
                                        <td class='border text-alignC'>
                                            <input type='radio' class='test' value='<?php echo $e->id_exchange ?>' name='chbDefoultExchangeValue' id='chbDefoultExchangeValue'/>
                                        </td>
                                    <?php endif; ?>
                                    <td class='border text-alignC '>
                                        <a href='<?php echo base_url() ?>administration/sales/ExchangeSales/delete/<?php echo $e->id_exchange ?>'>Obriši</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>

                    <script>
                        $(document).ready(function () {
                            $('input[type=radio][name=chbDefoultExchangeValue]').click(function () {

                                var defaultAmountExchange = $(this).val();
                                //var defaultAmountExchange = 10;

                                $.ajax({
                                    type: "POST",
                                    url: "../sales/ExchangeSales/changeDefualtAmountExchange",
                                    dataType: "json",
                                    data: {defaultAmountExchange: defaultAmountExchange},
                                    success: function (podaci) {
                                        if (podaci.true == true) {
                                            $('#ispis').empty();
                                            $('#ispis').removeClass('hide');
                                            $('#ispis').append("Uspecno ste izmenili trenurni kurs &euro;!");
                                        } else {
                                            console.log("Greska");
                                        }
                                    },
                                    error: function () {
                                        alert("Greska! Iznos eura nije unet. Ponovite unos.");
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div> <!-- / .col-md-8 -->
        </div> <!--/ .row -->
    </div> <!-- end sidetab container -->
</div>
</div>
</div>
<!-- //tabs -->    <!-- services -->