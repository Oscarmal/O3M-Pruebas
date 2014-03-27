<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
<title>Sitio Responsivo</title>
<script src="http://localhost/common/js/jquery-1.9.1.min.js"></script>
<script src="http://localhost/common/js/jquery.sticky.js"></script>
<!–[if lt IE 9]>
<script src="http://localhost/common/js/css3-mediaqueries.js"></script>
<![endif]–>
<link rel="stylesheet" type="text/css" href="common/css/estructura.css" />
<link rel="stylesheet" type="text/css" href="common/css/menu.css" />
<script>
	$(window).load(function(){
		$("#cssmenu").sticky({ topSpacing: 0, center:false });
    });
</script>
</head>
<body>
	<div id="area-trabajo">			
		<div id="cabecera">
			<div id="titulo"><h2>Titulo de sitio</h2></div>
			<div id='cssmenu'>
				<ul>
				   <li class='active'><a href='index.html'><span>Inicio</span></a></li>
				   <li><a href='#'><span>Opcion 1</span></a></li>
				   <li><a href='#'><span>Opcion 2</span></a></li>
				   <li><a href='#'><span>Opcion 3</span></a></li>
				   <li class='last'><a href='#'><span>Opcion 4</span></a></li>
				</ul>
			</div>
		</div>
		<div id="cuerpo">
			<div id="menu-izq">
				<ul>
					<li>uno</li>
					<li>dos</li>
					<li>tres</li>
				</ul>
			</div>
			<div id="contenido">
				<h1>Titulo</h1>    

		        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus facilisis velit, nec faucibus nunc lobortis eget. Etiam quis pulvinar neque. Nam sed ante pharetra arcu rutrum sagittis et sit amet metus. Aenean vel sapien ut odio vestibulum viverra vel vel nisl. Sed pretium ligula non justo convallis ac tincidunt eros suscipit. Mauris dignissim ultricies purus non pulvinar. Suspendisse id egestas sem. Quisque tempus elit non sem facilisis lobortis. Vestibulum massa tellus, elementum in viverra ac, pharetra eget ligula. Aenean vulputate condimentum libero, sed tincidunt neque mollis quis. Duis vitae ante sed lorem scelerisque eleifend. Etiam pretium blandit nisi sit amet laoreet.</p>

		        <h1>Otro titulo</h1>

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
		</div>
		<div id="pie">Pie</div>
	</div>
	<div id="menu-movil">Menu movil</div>
</body>
</html>