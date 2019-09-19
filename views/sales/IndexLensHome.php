<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 23): ?>
                    <h3><?php echo $t->name_menu; ?> / Index sočiva</h3>
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
                    <h2 style="text-indent: 20px; text-align: justify">Lista indexa sočiva</h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/OtherSales">Nazad</a></h3>
            <br>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url() ?>administration/sales/IndexLensSales/insert">Dodaj novo index sočiva</a></h3>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo @$message; ?>
                        <?php echo $this->session->flashdata('message'); ?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <table style="width: 400px; margin: 0px auto; padding: 10px; margin-bottom: 110px; margin-top: 60px">
                            <th colspan="2" style="padding: 10px" class="text-alignC">Naziv index sočiva</th>
                            <th colspan="3" style="padding: 10px" class="text-alignC">Akcija</th>
                            <?php foreach ($index_lens as $s): ?>
                                <tr>
                                    <td colspan="2" style="padding: 15px" class="border text-alignC"><?php echo $s->name_index_lens ?></td>
                                    <td colspan="3" style="padding: 15px" class="border text-alignC">
                                        <a href="<?php echo base_url() ?>administration/sales/IndexLensSales/edit/<?php echo $s->id_index_lens ?>">Izmeni</a> 
                                        &nbsp;|&nbsp;
                                        <a href="<?php echo base_url() ?>administration/sales/IndexLensSales/delete/<?php echo $s->id_index_lens ?>">Obriši</a>
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