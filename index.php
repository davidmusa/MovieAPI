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

                <input type="text" name="find_shows" id="find_shows" placeholder="Search Show">
                <button type="submit" onclick="find_shows_btn()">Search</button>

            </div>

            <div id="output_shows">

            </div>

                <script>

                    function find_shows_btn() {

                        //Declare Variables
                        var word_input = document.getElementById("find_shows").value;
                        var endpoint = "https://api.tvmaze.com/search/shows";
                        var requested_endpoint = endpoint + "?q=" + word_input;

                        console.log(requested_endpoint);

                        var output = "";
                        
                        // Create an XMLHttpRequest object
                        const xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                output = JSON.parse(xhttp.responseText);

                                var number_shows = output.lenght;
                                for (var i = 0; i < number_shows; i++){

                                    var name = output[i]['name'];

                                    var output_html = "<div>" + name + "</div>";

                                    console.log(output_html);
                            } 
                        }           
                        // Define a callback function
                        xhttp.onload = function() {
                            document.getElementById("output_shows").innerHTML = 
                            this.responseText;
                            }
                        // Send a request    
                        xhttp.open("GET", output, true);
                        xhttp.send();

                        }
                    }

                </script>

        </body>
    </html>