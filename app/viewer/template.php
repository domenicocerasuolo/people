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
    

        class  Template {
        public static function header()
            {

                $html=sprintf(' <!doctype html>
                <html lang="en">
              <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
            <title>Pricing example for Bootstrap</title>
            <!-- Bootstrap core CSS -->
            <link href="./css/bootstrap.min.css" rel="stylesheet">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          </head>
        
          <body>
        
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
              <h5 class="my-0 mr-md-auto font-weight-normal"></h5>
              <nav class="my-2 my-md-0 mr-md-3">
               
              </nav>
              <a class="btn btn-outline-primary" href="./index.php?logout=1">Logout</a>
            </div>
        
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
              <h1 class="display-4">Personal Data Registry</h1>
              <p class="lead">
              The system receives one\'s fiscal code as an input, validates it and returns it as a json code including her name, surname and date of birth.<br>
              If a fiscal code is partial, the system identifies a list of people whose personal fiscal codes start with the given portion of fiscal code</p>
            </div>
        
        
        
        <div class="row">
        <div class="col-2"></div>
        <div class="col-3">
          <form id="cerca" class="form-control">
          <label>Fiscal code (i.e. CRSDNC*)</label>
                  <input type="text" id="FiscalCode" class="form-control" required  onkeyup="this.value = this.value.toUpperCase();"></input>
                  <br>
                    <button type="submit" class="btn btn-lg btn-block btn-primary" >Search</button>
                  
                  </form>
        
        
        </div>
        <div class="col-5">
         <div class="card">
                 
                  <div class="card-body">
                
                   <div id="response">
                   </div>
                   
                  </div>
                </div>
        
        </div>
        <div class="cols-2"></div>
        </div>
        
           
        
        
          
         
          
            </body>
            </html>
        ');




                return $html;

            }






        }


?>
 