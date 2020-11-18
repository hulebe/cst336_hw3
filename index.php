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
        
        Check your local weather! <br><br>
        <form id="weatherForm">
            Zip Code: <input type="text" id="zip" name="zip"><br>
            
            Current Weather: <span id="currentWeather"></span><br>
            
            <input type="submit" value="Search"> <br>
            
            <span id="weather"></span>
        </form>
        
        <script>
            var zipCodeAvailable = true;
             
            $("#zip").on("change",async function() {
                let zipCode = $("#zip").val();
                let apiKey = `62ff9c71ee612bbc61238440ffeda18c`;
                let url = `api.openweathermap.org/data/2.5/weather?zip=${zipCode},us&appid=${apiKey}`;
                let response = await fetch(url);
                let data = await response.json();
                
                $("#currentWeather").html(data.weather.temp);
            
            });
            
            function isFormValid(){
                isValid = true;
                if (!zipCodeAvailable){
                    isValid = false;
                }
                
                return isValid;
            }
        </script>
    </body>
    
</html>