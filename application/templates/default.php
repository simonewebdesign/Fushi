<!-- default template -->

<div class="navbar navbar-inverse navbar-fixed-top">
  <?php include_once INC . 'navbar.php' ?>
</div>
 
<div class="row-fluid">
  <div class="span12">
    <div id="myCarousel" class="carousel slide">
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="active item">
          <img src="<?=ROOT?>img/slide/1c.jpg" alt="">
          <div class="carousel-caption">
            <h1>New Server</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.
            Donec id elit non mi porta gravida at eget metus.</p>
            <a class="btn btn-large btn-success" href="#">Client Download</a>
          </div>
        </div>
        <div class="item"><img src="<?=ROOT?>img/slide/2c.jpg" alt=""></div>
        <div class="item"><img src="<?=ROOT?>img/slide/3c.jpg" alt=""></div>
        <div class="item"><img src="<?=ROOT?>img/slide/4c.jpg" alt=""></div>
        <div class="item"><img src="<?=ROOT?>img/slide/5c.jpg" alt=""></div>        
      </div>
      <!-- Carousel nav -->
      <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!--/ Carousel -->
  </div><!--/span-->
</div><!--/row-->

<hr>

<div class="container-fluid">

  <div class="row-fluid">
    <div class="span4">
      <h2>Heading</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at imperdiet augue.
      Curabitur ornare enim a felis dapibus eleifend.
      Praesent dui velit, tempus sed consequat non, rhoncus et mi.
      Mauris rhoncus sem adipiscing elit iaculis a ornare elit varius. 
      Maecenas enim tortor, eleifend at pharetra ac, egestas nec dui.
      Etiam ultrices, urna a malesuada ullamcorper, odio justo lacinia ante,
      ut volutpat augue ante ac nunc.
      In gravida luctus augue eget consequat. In hac habitasse platea dictumst.
      Etiam in arcu in velit malesuada interdum et ut tortor. </p>
      <p>
        <a class="btn" href="#">Read more &raquo;</a>
      </p>      
    </div>
    <div class="span4">
      <h2>Heading</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at imperdiet augue.
      Curabitur ornare enim a felis dapibus eleifend.
      Praesent dui velit, tempus sed consequat non, rhoncus et mi.
      Mauris rhoncus sem adipiscing elit iaculis a ornare elit varius.
      Maecenas enim tortor, eleifend at pharetra ac, egestas nec dui.
      Etiam ultrices, urna a malesuada ullamcorper, odio justo lacinia ante,
      ut volutpat augue ante ac nunc.
      In gravida luctus augue eget consequat. In hac habitasse platea dictumst.
      Etiam in arcu in velit malesuada interdum et ut tortor. </p>
      <p>
        <a class="btn" href="#">Read more &raquo;</a>
      </p>      
    </div>
    <div class="span4">
      <h2>Heading</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at imperdiet augue.
      Curabitur ornare enim a felis dapibus eleifend.
      Praesent dui velit, tempus sed consequat non, rhoncus et mi.
      Mauris rhoncus sem adipiscing elit iaculis a ornare elit varius.
      Maecenas enim tortor, eleifend at pharetra ac, egestas nec dui.
      Etiam ultrices, urna a malesuada ullamcorper, odio justo lacinia ante,
      ut volutpat augue ante ac nunc.
      In gravida luctus augue eget consequat. In hac habitasse platea dictumst.
      Etiam in arcu in velit malesuada interdum et ut tortor. </p>
      <p>
        <a class="btn" href="#">Read more &raquo;</a>
      </p>
    </div>    
  </div>

  <hr>

  <div class="row-fluid">
    <ul class="thumbnails">
      <li class="span3">
        <div class="thumbnail">
          <img src="<?=ROOT?>img/thumbnails/1c.jpg" alt="">
          <h3>Caption</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at imperdiet augue.
          Curabitur ornare enim a felis dapibus eleifend.</p>
          <p>
            <a class="btn btn-primary" href="#">Action</a>
            <a class="btn" href="#">Action</a>
          </p>        
        </div>
      </li>
      <li class="span3">
        <div class="thumbnail">
          <img src="<?=ROOT?>img/thumbnails/2c.jpg" alt="">
          <h3>Caption</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at imperdiet augue.
          Curabitur ornare enim a felis dapibus eleifend.</p>
          <p>
            <a class="btn btn-primary" href="#">Action</a>
            <a class="btn" href="#">Action</a>
          </p>        
        </div>
      </li>
      <li class="span3">
        <div class="thumbnail">
          <img src="<?=ROOT?>img/thumbnails/3c.jpg" alt="">
          <h3>Caption</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at imperdiet augue.
          Curabitur ornare enim a felis dapibus eleifend.</p>
          <p>
            <a class="btn btn-primary" href="#">Action</a>
            <a class="btn" href="#">Action</a>
          </p>                
        </div>      
      </li>
      <li class="span3">
        <div class="thumbnail">
          <img src="<?=ROOT?>img/thumbnails/4c.jpg" alt="">
          <h3>Caption</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at imperdiet augue.
          Curabitur ornare enim a felis dapibus eleifend.</p>
          <p>
            <a class="btn btn-primary" href="#">Action</a>
            <a class="btn" href="#">Action</a>
          </p>        
        </div>
      </li>  
    </ul>
  </div>
  
  <hr>
  
  <footer>
    <p>Copyleft &copy; <?=YEAR?> <?=$settings['site']['name']?>. All rights reversed.</p>
  </footer>

</div>