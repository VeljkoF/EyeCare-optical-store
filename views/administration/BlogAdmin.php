<!-- tabs -->	<!-- services -->
<div class="line">
</div>
<div class="demo" id="optics">    
    <div class="container"> 
        <div class="w3ls-heading">
            <?php foreach ($title_page as $t): ?>
                <?php if ($t->id_menu == 13): ?>
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
                <?php if ($t->id_menu == 13): ?>
                    <h2 style="text-indent: 20px; text-align: justify">Lista <?php echo $t->name_menu ?></h2>
                <?php endif; ?>
            <?php endforeach; ?>
            <br/>
            <h3 style="text-indent: 20px; text-align: justify"><a  href="<?php echo base_url(); ?>administration/admin/BlogAdmin/insert">Dodaj blog</a></h3>
            <br/>
        </div>
        <div>
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- begin panel group -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php for ($i = 0; $i < count($blog); $i++): ?>
                                <!-- panel 1 -->
                                <div class="panel panel-default">
                                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                                    <span class="side-tab" data-target="#tabOptics<?php echo $blog[$i]->id_blog ?>" data-toggle="tab" role="tab" aria-expanded="false">
                                        <div class="panel-heading" role="tab" id="heading<?php echo $blog[$i]->id_blog ?>"data-toggle="collapse" data-parent="#accordion" href="#optics<?php echo $blog[$i]->id_blog ?>" aria-expanded="false" aria-controls="optics<?php echo $blog[$i]->id_blog ?>">
                                            <h4  class="panel-title">Blog <?php echo $i + 1; ?></h4>
                                        </div>
                                    </span>

                                    <div id="optics<?php echo $blog[$i]->id_blog ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $blog[$i]->id_blog ?>">
                                        <div class="panel-body">
                                            <!-- Tab content goes here -->
                                            <?php
                                            $form_blog = array(
                                                'class' => 'form-group'
                                            );
                                            $form_title_blog = array(
                                                'class' => 'size tbTitleBlog',
                                                'name' => 'tbTitleBlog',
                                                'value' => $blog[$i]->title_blog,
                                                'placeholder' => 'Naslov',
                                                'required' => true,
                                                'data-id' => $blog[$i]->id_blog
                                            );
                                            $form_text_blog = array(
                                                'class' => 'size_textarea taTextBlog',
                                                'name' => 'taTextBlog',
                                                'value' => $blog[$i]->text_blog,
                                                'placeholder' => 'Tekst',
                                                'required' => true,
                                                'data-id' => $blog[$i]->id_blog
                                            );
                                            $form_date_blog = array(
                                                'class' => 'form-control size tbDateBlog',
                                                'type' => 'date',
                                                'name' => 'tbDateBlog',
                                                'value' => @date('Y-m-d', $blog[$i]->date_blog),
                                                'min' => date("Y-m-d"),
                                                'required' => true,
                                                'data-id' => $blog[$i]->id_blog
                                            );
                                            $form_pic_blog = array(
                                                'class' => 'size fPicBlog',
                                                'name' => 'fPicBlog',
                                                'data-id' => $blog[$i]->id_blog
                                            );
                                            $form_update_submit = array(
                                                'name' => 'btnEdit',
                                                'value' => 'Izmeni',
                                                'style' => 'width: 80px; margin-top:10px; font-weight: bold; padding: 7px; border-radius: 10px',
                                                'class' => 'btn-primary'
                                            );
                                            ?>
                                            <?php echo form_open_multipart(base_url() . "administration/admin/BlogAdmin/index/" . $blog[$i]->id_blog, $form_blog); ?>
                                            <table>
                                                <tr>
                                                    <td></td>
                                                    <td> <span style="font-size: 0.8em">* Obavezna polja</span><a style="float: right" href="<?php echo base_url(); ?>/administration/admin/BlogAdmin/delete/<?php echo $blog[$i]->id_blog ?>">Obriši</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Naslov: * </td>
                                                    <td><?php echo form_input($form_title_blog); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="tbTitleBlogCss<?php echo $blog[$i]->id_blog ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Tekst: * </td>
                                                    <td><?php echo form_textarea($form_text_blog); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="taTextBlogCss<?php echo $blog[$i]->id_blog ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Datum: * </td>
                                                    <td><?php echo form_input($form_date_blog); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="tbDateBlogCss<?php echo $blog[$i]->id_blog ?>"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Slika: * </td>
                                                    <td><?php echo form_upload($form_pic_blog); ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span style="color: orangered; font-size: 0.8em; display:none; margin-left: 5px" class="fPicBlogCss<?php echo $blog[$i]->id_blog ?>"></span></td>
                                                </tr>
                                                <tr style="padding-top: 10px">
                                                    <td></td>
                                                    <td><?php echo form_submit($form_update_submit); ?></td>

                                                </tr>
                                            </table>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div> 
                                <!-- / panel 1 -->
                            <?php endfor; ?>
                        </div> <!-- / panel-group -->
                    </div> <!-- /col-md-4 -->
                    <div class="col-md-8">
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <!-- begin macbook pro mockup -->
                        <div class="md-macbook-pro md-glare">
                            <div class="md-lid">
                                <div class="md-camera"></div>
                                <div class="md-screen">
                                    <!-- content goes here -->                
                                    <div class="tab-featured-image">
                                        <div class="tab-content">
                                            <?php for ($i = 0; $i < count($blog); $i++): ?>
                                                <?php if (isset($blog[$i]->pic_blog)): ?>
                                                    <div class="tab-pane" id="tabOptics<?php echo $blog[$i]->id_blog ?>">
                                                        <img style="width: 350px" src="<?php echo base_url() ?>images/blog/<?php echo $blog[$i]->pic_blog ?>" alt="<?php echo $blog[$i]->title_blog ?>" class="img img-responsive">
                                                    </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md-base"></div>
                        </div> <!-- end macbook pro mockup -->
                    </div> <!-- / .col-md-8 -->
                </div> <!--/ .row -->
            </div> <!-- end sidetab container -->
        </div>
    </div>
</div>
<!-- //tabs -->    <!-- services -->