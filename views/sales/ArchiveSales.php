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
                    <h2 style="text-indent: 20px; text-align: justify">Lista kupaca</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <!--            <br/>
                        <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/FormCustomer/insert">Dodaj novog kupca</a></h3>-->
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
//                        if (!empty($this->session->flashdata('notice'))):
//                            $notice = $this->session->flashdata('notice');
//                            echo "<script type='text/javascript'>alert('" . $notice . "');</script>";
//                        endif;
                        ?>
                        <div id="container" style="margin-top:20px">
                            <div id="body2">
                                <div id="customers" >
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
                                    <div class="ispis">
                                        <table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">
                                            <tr class="border3">
                                                <th class="border text-alignC">Ime i prezime</th>
                        <!--                        <th class="border text-alignC">Karton</th>-->
                                                <th class="border text-alignC">Broj Telefona</th>
                                                <th class="border text-alignC">Email</th>
                                                <th class="border text-alignC">Napomena</th>
                                                <th class="border text-alignC">Akcija</th>
                                            </tr>
                                            <?php foreach ($customers as $c): ?>
                                            <?php if ($c->id_customer != 1):?>
                                                <tr class="border text-alignC">
                                                    <td class="border">
                                                        <a href="<?php echo base_url(); ?>administration/sales/FormCustomer/index/<?php echo $c->id_customer ?>"><?php echo $c->name_customer; ?></a>
                                                    </td>
                                                    <td class="border">
                                                        <a href="<?php echo base_url(); ?>administration/sales/FormCustomer/index/<?php echo $c->id_customer ?>"><?php echo $c->phone_customer; ?></a>
                                                    </td>
                                                    <td class="border">
                                                        <a href="<?php echo base_url(); ?>administration/sales/FormCustomer/index/<?php echo $c->id_customer ?>"><?php echo $c->email_customer; ?></a>
                                                    </td>
                                                    <td class="border">
                                                        <a href="<?php echo base_url(); ?>administration/sales/FormCustomer/index/<?php echo $c->id_customer ?>"><?php echo $c->note_customer; ?></a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>administration/sales/FormCustomer/edit/<?php echo $c->id_customer ?>">Izmeni</a>
                                                        &nbsp;|&nbsp;
                                                        <a href="<?php echo base_url(); ?>administration/sales/FormCustomer/delete/<?php echo $c->id_customer ?>">Obriši</a>
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