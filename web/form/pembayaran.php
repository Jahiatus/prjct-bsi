 <!-- Google Font -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Inter (dipakai di popup pembayaran) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Google Material Symbols -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    >

  <div class="overlay" id="popupKonfirmasi" style="display:none;">

    <div class="payment-card">

        <!-- ==========================
             HEADER
        =========================== -->

        <div class="card-header">

            <h2>Konfirmasi Pembayaran</h2>

            <button class="close-btn" id="btnCloseKonfirmasi">
                ✕
            </button>

        </div>

        <!-- ==========================
             BODY
        =========================== -->

        <div class="card-body">

            <!-- Informasi Perjalanan -->

            <div class="trip-card">

                <h4>Rute Perjalanan</h4>

                <div class="route">

                    <span id="popupAsal">
                        Pelabuhan Merak
                    </span>

                    <span class="material-symbols-outlined">
                        directions_boat
                    </span>

                    <span id="popupTujuan">
                        Pelabuhan Bakauheni
                    </span>

                </div>

                <hr>

                <div class="detail-grid">

                    <!-- Nama Kapal -->

                    <div class="detail-item">

                        <span class="material-symbols-outlined">
                            directions_boat
                        </span>

                        <div>

                            <small>Nama Kapal</small>

                            <p id="popupKapal">
                                KM Dharma Rucitra
                            </p>

                        </div>

                    </div>

                    <!-- Tanggal -->

                    <div class="detail-item">

                        <span class="material-symbols-outlined">
                            calendar_month
                        </span>

                        <div>

                            <small>Tanggal</small>

                            <p id="popupTanggal">
                                -
                            </p>

                        </div>

                    </div>

                    <!-- Jam -->

                    <div class="detail-item">

                        <span class="material-symbols-outlined">
                            schedule
                        </span>

                        <div>

                            <small>Jam</small>

                            <p>

                                <span id="popupBerangkat"></span>

                                -

                                <span id="popupTiba"></span>

                            </p>

                        </div>

                    </div>

                    <!-- Kelas -->

                    <div class="detail-item">

                        <span class="material-symbols-outlined">
                            workspace_premium
                        </span>

                        <div>

                            <small>Kelas</small>

                            <p id="popupKelas">
                                -
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Pembayaran -->

            <div class="payment-section">

                <h4>Metode Pembayaran</h4>

                <div class="payment-option active">

                    <div class="payment-info">

                        <span class="material-symbols-outlined">
                            qr_code_2
                        </span>

                        <div>

                            <h5>QRIS</h5>

                            <small>
                                Scan QR Code
                            </small>

                        </div>

                    </div>

                    <strong id="popupHarga">
                        Rp0
                    </strong>

                </div>

            </div>

        </div>

        <!-- ==========================
             FOOTER
        =========================== -->

        <div class="card-footer">

            <button
                class="pay-btn"
                id="btnLanjutPembayaran">

                Lanjutkan Pembayaran →

            </button>

        </div>

    </div>

</div>

