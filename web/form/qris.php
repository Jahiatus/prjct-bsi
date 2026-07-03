<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Google Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/qris.css">

    <title>Pembayaran QRIS</title>
</head>
<body>
    <div class="overlay">
        <div class="qris-popup">
            <!-- Header -->
            <div class="popup-header">
                <h2>Pembayaran QRIS</h2>
                <button class="close-btn">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </button>
            </div>
            <!-- Body -->
            <div class="popup-body">
                <div class="payment-info">
                    <span>Total Pembayaran</span>
                    <h1>Rp 2.500.000</h1>
                </div>
                <div class="qris-image">
                    <img src="../img/qr.png" alt="QR Code">
                </div>
                <div class="payment-status">
                    <div class="countdown">
                        <span class="material-symbols-outlined">
                            schedule
                        </span>
                        <span>
                            Berlaku dalam <strong>14:59</strong>
                        </span>
                    </div>
                    <p>
                        Scan QR menggunakan aplikasi bank atau e-wallet Anda
                        (GoPay, OVO, DANA, ShopeePay, dll).
                    </p>
                </div>
            </div>
            <!-- Footer -->
            <div class="popup-footer">
                <button class="btn-cancel">
                    Batalkan Pembayaran
                </button>
                <button class="btn-primary">
                    Cek Status Pembayaran
                    <span class="material-symbols-outlined">
                        arrow_forward
                    </span>
                </button>
            </div>
        </div>
    </div>
</body>
</html>