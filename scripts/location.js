var city;

function getLocation() {
    if (navigator.geolocation) {
        let k = navigator.geolocation;
        k.getCurrentPosition(successFunc, errFunc);

        function successFunc(data) {
            //get coordinates and use it to get user's current City
            let lat = data.coords.latitude;
            let long = data.coords.longitude;

            //OpenCage api key = b91fa56f5ba44e18ab0246f88d51d3da
            let opencage_key = "b91fa56f5ba44e18ab0246f88d51d3da";
            getCity(long, lat, opencage_key); //passing coordinates to get city name

        }

        function errFunc() {
            return null;
        }

        function getCity(longitude, latitude, key) {
            let apikey = key;
            let latVal = latitude;
            let longVal = longitude;
            //alert("latitude = " + latVal + " longitude = " + longVal);
            fetch('https://api.opencagedata.com/geocode/v1/json' +
                    '?' +
                    'key=' + apikey +
                    '&q=' + encodeURIComponent(latVal + ',' + longVal) +
                    '&pretty=1' +
                    '&no_annotations=1'
                    //Below then takes the data in json format and passes it to a function for processing

                ).then(function(resp) { return resp.json() }) // Convert data to json
                .then(function(data) {
                    console.log(data.results[0].components.city); //Show Current Location's weather info
                })
        }
        successFunc;
        return city;
    } else {
        city = 'Yaounde';
        return city;
    }
}
let loc = getLocation();
console.log(loc);