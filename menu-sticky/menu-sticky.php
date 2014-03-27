<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../common/css/estructura.css" />
    <script src="http://localhost/common/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://localhost/common/js/jquery.sticky.js"></script>
<script type="text/javascript">
    // Llamado cuando se cargue la página
    //posicionarMenu();

    // $(window).scroll(function() {    
    //     posicionarMenu();
    // });

    // function posicionarMenu() {
    //     var altura_del_header = $('header').outerHeight(true);
    //     var altura_del_menu = $('#menu').outerHeight(true);
    //     if ($(window).scrollTop() >= altura_del_header){
    //         $('#menu').addClass('fixed');
    //         $('.content').css('margin-top', (altura_del_menu) + 'px');
    //     } else {
    //         $('#menu').removeClass('fixed');
    //         $('.content').css('margin-top', '0');
    //     }
    // }
     $(window).load(function(){
      $("#menu").sticky({ topSpacing: 0, center:false, className:"sticker" });
    });
</script>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>

    <div class="container">

    <header> 
        <p> Esta es la cabecera: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque.</p>
    </header>  

    <div id="menu">
        <nav>
            <ul>
                <li><a href="#">Opción 1</a></li>
                <li><a href="#">Opción 2</a></li>
                <li><a href="#">Opción 3</a></li>
                <li><a href="#">Opción 4</a></li>
                <li><a href="#">Opción 5</a></li>
                <li><a href="#">Opción 6</a></li>
            </ul>
        </nav>    
    </div>

    <div class="content">  

        <h1>No olvides visitar <a href="http://tuts.widget-pc.com">Widget 101</a></h1>    

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Nam sed ante pharetra arcu rutrum sagittis et sit amet metus. Aenean vel sapien ut odio vestibulum viverra vel vel nisl. Sed pretium ligula non justo convallis ac tincidunt eros suscipit. Mauris dignissim ultricies purus non pulvinar. Suspendisse id egestas sem. Quisque tempus elit non sem facilisis lobortis. Vestibulum massa tellus, elementum in viverra ac, pharetra eget ligula. Aenean vulputate condimentum libero, sed tincidunt neque mollis quis. Duis vitae ante sed lorem scelerisque eleifend. Etiam pretium blandit nisi sit amet laoreet.</p>

        <h1>Cómo hacer un Sticky Menu</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Nam sed ante pharetra arcu rutrum sagittis et sit amet metus. Aenean vel sapien ut odio vestibulum viverra vel vel nisl. Sed pretium ligula non justo convallis ac tincidunt eros suscipit. Mauris dignissim ultricies purus non pulvinar. Suspendisse id egestas sem. Quisque tempus elit non sem facilisis lobortis. Vestibulum massa tellus, elementum in viverra ac, pharetra eget ligula. Aenean vulputate condimentum libero, sed tincidunt neque mollis quis. Duis vitae ante sed lorem scelerisque eleifend. Etiam pretium blandit nisi sit amet laoreet.</p>

        <h1>Esto es contenido de relleno</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Nam sed ante pharetra arcu rutrum sagittis et sit amet metus. Aenean vel sapien ut odio vestibulum viverra vel vel nisl. Sed pretium ligula non justo convallis ac tincidunt eros suscipit. Mauris dignissim ultricies purus non pulvinar. Suspendisse id egestas sem. Quisque tempus elit non sem facilisis lobortis. Vestibulum massa tellus, elementum in viverra ac, pharetra eget ligula. Aenean vulputate condimentum libero, sed tincidunt neque mollis quis. Duis vitae ante sed lorem scelerisque eleifend. Etiam pretium blandit nisi sit amet laoreet.</p>
        
        <p>Aliquam sed euismod mauris. In hendrerit, erat dignissim tristique iaculis, lacus lacus imperdiet nisi, non auctor leo nibh vitae erat. Nulla molestie, velit et sollicitudin dapibus, lectus orci porta lacus, id iaculis justo sem non odio. Maecenas consectetur pharetra nisl, vitae porta nibh varius sed. In pharetra, sem a vulputate pellentesque, arcu sem varius enim, at laoreet justo dui dictum dolor. Aliquam consequat feugiat est, eu malesuada massa consequat eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus sit amet vehicula sem. Praesent augue enim, ullamcorper id convallis ultrices, egestas et nunc.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Nam sed ante pharetra arcu rutrum sagittis et sit amet metus. Aenean vel sapien ut odio vestibulum viverra vel vel nisl. Sed pretium ligula non justo convallis ac tincidunt eros suscipit. Mauris dignissim ultricies purus non pulvinar. Suspendisse id egestas sem. Quisque tempus elit non sem facilisis lobortis. Vestibulum massa tellus, elementum in viverra ac, pharetra eget ligula. Aenean vulputate condimentum libero, sed tincidunt neque mollis quis. Duis vitae ante sed lorem scelerisque eleifend. Etiam pretium blandit nisi sit amet laoreet.</p>
        
        <p>Aliquam sed euismod mauris. In hendrerit, erat dignissim tristique iaculis, lacus lacus imperdiet nisi, non auctor leo nibh vitae erat. Nulla molestie, velit et sollicitudin dapibus, lectus orci porta lacus, id iaculis justo sem non odio. Maecenas consectetur pharetra nisl, vitae porta nibh varius sed. In pharetra, sem a vulputate pellentesque, arcu sem varius enim, at laoreet justo dui dictum dolor. Aliquam consequat feugiat est, eu malesuada massa consequat eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus sit amet vehicula sem. Praesent augue enim, ullamcorper id convallis ultrices, egestas et nunc.</p>

        <h1>Esto es un título</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Nam sed ante pharetra arcu rutrum sagittis et sit amet metus. Aenean vel sapien ut odio vestibulum viverra vel vel nisl. Sed pretium ligula non justo convallis ac tincidunt eros suscipit. Mauris dignissim ultricies purus non pulvinar. Suspendisse id egestas sem. Quisque tempus elit non sem facilisis lobortis. Vestibulum massa tellus, elementum in viverra ac, pharetra eget ligula. Aenean vulputate condimentum libero, sed tincidunt neque mollis quis. Duis vitae ante sed lorem scelerisque eleifend. Etiam pretium blandit nisi sit amet laoreet.</p>
        
        <p>Aliquam sed euismod mauris. In hendrerit, erat dignissim tristique iaculis, lacus lacus imperdiet nisi, non auctor leo nibh vitae erat. Nulla molestie, velit et sollicitudin dapibus, lectus orci porta lacus, id iaculis justo sem non odio. Maecenas consectetur pharetra nisl, vitae porta nibh varius sed. In pharetra, sem a vulputate pellentesque, arcu sem varius enim, at laoreet justo dui dictum dolor. Aliquam consequat feugiat est, eu malesuada massa consequat eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus sit amet vehicula sem. Praesent augue enim, ullamcorper id convallis ultrices, egestas et nunc.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Nam sed ante pharetra arcu rutrum sagittis et sit amet metus. Aenean vel sapien ut odio vestibulum viverra vel vel nisl. Sed pretium ligula non justo convallis ac tincidunt eros suscipit. Mauris dignissim ultricies purus non pulvinar. Suspendisse id egestas sem. Quisque tempus elit non sem facilisis lobortis. Vestibulum massa tellus, elementum in viverra ac, pharetra eget ligula. Aenean vulputate condimentum libero, sed tincidunt neque mollis quis. Duis vitae ante sed lorem scelerisque eleifend. Etiam pretium blandit nisi sit amet laoreet.</p>
        
        <p>Aliquam sed euismod mauris. In hendrerit, erat dignissim tristique iaculis, lacus lacus imperdiet nisi, non auctor leo nibh vitae erat. Nulla molestie, velit et sollicitudin dapibus, lectus orci porta lacus, id iaculis justo sem non odio. Maecenas consectetur pharetra nisl, vitae porta nibh varius sed. In pharetra, sem a vulputate pellentesque, arcu sem varius enim, at laoreet justo dui dictum dolor. Aliquam consequat feugiat est, eu malesuada massa consequat eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus sit amet vehicula sem. Praesent augue enim, ullamcorper id convallis ultrices, egestas et nunc.</p>

        <h1>Este es otro título</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Nam sed ante pharetra arcu rutrum sagittis et sit amet metus. Aenean vel sapien ut odio vestibulum viverra vel vel nisl. Sed pretium ligula non justo convallis ac tincidunt eros suscipit. Mauris dignissim ultricies purus non pulvinar. Suspendisse id egestas sem. Quisque tempus elit non sem facilisis lobortis. Vestibulum massa tellus, elementum in viverra ac, pharetra eget ligula. Aenean vulputate condimentum libero, sed tincidunt neque mollis quis. Duis vitae ante sed lorem scelerisque eleifend. Etiam pretium blandit nisi sit amet laoreet.</p>                
        
        <p>Aliquam sed euismod mauris. In hendrerit, erat dignissim tristique iaculis, lacus lacus imperdiet nisi, non auctor leo nibh vitae erat. Nulla molestie, velit et sollicitudin dapibus, lectus orci porta lacus, id iaculis justo sem non odio. Maecenas consectetur pharetra nisl, vitae porta nibh varius sed. In pharetra, sem a vulputate pellentesque, arcu sem varius enim, at laoreet justo dui dictum dolor. Aliquam consequat feugiat est, eu malesuada massa consequat eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus sit amet vehicula sem. Praesent augue enim, ullamcorper id convallis ultrices, egestas et nunc.</p>

    </div>  

    <footer> 
        <h1>Este es es el Footer</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Nam sed ante pharetra arcu rutrum sagittis et sit amet metus. Aenean vel sapien ut odio vestibulum viverra vel vel nisl. Sed pretium ligula non justo convallis ac tincidunt eros suscipit. Mauris dignissim ultricies purus non pulvinar. Suspendisse id egestas sem. Quisque tempus elit non sem facilisis lobortis. Vestibulum massa tellus, elementum in viverra ac, pharetra eget ligula. Aenean vulputate condimentum libero, sed tincidunt neque mollis quis. Duis vitae ante sed lorem scelerisque eleifend. Etiam pretium blandit nisi sit amet laoreet.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Nam sed ante pharetra arcu rutrum sagittis et sit amet metus. Aenean vel sapien ut odio vestibulum viverra vel vel nisl. Sed pretium ligula non justo convallis ac tincidunt eros suscipit. Mauris dignissim ultricies purus non pulvinar. Suspendisse id egestas sem. Quisque tempus elit non sem facilisis lobortis. Vestibulum massa tellus, elementum in viverra ac, pharetra eget ligula. Aenean vulputate condimentum libero, sed tincidunt neque mollis quis. Duis vitae ante sed lorem scelerisque eleifend. Etiam pretium blandit nisi sit amet laoreet.</p>
            
    </footer>  

    

</div>

    
</body>
</html>