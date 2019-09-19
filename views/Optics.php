<!-- about -->
<div class="line">
</div>
<div class="about" id="optics">
    <div class="container">
        <?php foreach ($text as $t): ?>
            <?php if ($t->id_menu == 2): ?>
                <div class="w3ls-heading">
                    <?php foreach ($menu as $m): ?>
                        <?php if ($m->id_menu == 2): ?>
                            <h3><?php echo $m->name_menu; ?></h3>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php if ($t->pic_text_site != ''): ?>
                    <div class="col-md-6 about-left">
                        <div class="w3labout-img boxw3-agile"> 
                            <img src="<?php echo base_url(); ?>images/<?php echo $t->pic_text_site ?>" alt="<?php echo $t->title_text_site ?>" class="img-responsive" />
                            <div class="agile-caption">
                                <h4 style="color:orange">Optika <?php echo $company[0]->name_company_1; ?> <?php echo $company[0]->name_company_2; ?></h4>
                                <br>
                                <p>ul. <?php echo $company[0]->address_company; ?>, <?php echo $company[0]->city_company; ?>
                                    <br>
                                    Radno vreme: <?php echo $company[0]->working_days_company; ?>: <?php echo $company[0]->working_time_company; ?></p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6 about-right">
                        <?php if ($t->title_text_site != ''): ?>
                            <h2><?php echo $t->title_text_site; ?></h2>
                        <?php endif ?>
                        <?php if ($t->text_text_site_1 != ''): ?>
                            <p style="text-indent: 50px; color: black; text-align: justify"><?php echo $t->text_text_site_1 ?></p>
                        <?php endif; ?>
                        <?php if ($t->text_text_site_2 != ''): ?>
                            <p style="text-indent: 50px; color: black; text-align: justify"><?php echo $t->text_text_site_2; ?>
                            <?php endif; ?>
                        <ul style="padding-left: 80px; text-align: justify">
                            <?php foreach ($list as $l): ?>
                                <?php if ($l->id_text_site == $t->id_text_site): ?>
                                    <li style="padding-bottom: 5px"><?php echo $l->item_list_site; ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        </p>
            <!--                    <a href="#myModal" class="w3more" data-toggle="modal"><i class="fa fa-mail-forward" aria-hidden="true"></i> Više</a>-->
                    </div>
                    <div class="clearfix"></div>
                <?php else: ?>
                    <div class="col-md-12 about-right">
                        <?php if ($t->title_text_site != ''): ?>
                            <h2><?php echo $t->title_text_site; ?></h2>
                        <?php endif ?>
                        <?php if ($t->text_text_site_1 != ''): ?>
                            <p style="text-indent: 50px; color: black; text-align: justify"><?php echo $t->text_text_site_1 ?></p>
                        <?php endif; ?>
                        <?php if ($t->text_text_site_2 != ''): ?>
                            <p style="text-indent: 50px; color: black; text-align: justify"><?php echo $t->text_text_site_2; ?>
                            <?php endif; ?>
                        <ul style="padding-left: 80px; text-align: justify">
                            <?php foreach ($list as $l): ?>
                                <?php if ($l->id_text_site == $t->id_text_site): ?>
                                    <li style="padding-bottom: 5px"><?php echo $l->item_list_site; ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        </p>
            <!--                    <a href="#myModal" class="w3more" data-toggle="modal"><i class="fa fa-mail-forward" aria-hidden="true"></i> Više</a>-->
                    </div>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<!-- //about -->
<!-- modal --><!-- for pop up -->
<!--<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="span2" aria-hidden="true">&times;</span></button>						
                <h4 class="modal-title">Laboratorija za ugradnju i popravku</h4>
            </div> 
            <div class="modal-body">
                <div class="agileits-w3layouts-info">
                    <img src="<?php echo base_url(); ?>images/mr-orange-2.jpg" alt="mr_orange" />
                    <p style="text-indent: 30px; text-align: justify">Saradjujemo sa proizvodjačima najboljih dioptrijskih stakala u svetu i zemilji. Bilo da su Vam potrebna lagana i estetski prihvatljiva stakla, stakla otporna na lom, manji odbljesak ili visoka zaštita od UV zračenja (E-SPF: eye sun protection factor), bićemo u mogućnosti da pruzimo stručan savet i rešimo zahtev.</p>
                    <p style="text-indent: 30px; text-align: justify"><a href="https://www.essilor.com/en/">www.essilor.com</a></p>
                    <p style="text-indent: 30px; text-align: justify"><a href="http://www.poloptic.com/">www.poloptic.com</a></p>
                    <p style="text-indent: 30px; text-align: justify">Okoioko optika ima zaposlenog savremeno edukovanog optičara koji će sa entuzijazmom pristupiti rešavanju i najmanjeg problema. Posedujemo kvalitetan alat kao i lager rezervnih delova.</p>
                    <p style="text-indent: 30px; text-align: justify">Eye Care optika je obogatila svoju laboratoriju Essilor mašinama najnovije generacije: Mr Orange i Mr Blue skener. Zahvaljujući mnogobrojnim opcijama ovih mašina u mogućnosti smo da vam garantujemo vrhunsku preciznost ugradnje svih vrsta stakala u sve vrste ramova.</p>
                    <p style="text-indent: 30px; text-align: justify"><b>MR ORANGE</b></p>
                    <p style="text-indent: 30px; text-align: justify">Ova savršena mašina brusi, narezuje, buši i polira sve vrste materijala od kojih se proizvode sočiva (stakla).</p>
                    <p style="text-indent: 30px; text-align: justify"><a href="https://www.youtube.com/watch?v=lHRvA2bJjBo">Pogledaj video</a></p>
                    <p style="text-indent: 30px; text-align: justify"><b>LENSMETER VISIONIX VL3000</b></p>
                    <p style="text-indent: 30px; text-align: justify">Lensmeter Visionix VL3000 omogućava brzo merenje jačine ugradjenih stakala/plastike odnosno polu tvrdih kontaktnih sočiva i automatsko skeniranje progresivnih naočara.</p>
                    <p style="text-indent: 30px; text-align: justify"><a href="http://www.luneau.fr/medias/docs/produits/233.pdf">Više detalja</a></p>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- //modal --><!-- //for pop up -->