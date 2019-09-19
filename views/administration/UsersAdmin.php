<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 15): ?>
                    <h3><?php echo $t->name_menu; ?></h3>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <div class="message">
                <?php
                if (!empty($this->session->flashdata('message'))):
                    echo $this->session->flashdata('message');
                    $this->session->flashdata('message', '');
                endif;
                ?>
            </div>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 15): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista <?php echo $t->name_menu ?></h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/admin/UsersAdmin/insert">Dodaj korisnika</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ispis">
                            <table style="width: 100%; border: 1px solid; padding: 10px; margin: 10px 10px;">
                                <tr class="border3">
                                    <th class="border text-alignC">Korisničko ime</th>
                                    <th class="border text-alignC">Uloga</th>
                                    <th class="border text-alignC">Akcija</th>
                                </tr>
                                <?php foreach ($user as $u): ?>
                                    <tr class="border">
                                        <td class="border text-alignC" style="padding: 10px"><?php echo $u->name_user ?></td>
                                        <td class="border text-alignC" style="padding: 10px"><?php echo $u->name_role ?></td>
                                        <td class="border text-alignC">
                                            <a href="<?php echo base_url() ?>administration/admin/UsersAdmin/edit/<?php echo $u->id_user ?>">Izmeni</a>
                                            &nbsp;|&nbsp;
                                            <a href="#" class="deleteUser" data-id="<?php echo $u->id_user ?>">Obriši</a>
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