<!-- contact -->
<div class="line">
</div>
<div class="contact" id="contact">
    <div class="container">
        <div class="w3ls-heading">
            <?php foreach ($menu as $m): ?>
                <?php if ($m->id_menu == 7): ?>
                    <h3><?php echo $m->name_menu; ?></h3>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="contact-top-grids">
            <div class="col-md-6 contact-left-">
                <div class="left-top" style="padding:70px">
                    <h4 style="padding: 0px 0px 20px 0px">Kontakt informacije</h4>
					<ul style="color: white; padding: 0px 0px 20px 50px">
						<li style="padding-bottom: 20px"><strong><?php echo $company[0]->working_days_company ?>:<span class="dot"></strong><?php echo $company[0]->working_time_company ?></span></li>
						<li style="padding-bottom: 20px"><strong>Adresa:<span class="dot1"></strong><?php echo $company[0]->address_company ?>, <?php echo $company[0]->city_company ?></span></li>
						<li style="padding-bottom: 20px"><strong>Telefona:<span class="dot2"></strong><?php echo $company[0]->phone_company ?></span></li>
						<li style="padding-bottom: 20px"><strong>Email:<span class="dot3"></strong><a href="mailto:<?php echo $company[0]->mail_company ?>"><?php echo $company[0]->mail_company ?></a></span></li>
					<ul>
                </div>
            </div>
            <div class="col-md-6 contact-right">
                <iframe src="https://maps.google.com/maps?q=27%20marta%2024&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
<!--                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.296948478801!2d-87.70494908450506!3d41.88647047922158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e32a54d21f20f%3A0x51b98b6ffbdca819!2sW+Fulton+St%2C+Chicago%2C+IL%2C+USA!5e0!3m2!1sen!2sin!4v1489574334335"></iframe>-->
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="contact-w3ls">
            <form method="post" name="formContact">
                <div class="col-md-7 col-sm-7 contact-left agileits-w3layouts">
                    <table style="width:100%">
                        <tr><td><input type="text" name="tbName" id="tbName" placeholder="Ime*" required=""></td></tr>
                        <tr><td><span style="color: orangered; font-size: 0.8em; display:none; margin: -10px 0px 5px 0px;" id="tbNameCss"></span></td></tr>
                        <tr><td><input type="email"  class="email" name="tbMail" id="tbMail" placeholder="Mail*" required=""></td></tr>
                        <tr><td><span style="color: orangered; font-size: 0.8em; display:none; margin: -10px 0px 5px 0px;" id="tbMailCss"></span></td></tr>
                        <tr><td><input type="text" name="tbPhone" id="tbPhone" placeholder="Broj Telefona" ></td></tr>
                        <tr><td><span style="color: orangered; font-size: 0.8em; display:none; margin: -10px 0px 5px 0px;" id="tbPhoneCss"></span></td></tr>
                        <!-- <input type="text" class="email" name="Last Name" placeholder="Last Name" required=""> -->
                    </table>
                </div> 
                <div class="col-md-5 col-sm-5 contact-right agileits-w3layouts">
                    <table style="width:100%">
                        <tr><td><textarea name="taMessage" id="taMessage" placeholder="Poruka*" required=""></textarea></td></tr>
                        <tr><td><span style="color: orangered; font-size: 0.8em; display:none; margin:0px;" id="taMessageCss"></span></td></tr>
                        <tr>
                            <td>
                                <span style="font-size: 0.8em">* Obavezna polja</span>
                                <input type="submit" name="btnSend" id="btnSend" value="Pošalji">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="clearfix"> </div> 
            </form>
        </div>  

    </div>
</div>
<!-- //contact -->