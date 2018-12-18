<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bootstrap Carousel Fullscreen</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>

  <style>
    h5 {
    display: inline-block;
    padding: 10px;
    background: #B9121B;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    }

    .full-screen {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    }
  </style>


</head>

<body>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="carousel-item">
      <img class="d-block w-100" src="https://1.bp.blogspot.com/-eL9M3G3cgJA/WjkqHfrU51I/AAAAAAAAACg/4VuEmm0mrogZyDYMzTk2J-Z1J590a77CACLcBGAs/s1600/4.jpg" data-color="lightblue" alt="First Image">
      <div class="carousel-caption d-md-block">
        <h5>Reinaldo Sebastian Gunawan</h5>
        <h5>311610015</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://1.bp.blogspot.com/-5pG_a8v9o7A/Wjn6bZPCtpI/AAAAAAAAADc/lHiObkkYpvMafrQqwq1zwHYXM9x1JmKrQCLcBGAs/s1600/4.jpg" data-color="firebrick" alt="Second Image">
      <div class="carousel-caption d-md-block">
        <h5>Kevin Christian Chandra</h5>
        <h5>311610010</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://2.bp.blogspot.com/-dQ32Brdla18/WjkpmrZaFoI/AAAAAAAAACY/WcqfF44xqi8Mhwm64NpDn980-4KKoVfQwCEwYBhgL/w1200-h630-p-k-no-nu/2.jpg" data-color="violet" alt="Third Image">
      <div class="carousel-caption d-md-block">
        <h5>Fernandito Yoga Danny C.P</h5>
        <h5>311610006</h5>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://unpkg.com/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>



    <script>
    var $item = $('.carousel-item');
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight);
$item.addClass('full-screen');

$('.carousel img').each(function() {
var $src = $(this).attr('src');
var $color = $(this).attr('data-color');
$(this).parent().css({
  'background-image' : 'url(' + $src + ')',
  'background-color' : $color
});
$(this).remove();
});

$(window).on('resize', function (){
$wHeight = $(window).height();
$item.height($wHeight);
});

$('.carousel').carousel({
interval: 6000,
pause: "false"
});
    </script>




</body>

</html>
