<!-- Laboratories -->
<div class="line">
</div>
<div class="laboratories" id="cabinet">
    <div class="container">
        <?php foreach ($text as $t): ?>
            <?php if ($t->id_menu == 5): ?>
                <div class="w3ls-heading">
                    <?php foreach ($menu as $m): ?>
                        <?php if ($m->id_menu == 5): ?>
                            <h3><?php echo $m->name_menu; ?></h3>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php if ($t->text_text_site_1 != ''): ?>
                    <p style="text-indent: 50px; text-align: justify; margin-top: 20px"><?php echo $t->text_text_site_1; ?></p>
                <?php endif; ?>
                <?php if ($t->pic_text_site != ''): ?>
                    <div style="width: 70%; margin: 0px auto">
                        <img src="<?php echo base_url(); ?>images/<?php echo $t->pic_text_site ?>" alt="<?php echo $t->title_text_site ?>"/>
                    </div>
                <?php endif; ?>
                <br/>
                <?php if ($t->text_text_site_2 != ''): ?>
                    <p style="text-indent: 50px; text-align: justify; padding-bottom: 10px"><?php echo $t->text_text_site_2; ?>
                    <?php endif; ?>
                <ul style="padding-left: 80px; text-align: justify">
                    <?php foreach ($list as $l): ?>
                        <?php if ($l->id_text_site == $t->id_text_site): ?>
                            <li style="padding-bottom: 5px"><?php echo $l->item_list_site; ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                </ul>
                </p>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<!-- //Laboratories	-->