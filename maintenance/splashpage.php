<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Anne Neilson Home</title>

<?php 
// Set the url
$tempurl = get_bloginfo('template_url');
$url = $tempurl.'/maintenance';
?>
<link href="<?php echo $url; ?>/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="container">
  
  <div class="image1">Anne Neilson</div><!-- image1 -->

	<div class="clear"></div>

    <div class="image2">
        <a href="https://store.anneneilsonfineart.com/">
            <img src="<?php echo $url; ?>/images/anne-neilson-shop-now.jpg" />
        </a>
    </div><!-- image2 -->

<div class="clear"></div>

    <div id="socialfooter">
        <ul>
            <li class="facebook"><a href="https://www.facebook.com/anneneilsonfineart">Follow Us on Facebook</a></li>
            <li class="twitter"><a href="https://twitter.com/anneneilson">Follow Us on Facebook</a></li>
            <li class="instagram"><a href="https://instagram.com/anneneilsonfineart">Follow Us on Facebook</a></li>
            <li class="pintrest"><a href="https://www.pinterest.com/anneneilson1234">Follow Us on Facebook</a></li>
        </ul>
    </div><!-- social footer -->
    
</div><!-- container -->   

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63750049-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
