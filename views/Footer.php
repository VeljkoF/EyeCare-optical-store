<!-- copyright -->
        <div class="copyright-agile">
            <p>&copy; 2019 Eye Care | Dizajn Veljko Fridl</p>
        </div>
        <!-- //copyright -->
            
            
            
        <script src="<?php echo base_url();?>js/easy-responsive-tabs.js"></script>
        <script>
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true,   // 100% fit in a container
                    closed: 'accordion', // Start closed if in accordion view
                    activate: function(event) { // Callback function if tab is switched
                        var $tab = $(this);
                        var $info = $('#tabInfo');
                        var $name = $('span', $info);
                        $name.text($tab.text());
                        $info.show();
                    }
                });
                $('#verticalTab').easyResponsiveTabs({
                    type: 'vertical',
                    width: 'auto',
                    fit: true
                });
            });
        </script>
            
            
            
            
            
        <!--banner Slider starts Here-->
        <script src="<?php echo base_url();?>js/responsiveslides.min.js"></script>
        <script>
            // You can also use "$(window).load(function() {"
            $(function () {
                // Slideshow 4
                $("#slider3").responsiveSlides({
                    auto: true,
                    pager:true,
                    nav:false,
                    speed: 500,
                    namespace: "callbacks",
                    before: function () {
                        $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                        $('.events').append("<li>after event fired.</li>");
                    }
                });
                
            });
        </script>
            
        <!--banner Slider starts Here-->
        <!--start-date-piker-->
        <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" />
        <script src="<?php echo base_url();?>js/jquery-ui.js"></script>
        <script>
            $(function() {
                $( "#datepicker" ).datepicker();
            });
        </script>
        <!--/End-date-piker-->
            
        <!-- js for smooth scrollings -->
        <script src="<?php echo base_url();?>js/SmoothScroll.min.js"></script>
        <!-- js for smooth scrollings -->
            
        <!-- flexisel -->
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.flexisel.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo1").flexisel({
                    visibleItems: 3,
                    animationSpeed: 1000,
                    autoPlay: false,
                    autoPlaySpeed: 3000,    		
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: { 
                        portrait: { 
                            changePoint:480,
                            visibleItems: 1
                        }, 
                        landscape: { 
                            changePoint:640,
                            visibleItems:2
                        },
                        tablet: { 
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });
                
            });
        </script>
        <!-- //flexisel -->
            
        <!-- start-smooth-scrolling -->
        <script type="text/javascript" src="<?php echo base_url();?>js/move-top.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){		
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
        <!-- start-smooth-scrolling -->
        <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                                var defaults = {
                                containerID: 'toTop', // fading element id
                                containerHoverID: 'toTopHover', // fading element hover id
                                scrollSpeed: 1200,
                                easingType: 'linear' 
                                };
                 */
                
                $().UItoTop({ easingType: 'easeOutQuart' });
                
            });
        </script>
        <!-- //here ends scrolling icon -->
            
            
        <!-- Scrolling Nav JavaScript --> 
        <script src="<?php echo base_url();?>js/scrolling-nav.js"></script>  
        <!-- //fixed-scroll-nav-js --> 
            
            
    </body>
</html>