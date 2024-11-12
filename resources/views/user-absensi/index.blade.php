<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Pegawai</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Absensi Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <form id="absensiForm" action="" method="POST">
                            @csrf
                            <!-- Input hidden untuk latitude dan longitude -->
                            <input type="hidden" id="check_in_lat" name="check_in_lat">
                            <input type="hidden" id="check_in_long" name="check_in_long">

                            <div class="text-center">
                                <button type="button" class="btn btn-success w-100" onclick="getLocation()">
                                    <i class="bi bi-geo-alt"></i> Check In
                                </button>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="button" class="btn btn-danger w-100" onclick="getLocation()">
                                    <i class="bi bi-geo-alt"></i> Check Out
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script Icon Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

    <!-- Script Geolocation API -->
    {{-- <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            } else {
                alert("Geolocation tidak didukung oleh browser Anda.");
            }
        }
    
        function successCallback(position) {
            const lat = position.coords.latitude;
            const long = position.coords.longitude;

            document.getElementById('check_in_lat').value = lat;
            document.getElementById('check_in_long').value = long;

            document.getElementById('absensiForm').submit();
        }

        function errorCallback(error) {
            alert("Gagal mendapatkan lokasi: " + error.message);
        }
    </script> --}}
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                console.log("Geolocation tersedia, mencoba mendapatkan lokasi...");
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            } else {
                alert("Geolocation tidak didukung oleh browser Anda.");
            }
        }

        function successCallback(position) {
            const lat = position.coords.latitude;
            const long = position.coords.longitude;

            // Debug: Menampilkan lokasi di console
            console.log("Latitude: " + lat);
            console.log("Longitude: " + long);

            // Set nilai input hidden untuk lat dan long
            document.getElementById('check_in_lat').value = lat;
            document.getElementById('check_in_long').value = long;

            // Menampilkan nilai lat dan long di halaman (Opsional)
            alert(`Lokasi Anda: Latitude ${lat}, Longitude ${long}`);
        }

        function errorCallback(error) {
            console.error("Gagal mendapatkan lokasi: ", error);
            alert("Gagal mendapatkan lokasi: " + error.message);
        }
    </script>

</body>

</html>
