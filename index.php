<?php

    /*
    * Date: 2021-09-30 
    * Author: David Musa
    * Description: In this page you can search a specific movie and find the schedule for this movie!
    */

?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css" class="style">
            <title>MovieAPI</title>
        </head>
        <body>

            <div>MOVIE SCHEDULE</div>

            <div>

                <input type="text" name="find_movies" id="find_movies" placeholder="Search Show">
                <input type="submit" onclick="find_movies_btn()">

            </div>

            <div id="output_movies">

            </div>

                <script>

                    function find_movies_btn() {

                        //Declare Variables
                        var word_input = document.getElementById("find_movies").value;
                        var endpoint = " https://api.tvmaze.com/search/shows";
                        var requested_endpoint = endpoint + "?q=" + word_input;
                        

                        // Create an XMLHttpRequest object
                        const xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                output = JSON.parse(xhttp.responseText);
                            }        
                        // Define a callback function
                        xhttp.onload = function() {
                            document.getElementById("output_movies").innerHTML =
                            this.responseText;
                            }
                        // Send a request    
                        xhttp.open("post", requested_endpoint, true);
                        xhttp.send();

                        }
                    }

                </script>

        </body>
    </html>