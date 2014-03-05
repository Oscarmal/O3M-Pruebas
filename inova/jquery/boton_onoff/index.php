<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../jquery/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="onoff.css">
<script>
$('.slider-button').toggle(function(){ $(this).addClass('on').html('ON'); },function(){ $(this).removeClass('on').html('OFF'); });
</script>
</head>
<body>
<section id="stage">
    
    <div class="slider-frame">
        <span class="slider-button">OFF</span>
    </div>

</section>
</body>
</html>
