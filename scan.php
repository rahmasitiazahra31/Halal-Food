<?php require_once 'auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Scan | Halal Food App</title>

  <!-- AdminLTE -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Library Scan -->
  <script src="https://unpkg.com/html5-qrcode"></script>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include 'sidebar.php'; ?>

  <!-- Content -->
  <div class="content-wrapper">
    <section class="content pt-3">
      <div class="container-fluid">

        <div class="card text-center">
          <div class="card-body">

            <h3>Scan Produk Halal</h3>
            <p>Arahkan kamera ke barcode / QR produk</p>

            <!-- Kamera -->
            <div id="reader" style="width:300px; margin:auto;"></div>

            <br>

            <!-- Hasil -->
            <h5>Hasil Scan:</h5>
            <p id="scanResult">-</p>

            <div id="statusHalal"></div>

          </div>
        </div>

      </div>
    </section>
  </div>

</div>

<!-- Script -->
<script>
function onScanSuccess(decodedText, decodedResult) {

    // tampilkan barcode
    document.getElementById("scanResult").innerHTML = decodedText;

    // database dummy halal
    let database = {
        "8992761132012": "HALAL",
        "123456789": "TIDAK HALAL",
        "888888888": "DIRAGUKAN"
    };

    let status = database[decodedText];

    if (status == "HALAL") {
        document.getElementById("statusHalal").innerHTML =
        "<h3 style='color:green;'>✅ HALAL</h3>";
    } 
    else if (status == "TIDAK HALAL") {
        document.getElementById("statusHalal").innerHTML =
        "<h3 style='color:red;'>❌ TIDAK HALAL</h3>";
    } 
    else {
        document.getElementById("statusHalal").innerHTML =
        "<h3 style='color:orange;'>⚠️ TIDAK TERDAFTAR</h3>";
    }
}

// jalankan kamera
let scanner = new Html5QrcodeScanner("reader", {
    fps: 10,
    qrbox: 250
});

scanner.render(onScanSuccess);
</script>

</body>
</html>