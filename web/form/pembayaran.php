<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Konfirmasi pembayaran</title>

    <link rel="stylesheet" href="../css/pembayaran.css" />

    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
    />
  </head>

  <body>
    <div class="payment-card">
      <!-- Header -->

      <div class="card-header">
        <h2>Konfirmasi pembayaran</h2>

        <button class="close-btn">✕</button>
      </div>

      <!-- Body -->

      <div class="card-body">
        <!-- Informasi Jadwal -->

        <div class="trip-card">
          <h4>Rute Perjalanan</h4>

          <div class="route">
            <span>Pelabuhan Merak, Banten</span>

            <span class="material-symbols-outlined">directions_boat</span>

            <span>Pelabuhan Bakauheni, Lampung</span>
          </div>

          <hr />

          <div class="detail-grid">
            <div class="detail-item">
              <span class="material-symbols-outlined">calendar_month</span>
              <div>
                <small>Tanggal</small>
                <p>24 Okt 2024</p>
              </div>
            </div>

            <div class="detail-item">
              <span class="material-symbols-outlined">workspace_premium</span>
              <div>
                <small>Kelas</small>
                <p>Eksekutif</p>
              </div>
            </div>

            <div class="detail-item">
              <span class="material-symbols-outlined">groups</span>
              <div>
                <small>Penumpang</small>
                <p>1 Dewasa, 0 Anak</p>
              </div>
            </div>

            <div class="detail-item">
              <span class="material-symbols-outlined">directions_walk</span>
              <div>
                <small>Kendaraan</small>
                <p>Pejalan Kaki</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Pembayaran -->

        <div class="payment-section">
          <h4>Metode Pembayaran</h4>

          <div class="payment-option active">
            <div class="payment-info">
              <span class="material-symbols-outlined">account_balance</span>

              <div>
                <h5>Transfer Bank</h5>

                <small>Virtual Account</small>
              </div>
            </div>

            <strong>Rp150.000</strong>
          </div>

          <div class="payment-option">
            <div class="payment-info">
              <span class="material-symbols-outlined">qr_code_2</span>

              <div>
                <h5>QRIS</h5>

                <small>Scan & Pay</small>
              </div>
            </div>

            <strong>Rp150.000</strong>
          </div>
        </div>
      </div>

      <!-- Footer -->

      <div class="card-footer">
        <button class="pay-btn">Lanjutkan Pembayaran →</button>
      </div>
    </div>
  </body>
</html>
