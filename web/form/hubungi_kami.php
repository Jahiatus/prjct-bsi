<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ombak Biru - Solusi Transportasi Bahari Anda</title>
    <link rel="icon" type="image/svg+xml" href="../img/Asset 10.svg">
</head>

<body>

<?php include __DIR__ . '/../layout/hdr.html'; ?>

<main>
<body>
    
<link rel="stylesheet" href="../css/form.css" />
    <section id="contact-us">
      <div class="card">
        <h2 class="card-title">Hubungi Kami</h2>

        <p>
          Tinggalkan pesan kepada kami. Tim Ombak Biru akan segera menghubungi
          Anda.
        </p>

        <form
          class="booking-form"
          id="form"
          name="form"
          method="POST"
          action="https://forms.zohopublic.com/contacus-form/form/WanttoTalkForm/formperma/TzNwbTAd3xQ06hsBJnZeSWdOiNTw53_Hjh6qOpuzggs/htmlRecords/submit"
          accept-charset="UTF-8"
          enctype="multipart/form-data"
          onsubmit='javascript:document.charset="UTF-8"; return zf_ValidateAndSubmit();'
        >
          <input type="hidden" name="zf_referrer_name" value="" />
          <input type="hidden" name="zf_redirect_url" value="" />
          <input type="hidden" name="zc_gad" value="" />

          <div class="form-group">
            <label>Nama Depan</label>

            <div class="input-wrapper">
              <input
                type="text"
                name="Name_First"
                maxlength="255"
                fieldType="7"
              />
            </div>
          </div>

          <div class="form-group">
            <label>Nama Belakang</label>

            <div class="input-wrapper">
              <input
                type="text"
                name="Name_Last"
                maxlength="255"
                fieldType="7"
              />
            </div>
          </div>

          <div class="form-group">
            <label>Email</label>

            <div class="input-wrapper">
              <input type="email" name="Email" maxlength="255" fieldType="9" />
            </div>
          </div>

          <div class="form-group">
            <label>Nomor Telepon</label>

            <div class="input-wrapper">
              <input
                type="text"
                name="PhoneNumber_countrycode"
                maxlength="20"
                fieldType="11"
              />
            </div>
          </div>

          <div class="form-group">
            <label>Hubungi Kami Melalui</label>

            <div class="input-wrapper">
              <label>
                <input type="radio" name="Radio" value="Phone" />
                Phone
              </label>

              <label>
                <input type="radio" name="Radio" value="Email" />
                Email
              </label>
            </div>
          </div>

          <div class="form-group">
            <label>Pertanyaan</label>

            <div class="input-wrapper">
              <select name="Dropdown">
                <option value="-Select-">-Select-</option>
                <option value="Sales">Sales</option>
                <option value="Service">Service</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label>Masukan Pesan Anda</label>

            <div class="input-wrapper">
              <textarea name="MultiLine" maxlength="65535"> </textarea>
            </div>
          </div>

          <button class="btn-submit" type="submit">Kirim Pesan</button>
        </form>
      </div>
    </section>
  </body>
</main>

<?php include __DIR__ . '/../layout/ftr.html'; ?>
</body>
</html>