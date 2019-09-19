<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 19): ?>
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
                    <h2 style="text-indent: 20px; text-align: justify">Poručivanje</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/NewOrder/newOrder">Dodaj novo poručivanje</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="container" style="margin-top:20px">
                            <!--                            <h4>
                                                            Pretraga svih kupaca: 
                            <?php echo form_open_multipart('', $form_search); ?>
                            <?php echo form_input($form_customer_search); ?>
                                                                <input type="text" name="tbSearch" id="tbSearch" onchange="Search" />
                            <?php echo form_submit($form_search_submit); ?>
                                                                <input type="submit" name="btnSearch" id="btnSearch" value="Pretraga" class="btn-primary" style="padding: 5px; border-radius: 7px;"/>
                            <?php echo form_close(); ?>
                            
                                                        </h4>-->
                            <?php echo validation_errors('<div class="error">', '</div>'); ?>
                            <div class="search">
                                <h4>
                                    <table  style=" padding: 20px; margin: 10px 15px; float: left">
                                        <tr>
                                            <td class=" text-alignC" style="padding: 5px;">Pretraga svih kupaca: </td>
                                            <td class=" text-alignC" style="padding: 5px;">
                                                <?php echo form_input($form_customer_search); ?>
                                            </td>
                                        </tr>
                                    </table>
                                </h4>
                            </div>
                            <div id="body2">
                                <?php echo @$message; ?>
                                <?php //echo $this->session->flashdata('message'); ?>
                                <div id="customers" >
                                    <div class="ispis">
                                        <table style="width: 98%; border: 1px solid; padding: 10px; margin: 60px 10px;">
                                            <tr class="border3">
                                                <th width="20%" class="border text-alignC">Ime i prezime</th>
                                                <th width="20%" class="border text-alignC">Broj Telefona</th>
                                                <th width="20%" class="border text-alignC">Email</th>
                                                <th width="20%" class="border text-alignC">Napomena</th>
                                                <th width="20%" class="border text-alignC">Akcija</th>
                                            </tr>
                                            <?php foreach ($customers as $c): ?>
                                            <?php if($c->id_customer != 1): ?>
                                                <tr class="border text-alignC">
                                                    <td class="border"><?php echo $c->name_customer; ?></td>
                                                    <td class="border"><?php echo $c->phone_customer; ?></td>
                                                    <td class="border"><?php echo $c->email_customer; ?></td>
                                                    <td class="border"><?php echo $c->note_customer; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>administration/sales/NewOrder/newOrder/<?php echo $c->id_customer ?>">Poručivanje</a>
                                                    </td>
                                                </tr>     
                                                <?php endif;?>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
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