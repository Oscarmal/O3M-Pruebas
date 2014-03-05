<?php
/**
*	Encode/Decode con MIME
*
*/
#$str = 'Cadena codificada Oscarmal.';
$str='<table>
                <td>
                    <SELECT name="talla">
                    <OPTION value="100606224">Small</OPTION>
                    <OPTION value="101606224">Medium</OPTION>
                    <OPTION value="102606224">Large</OPTION>
                    <OPTION value="103606224">X Large</OPTION>
                    <OPTION value="104606224">XX Large</OPTION>
                    <OPTION value="105606224">XXX Large</OPTION>
                    </SELECT>
                </td>
            	<td>&nbsp;
                    <a href="#" title="Visualizar Info" class=bot>
                    <img src=sizeguide.jpg border=0></a>
                </td>
            </table> ';
$mime_encode=base64_encode($str);
echo $mime_encode;
echo "<br>";
echo base64_decode($mime_encode);
?>
