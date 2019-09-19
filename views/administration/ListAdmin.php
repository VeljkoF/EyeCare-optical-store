<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 10): ?>
                    <h3>Liste <?php echo $t->name_menu; ?></h3>
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
                <?php if ($t->id_menu == 10): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Liste <?php echo $t->name_menu ?></h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/admin/OpticsAdmin/edit/<?php echo $id_text_site ?>">Nazad</a></h3>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/admin/ListAdmin/insert/<?php echo $id_text_site ?>">Dodaj stavku u listu</a></h3>  
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table style="width: 100%; border: 1px solid; padding: 10px; margin: 10px 10px;">
                            <tr class="border3">
                                <th class="border text-alignC">Sadrzaj liste</th>
                                <th class="border text-alignC">Akcija</th>
                            </tr>
                            <?php foreach ($list as $l): ?>
                                <tr class="border">
                                    <td class="border text-alignL" style="padding: 10px; width: 85%"><?php echo $l->item_list_site ?></td>
                                    <td class="border text-alignC">
                                        <a href="<?php echo base_url() ?>administration/admin/ListAdmin/edit/<?php echo $id_text_site ?>/<?php echo $l->id_list_site ?>">Izmeni</a>
                                        &nbsp;|&nbsp;
                                        <a href="<?php echo base_url() ?>administration/admin/ListAdmin/delete/<?php echo $id_text_site ?>/<?php echo $l->id_list_site ?>">Obriši</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div> <!-- / .col-md-8 -->
            </div> <!--/ .row -->
        </div> <!-- end sidetab container -->
    </div>
</div>
</div>
<!-- //tabs -->    <!-- services -->