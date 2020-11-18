<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Today's Weather!</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    
    <body>
        <h1>Weather</h1>
        <hr> 
        
        <p><h2>Check your local weather!</h2></p> <br><br>
        <form id="weatherForm">
            <input type="text" id="zip" name="zip" placeholder="Enter zip code">
            <input type="button" onclick="showMessage()" value="Search"/>
        </form>
        
        <span id="invalidZip"></span> <br><br>
        <div>
            <span class="temp" id="city"></span><br><br>
            <span class="temp" id="currentWeather"></span><br><br>
            <span class="temp" id="description"></span><br><br>
            <span class="temp" id="feels_like"></span><br><br>
        </div>
        
        
        
        <script>
            
            var zipCodeAvailable = true;
             
            $("#zip").on("change",async function() {
                let zipCode = $("#zip").val();
                let url = `https://api.openweathermap.org/data/2.5/weather?zip=${zipCode},us&appid=62ff9c71ee612bbc61238440ffeda18c&units=imperial`;
                let response = await fetch(url);
                let data = await response.json();
                
                console.log(data);
                if (data.cod != 404){
                    $("#city").html("City of " + data.name);
                    $("#currentWeather").html("Current Weather: " + data.main.temp);
                    $("#description").html(data.weather[0].description + "<img src='http://openweathermap.org/img/wn/" + data.weather[0].icon + ".png'>");
                    $("#feels_like").html("Feels like: " + data.main.feels_like);
                    $("#invalidZip").html("");
                    zipCodeAvailable = true;
                } else {
                    $("#invalidZip").html("Invalid Zip Code");
                    $("#invalidZip").css("color", "red");
                    zipCodeAvailable = false;
                }

            });
            
          //  $("#weatherForm").on("submit", function(event){ 
                 $("#button").on("submit", function(event){ 
                if (!isFormValid()) {
                    event.preventDefault();
                }
 
            });
            
            function isFormValid() {
                var isValid = true;
                if (!zipCodeAvailable) {
                    isValid = false;
                 }
                 return isValid;
            }

        </script>
        
        <footer>
            <hr>
            CST336: Internet Programming HW 3. 2020&copy; <br>
        </footer>
    </body>
    
</html>