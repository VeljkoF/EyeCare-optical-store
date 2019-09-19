<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 20): ?>
                    <h3><?php echo $t->name_menu; ?></h3>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="about-right" style="box-sizing: border-box;">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 15): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista završenih porudžbina</h2>
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
                        if (!empty($this->session->flashdata('notice'))):
                            $notice = $this->session->flashdata('notice');
                            echo "<script type='text/javascript'>alert('" . $notice . "');</script>";
                        endif;
                        ?>
                        <div id="container" style="margin-top:20px">
                            <!--                            <h4>
                                                            Pretraga svih kupaca: 
                            <?php echo form_open_multipart('', $form_search); ?>
                            <?php echo form_input($form_customer_search); ?>
                                                                <input type="text" name="tbSearch" id="tbSearch" onchange="Search" />
                            <?php echo form_submit($form_search_submit); ?>
                                                                <input type="submit" name="btnSearch" id="btnSearch" value="Pretraga" class="btn-primary" style="padding: 5px; border-radius: 7px;"/>
                            <?php echo form_close(); ?>
                            <?php echo validation_errors('<div class="error">', '</div>'); ?>
                                                        </h4>-->
                            <div id="body2">
                                <?php echo @$message; ?>
                                <?php echo $this->session->flashdata('message'); ?>
                                <?php

                                function timeDiff($orderTime, $nowTime) {
                                    // perform subtraction to get the difference (in seconds) between times
                                    $timeDiff = $nowTime - $orderTime;

                                    // return the difference
                                    return $timeDiff;
                                }
                                ?>
                                <!-- begin panel group -->
                                <div style="margin-top: 60px; margin-bottom: 200px" class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php
                                    for ($i = 0; $i < count($order_list); $i++):
                                        ?>

                                        <!-- panel 1 -->
                                        <div class="panel panel-default" style="margin-top: 5px">
                                            <!--wrap panel heading in span to trigger image change as well as collapse -->
                                            <span class="side-tab" data-target="#tabList<?php echo $order_list[$i]->id_order_list ?>" data-toggle="tab" role="tab" aria-expanded="false">
                                                <div class="panel-heading" role="tab" id="headingList<?php echo $order_list[$i]->id_order_list ?>"data-toggle="collapse" data-parent="#accordion" href="#list<?php echo $order_list[$i]->id_order_list ?>" aria-expanded="false" aria-controls="list<?php $order_list[$i]->id_order_list ?>">
                                                    <h4 class="panel-title"> <?php echo $order_list[$i]->name_customer ?> 
                                                        <div style="float: right"><?php echo $order_list[$i]->name_order_status ?></div></h4>
                                                    <input type="hidden" class="idOrderStatus" value="<?php echo $order_list[$i]->id_order_status ?>"/>


                                                </div>
                                            </span>
                                            <div id="list<?php echo $order_list[$i]->id_order_list ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingList<?php echo $order_list[$i]->id_order_list ?>">
                                                <div class="panel-body">
                                                    <fieldset>
                                                        <table width="100%">
                                                            <tr>
                                                                <td width="50%"></td>
                                                                <td width="50%">
                                                                    <p style="float: right">
                                                                        <?php
                                                                        if (isset($_SESSION['id_role'])):
                                                                            if ($_SESSION['id_role'] == 1):
                                                                                ?>
                                                                                <a href="<?php echo base_url(); ?>/administration/sales/OrderList/delete/<?php echo $order_list[$i]->id_order_list ?>">Obriši</a>
                                                                                <?php
                                                                            endif;
                                                                        endif;
                                                                        ?>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table width="60%">
                                                            <tr>
                                                                <td width="50%">Broj porudžbine: </td>
                                                                <td width="50%"><?php echo $order_list[$i]->id_order_list; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="50%">Datum porudžbine:</td>
                                                                <td width="50%"><?php echo date('d. M. Y.', $order_list[$i]->date_order_list); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="50%">Čeka se: </td>
                                                                <td width="50%">
                                                                    <?php
                                                                    $orderTime = $order_list[$i]->date_order_list;
                                                                    $nowTime = time();

                                                                    $difference = timeDiff($orderTime, $nowTime);
                                                                    $years = abs(floor($difference / 31536000));
                                                                    $days = abs(floor(($difference - ($years * 31536000)) / 86400));
