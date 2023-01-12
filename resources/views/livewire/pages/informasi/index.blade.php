@slot('title', 'Informasi')

<div class="w-full max-w-6xl mx-auto pt-28 2xl:max-w-7xl">
    <div class="flex justify-center text-3xl">
        <span class="text-4xl font-bold text-gray-600 capitalize">Informasi Pengajuan</span>
    </div>
    <div class="w-full max-w-6xl mx-auto mt-5 2xl:max-w-7xl">
        <div class="relative flex flex-col my-4">


<!-- <p>Click the button to get your coordinates.</p>
<button onclick="getLocation()">Try It</button>
<p id="demo"></p>
<script>
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
 var a = position.coords.latitude + ',' + position.coords.longitude;
 alert(a);
}
</script> -->

<!--

<script>
    function getAddr() {
    window.navigator.geolocation.getCurrentPosition(
        function (position) {
            var longitude = position.coords.longitude;
            var latitude = position.coords.latitude;
            alert(longitude);
            alert(latitude);
        },
        function onError(error) {
            //alert(error.message);
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    Alert ("you refuse to request a geographic location");
                    break;
                case error.POSITION_UNAVAILABLE:
                    Alert ("location information is not available");
                    break;
                case error.TIMEOUT:
                    Alert ("request for your geographic location timed out");
                    break;
                case error.UNKNOWN_ERROR:
                    Alert ("unknown error");
                    break;
            }
        }
    );
};
</script> -->

            @livewire('pages.informasi.table')
        </div>
    </div>
</div>




