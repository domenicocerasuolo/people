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
session_start();
require('./model/model.php');
require('./include/config.inc.php');
require('./viewer/template.php');


$model = Model::getIstance($db);

if ($_GET['logout'] == 1) {
    session_destroy();
    header("location: https://www.furtheredu.it/RegiRest/app/index.php");//redirect
}


if ($_SESSION['regirest'] == true) {

} else {

    if (isset($_POST["loginbutton"])) {

        $accesso = $model->autenticazione($_POST['login'], $_POST['password']);


        if (count($accesso) != 0) {
            $_SESSION['errore_auth'] = '';
            $_SESSION["regirest"] = true;
        }
    }
}


if ($_SESSION['regirest'] == true) {
    header("location: https://www.furtheredu.it/RegiRest/app/test.php");//redirect
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Domenico Cerasuolo">
    <title>Personal Data Registry</title>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/floating-labels.css" rel="stylesheet">
</head>

<body>
<form class="form-signin" method='post'>

    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Personal Data Registry</h1>
        <p></p>
    </div>

    <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" name=login placeholder="" required autofocus>
        <label for="inputEmail">Login</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name=password placeholder="" required>
        <label for="inputPassword">Password</label>
    </div>



    <div class="checkbox mb-3">
        <label>
            <?php
            echo $_SESSION['auth'];
            ?>
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name='loginbutton'>Login</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 D. Cerasuolo
        <br>  <br>D. Cerasuolo <i>domenico.cerasuolo@gmail.com</i></p>
</form>
</body>
</html>