//                                                                    $hours = abs(floor(($difference - ($years * 31536000) - ($days * 86400)) / 3600));
//                                                                    $mins = abs(floor(($difference - ($years * 31536000) - ($days * 86400) - ($hours * 3600)) / 60)); #floor($difference / 60);
                                                                    echo $days . " dana.";
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="50%">Proizvođač: </td>
                                                                <td width="50%"><?php echo $order_list[$i]->name_producer_lens; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="50%">Materijal sočiva: </td>
                                                                <td width="50%"><?php echo $order_list[$i]->name_material_lens; ?></td>
                                                            </tr>
                                                            <tr>
    <?php if ($order_list[$i]->name_name_lens != null): ?>
                                                                    <td width="50%">Tip/Index/Naziv/Dizajn/Dorada sočiva: </td>
                                                                    <td width="50%"><?php echo $order_list[$i]->name_type_lens; ?> / <?php echo $order_list[$i]->name_index_lens; ?> / <?php echo $order_list[$i]->name_name_lens; ?> / <?php echo $order_list[$i]->name_design_lens; ?> / <?php echo $order_list[$i]->name_finishing_lens; ?></td>
    <?php else: ?>
                                                                    <td width="50%">Tip/Index/Dizajn/Dorada sočiva: </td>
                                                                    <td width="50%"><?php echo $order_list[$i]->name_type_lens; ?> / <?php echo $order_list[$i]->name_index_lens; ?> / <?php echo $order_list[$i]->name_design_lens; ?> / <?php echo $order_list[$i]->name_finishing_lens; ?></td>
    <?php endif; ?>
                                                            </tr>
                                                            <tr>
                                                                <td width="50%">Desno-Levo sočivo poručeno: </td>
                                                                <td width="50%">
    <?php echo $order_list[$i]->name_right_left ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table width="100%">
                                                            <tr>
                                                                <?php if ($order_list[$i]->id_right_left == 1): ?>
                                                                    <td width="100%" colspan="2" class="text-alignC border"><b><i>Desno</i></b></td>
                                                                <?php elseif ($order_list[$i]->id_right_left == 2): ?>
                                                                    <td width="100%" colspan="2" class="text-alignC border"><b><i>Levo</i></b></td>
    <?php else: ?>
                                                                    <td width="50%" class="text-alignC  border"><b><i>Desno</i></b></td>
                                                                    <td width="50%" class="text-alignC border"><b><i>Levo</i></b></td>
    <?php endif; ?>
                                                            </tr>
                                                            <tr>
    <?php if ($order_list[$i]->id_right_left == 1): ?>
                                                                    <td width="100%" class="text-alignC ">
                                                                        <table width="100%">
                                                                            <tr>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">SPH</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">CYL</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">ADD</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom border-right">Prečnik</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->distance_od_sph_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->distance_od_cyl_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->add_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom border-right"><?php echo $order_list[$i]->name_diameter_lens ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
    <?php elseif ($order_list[$i]->id_right_left == 2): ?>
                                                                    <td width="100%" class="text-alignC ">
                                                                        <table width="100%">
                                                                            <tr>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">SPH</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">CYL</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">ADD</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom border-right">Prečnik</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->distance_os_sph_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->distance_os_cyl_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->add_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom border-right"><?php echo $order_list[$i]->name_diameter_lens ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
    <?php else: ?>
                                                                    <td width="50%" class="text-alignC ">
                                                                        <table width="100%">
                                                                            <tr>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">SPH</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">CYL</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">ADD</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">Prečnik</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->distance_od_sph_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->distance_od_cyl_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->add_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->name_diameter_lens ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td width="50%" class="text-alignC ">
                                                                        <table width="100%">
                                                                            <tr>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">SPH</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">CYL</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom">ADD</th>
                                                                                <th width="25%" class="text-alignC border-left border-bottom border-right">Prečnik</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->distance_os_sph_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->distance_os_cyl_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom"><?php echo $order_list[$i]->add_form ?></td>
                                                                                <td width="25%" class="text-alignC border-left border-bottom border-right"><?php echo $order_list[$i]->name_diameter_lens ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
    <?php endif; ?>
                                                            </tr>
                                                        </table>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div> 
                                        <!-- / panel 1 -->
<?php endfor; ?>
                                </div> <!-- / panel-group -->
                            </div> <!-- /col-md-4 -->
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