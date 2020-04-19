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
include('./viewer/template.php');
include('./model/model.php');
include('./include/config.inc.php');
printf('%s',Template::header());
?>
<script type="text/javascript">
$(document).ready(function () {
$("#cerca").submit(function(){
var fiscalCode = $("#FiscalCode").val();
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "./process_search_fiscal_code.php", //process request
        data: "fiscalCode="+fiscalCode,
        success: function(msg){
            $("#response").empty();
            $("#response").html(msg); //hide button and show thank you
        },
        error: function(){
            alert("failure");
        }
    });
});
});
</script>
