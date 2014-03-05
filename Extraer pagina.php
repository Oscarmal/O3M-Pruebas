    <?php
    $context = stream_context_create(array('http' => array('timeout' => 5)));
    $url = file_get_contents('http://www.bolsamania.com/bolsa-cotizaciones/acciones/espana--ibex35.html', 0, $context);
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML($url);
    $fci = $doc->getElementById('ls_table_ficha_cabecera_indice');
    $spans = $fci->getElementsByTagName('span');
     
    for ($i = 0; $i < $spans->length; $i++) {
        echo $spans->item($i)->nodeValue . '<br />';
    }
?>