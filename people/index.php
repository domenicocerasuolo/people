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


require 'vendor/autoload.php';
require 'rb.php';

/*
set up database connection
*/
R::setup('mysql:host=****;dbname=****','****','****');
R::freeze(true);

const REGEX_CODICEFISCALE = '/^[a-z]{6}[0-9]{2}[a-z][0-9]{2}[a-z][0-9]{3}[a-z]$/i';

class ResourceNotFoundException extends Exception {}
$app= new \Slim\Slim();


/**
 * GET getPersonalDataByfiscalCode
 * Summary: Check fiscal code and return personal information. If partial code has been passsed a list of person who match the partial code  were returned
 * Notes: Returns a single object containing name, last_name and birth_date
 * Output-Formats: [application/json]
 */
$app->get('/people/:fiscalCode/',function ($fiscalCode) use ($app) {
    try {


        if((strlen($fiscalCode)>=16) and !preg_match(REGEX_CODICEFISCALE, strtoupper($fiscalCode)) )
        {
            $app->response()->header('Content-Type', 'application/json');
            printf('%s',json_encode(array('Error'=>'Incorrect fiscal code submitted')));
            $app->response()->status(400);
        }
        else {
            $rows = R::getAll("select upper(fiscal_code) as FiscalCode,nome as Name, cognome as Surname, data_nascita as BornDate
                                from people where fiscal_code  LIKE CONCAT(:fiscalCode, '%') order by cognome asc",
                [':fiscalCode' => strtoupper($fiscalCode)]);
            if ($rows) {
                $app->response()->header('Content-Type', 'application/json');
                printf('%s', json_encode($rows, JSON_NUMERIC_CHECK));
            } else {
                throw new ResourceNotFoundException();
            }
        }
    } catch (ResourceNotFoundException $e) {
        $app->response()->status(404);
    }
});


// run
$app->run();
?>

 
