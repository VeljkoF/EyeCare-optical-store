<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 16): ?>
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
                <?php if ($t->id_menu == 16): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista <?php echo $t->name_menu ?></h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table style="width: 100%; border: 1px solid; padding: 10px; margin: 10px 10px;">
                            <tr class="border3">
                                <th class="border text-alignC">Naslov meni</th>
                                <th class="border text-alignC">Podmeni</th>
                                <th class="border text-alignC">Akcija</th>
                            </tr>
                            <?php foreach ($allmenu as $a): ?>
                                <tr class="border">
                                    <td class="border text-alignC" style="padding: 10px"><?php echo $a->name_menu ?></td>
                                    <td class="border text-alignC" style="padding: 10px">
                                        <?php
                                        if ($a->parent != 0):
                                            foreach ($allmenu as $m):
                                                if ($a->parent == $m->id_menu):
                                                    echo $m->name_menu;
                                                endif;
                                            endforeach;
                                        else:
                                            echo "/";
                                        endif;
                                        ?>
                                    </td>
                                    <td class="border text-alignC">
                                        <a href="<?php echo base_url() ?>administration/admin/MenuAdmin/edit/<?php echo $a->id_menu ?>">Izmeni</a>
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