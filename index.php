<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tanna Enterprise</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click();>
                 Tanna Enterprises</a>

            </li>

            <!--<li>
                <a href="#top" onclick = $("#menu-close").click();><i class="fa fa-home"></i> Home</a>
            </li>-->
            <li>
                <a href="#about" onclick = $("#menu-close").click();> About</a>
            </li>
            <li>
                <a href="#services" onclick = $("#menu-close").click();> Services</a>
            </li>
            <li>
                <a href="#portfolio" onclick = $("#menu-close").click();> Our Work</a>
            </li>
            <li>
                <a href="#contact" onclick = $("#menu-close").click();> Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>TANNA</h1>
            <h2> ENTERPRISES</h2>
            <h3><i>Design for a better world...</i></h3>
            <br>
            <a href="#about" class="btn btn-dark btn-lg">Find Out More</a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About Us</h2>
                    <p class="lead">This theme features some wonderful photography courtesy of <a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a>.</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Our Services</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                            </span>
								
                                <h4>
                                    <strong>Service Name1</strong>
                                </h4>
                                <p>1Lorem ipsum dolor sit amet1, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-compass fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name2</strong>
                                </h4>
                                <p>2Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-flask fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name3</strong>
                                </h4>
                                <p>3Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-shield fa-stack-1x text-primary"></i>
								</span>
                                <h4>
                                    <strong>Service Name4</strong>
                                </h4>
                                <p>4Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
								
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    <aside class="callout">
        <div class="text-vertical-center">
            <h1></h1>
        </div>
    </aside>

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Our work</h2>
                    <hr class="small">
                    <div class="row">
                        <?php 
                            mysql_connect("localhost","root","");
                            mysql_select_db("Test");
                            $get_data= "select image_title, image_name, description from images";
                            $result = mysql_query($get_data);
                            $num_of_rows= mysql_num_rows($result);

                            for($num=1;$num<=$num_of_rows;$num++)
                            {
                                $row= mysql_fetch_array($result);
                                if($num <=4){
                        ?>
                                    <div class='col-md-6'>
                                        <div class='portfolio-item'> 
                                            <a class='thumbnail' href='#' data-image-id="<?php echo $row['image_id'] ?>" data-toggle='modal' 
                                                data-title="<?php echo $row['image_title'] ?>" data-caption="<?php echo $row['description'] ?>" 
                                                data-image="<?php echo $row["image_name"] ?>" data-target='#image-gallery'> 
                                                    <img class='img-responsive img-portfolio' src="<?php echo $row["image_name"] ?>" alt='Short alt text'>
                                            </a>
                                        </div>
                                    </div>
                        <?php
                                } //if loop end
                                else{ 
                        ?>             
                                    <div id="panel">
                                        <div class='col-md-6'>
                                            <div class='portfolio-item'> 
                                                <a class='thumbnail' href='#' data-image-id="<?php echo $row['image_id'] ?>" data-toggle='modal' 
                                                    data-title="<?php echo $row['image_title'] ?>" data-caption="<?php echo $row['description'] ?>" 
                                                    data-image="<?php echo $row["image_name"] ?>" data-target='#image-gallery'> 
                                                        <img class='img-responsive img-portfolio' src="<?php echo $row["image_name"] ?>" alt='Short alt text'>
                                                </a>
                                            </div>
                                        </div>
                                    </div> 
                        <?php
                                } //else end     
                                
                            } //for loop end
                            mysql_close();
                        ?>
                    </div>
					<!-- /.row (nested) -->
					
					<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
									<b><h3 class="modal-title text-left" id="image-gallery-title"></h3></b><br>
										<img id="image-gallery-image" class="img-responsive" src="" width="100%">
									<br>
									<p>
										<div class="text-justify" id="image-gallery-caption">
										</div>
									</p>
								</div>

								<div class="modal-footer">
									<div class="col-md-1">
										<button type="button" class="btn btn-dark" id="show-previous-image"> <i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i></button>
									</div>	
									<div class="col-md-9">
									</div>
									<div class="col-md-2">
										<button type="button" class="btn btn-dark" id="show-next-image"><i class="fa fa-chevron-right fa-lg" aria-hidden="true"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <input type="button" id="viewMore" class="btn btn-dark" value="View More"/>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Call to Action 
    <aside class="call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>The buttons below are impossible to resist.</h3>
                    <a href="#" class="btn btn-lg btn-light">Click Me!</a>
                    <a href="#" class="btn btn-lg btn-dark">Look at Me!</a>
                </div>
            </div>
        </div>
    </aside>-->

    <!-- Map -->
    <!--<section id="contact" class="map">
       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2239.792026112881!2d72.86858858814284!3d19.244663419208788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1467960433628" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small>
        </iframe>
    </section>-->

    <!-- Footer -->
    <footer class="bg-primary" id="contact">
        <div class="container ">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h3><strong>TANNA ENTERPRISE</strong>
                    </h3>
                    <!--<p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>-->
                    <ul class="list-unstyled">
                        <!--<li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li>-->
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">name@example.com</a>
                        </li>
                    </ul>
                    
                    <!--<ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>-->
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Tanna Enterprise</p>
					
                </div>
            </div>
			
        </div>	
    </footer>
	<a href="#top" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>
    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			loadGallery(true, 'a.thumbnail');
			//This function disables buttons when needed
			function disableButtons(counter_max, counter_current){
				$('#show-previous-image, #show-next-image').show();
				if(counter_max == counter_current){
					$('#show-next-image').hide();
				} else if (counter_current == 1){
					$('#show-previous-image').hide();
				}
			}

			function loadGallery(setIDs, setClickAttr){
				var current_image,
					selector,
					counter = 0;

				$('#show-next-image, #show-previous-image').click(function(){
					if($(this).attr('id') == 'show-previous-image'){
						current_image--;
					} else {
						current_image++;
					}

					selector = $('[data-image-id="' + current_image + '"]');
					updateGallery(selector);
				});

				function updateGallery(selector) {
					var $sel = selector;
					current_image = $sel.data('image-id');
					$('#image-gallery-caption').text($sel.data('caption'));
					$('#image-gallery-title').text($sel.data('title'));
					$('#image-gallery-image').attr('src', $sel.data('image'));
					disableButtons(counter, $sel.data('image-id'));
				}

				if(setIDs == true){
					$('[data-image-id]').each(function(){
						counter++;
						$(this).attr('data-image-id',counter);
					});
				}
				$(setClickAttr).on('click',function(){
					updateGallery($(this));
				});
			}
		});
	</script>
			
		

    <!-- Custom Theme JavaScript -->
    <script>
	
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });

    $('#viewMore').click(function()
    {   
        $("#panel").toggle();
        //$('#viewMore').hide();   
    });
    </script>

</body>

</html>
