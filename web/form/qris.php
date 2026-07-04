
    <div class="overlay" id="popupQris" style="display:none;">
        <div class="qris-popup">
            <!-- Header -->
            <div class="popup-header">
                <h2>Pembayaran QRIS</h2>
                <button class="close-btn" id="btnCloseQris">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </button>
            </div>
            <!-- Body -->
            <div class="popup-body">
                <div class="payment-info">
                    <span>Total Pembayaran</span>
                    <h1 id="qrisHarga">Rp 0</h1>
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
                            Berlaku dalam <strong id="countdown">15:00</strong>
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
                <button class="btn-primary" id="btnCekStatus">
                    Cek Status Pembayaran
                    <span class="material-symbols-outlined">
                        arrow_forward
                    </span>
                </button>
            </div>
        </div>
    </div>