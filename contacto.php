<?php include('header.php') ?>
<body class="bg-blanco">
  <div class="container">
<!--    <h3 class="visible-xs">contacto</h3> -->
    <div class="row">
        <section class="contacto ">

          <div class="content_contacto clearfix">
            <img class="img-responsive center-block hidden-xs" src="assets/img/logo125.png" alt="">
            <img class="img-responsive center-block visible-xs" src="assets/img/logo125.png" alt="">
            <div class="heading_contacto">
              <h3>¿TIENES ALGO QUE DECIR? </h3>
              <p>ESCRÍBENOS ACÁ</p>
            </div>
            <div class="row">
	        	    <div class="col-sm-12">
					         <?php include('include-form-contacto.php'); ?>
	             	</div>
            </div>

          </div><!-- content contacto -->
        </section> <!-- contacto -->
    </div><!-- row -->
  </div> <!-- container -->
<?php include('footer.php') ?>

