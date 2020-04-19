<?php
/**
 * @Copyright (c) 2020 Domenico Cerasuolo <https://github.com/domenicocerasuolo>.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. if not, see <https://www.gnu.org/licenses/>.
 *
 * @author  Domenico Cerasuolo <https://github.com/domenicocerasuolo>
 * @version 1.0
 */
include('./initAdmin.php');


if (isset($_POST['fiscalCode'])) {

    $context = stream_context_create(array('http' => array('header' => 'Connection: close\r\n')));
    $url_anagrafe = "https://www.furtheredu.it/RegiRest/v1/people/".$_POST['fiscalCode'];
    $stringa = file_get_contents($url_anagrafe, false, $context);
    $json_a = json_decode($stringa, true);
    $headers = get_headers($url_anagrafe);
    $code=substr($headers[0], 9, 3);
    echo "
    <code>curl -X GET -k -i 'https://www.furtheredu.it/RegiRest/v1/people/".$_POST['fiscalCode']."</code><br><br>
    Status code:".$code."<br>";

    if ($code==404) {
        $html .= "Object not found";
    } else
    if ($code==400) {
        $html .= "Incorrect fiscal code submitted.";

    }
else {
    $html=sprintf('
Total results found: %s<br>
Results shown: %s<br><BR>',count($json_a),( (count($json_a) >=10) ?  '10':count($json_a)));
$i=0;
$html.="<table class=\"table table-hover\"><tr><th class='text-left'>Fiscal Code</th><th class='text-left'>Name and Surname </th><th class='text-left'>Born date</th></tr>";
    foreach ($json_a as $item) {
        $i++;
        $html .= sprintf('<tr><td class="text-left">%s</td><td class="text-left">%s %s</td><td class="text-left">%s</td></tr>',
            str_replace($_POST['fiscalCode'],"<b>".$_POST['fiscalCode']."</b>",$item['FiscalCode']), $item['Name'], $item['Surname'],
            date('d/m/Y',strtotime($item['BornDate'])));
if ($i==10) break;
    }
    $html.="</table>";
}
echo $html;
}
?>
                  


