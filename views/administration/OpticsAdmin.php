<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 10): ?>
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
                <?php if ($t->id_menu == 10): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Tekst <?php echo $t->name_menu ?> sajta</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <table style="width: 100%; border: 1px solid; padding: 10px; margin: 10px 10px;">
                            <tr class="border3">
                                <th class="border text-alignC">Naslov</th>
                                <th class="border text-alignC">Tekst 1</th>
                                <th class="border text-alignC">Tekst 2</th>
                                <th class="border text-alignC">Slika</th>
<!--                                <th class="border text-alignC">Sadržaj liste</th>-->
                                <th class="border text-alignC">Akcija</th>
                            </tr>
                            <?php foreach ($text as $t): ?>
                                <tr class="border3">
                                    <td class="border" style="width: 10%; padding: 10px; text-align: justify"><?php echo $t->title_text_site ?></td>
                                    <td class="border" style="width: 25%; padding: 10px; text-align: justify"><?php echo $t->text_text_site_1 ?></td>
                                    <td class="border text-alignC" style="width: 25%; padding: 10px; text-align: justify"><?php echo $t->text_text_site_2 ?></td>
                                    <td class="border text-alignC" style="width: 20%; padding: 10px">
                                        <img src="<?php echo base_url() ?>images/<?php echo $t->pic_text_site ?>" alt="<?php echo $t->pic_text_site ?>" class="img img-responsive"/>
                                    </td>
    <!--                                    <td class="border text-alignC" style=" width: 25%; padding: 10px">
                                        <ul style="padding-left: 30px; text-align: justify">
                                    <?php foreach ($list as $l): ?>
                                        <?php if ($l->id_text_site == $t->id_text_site): ?>
                                                                            <li><?php echo $l->item_list_site; ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                        </ul>
                                    </td>-->
                                    <td class="border text-alignC" style=" width: 20%; padding: 10px">
                                        <a href="<?php echo base_url() ?>administration/admin/OpticsAdmin/edit/<?php echo $t->id_text_site ?>">Izmeni</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div> <!-- /col-md-4 -->
                </div> <!--/ .row -->
            </div> <!-- end sidetab container -->
        </div>
    </div>
</div>
<!-- //tabs -->    <!-- services -->