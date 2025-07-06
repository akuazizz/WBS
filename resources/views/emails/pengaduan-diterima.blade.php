<!DOCTYPE html>
<html>

<head>
  <title>Pengaduan Diterima</title>
</head>

<body>
  <h2>Terima Kasih Telah Melakukan Pengaduan</h2>
  <p>Pengaduan Anda telah kami terima dan akan segera kami proses. Kerahasiaan identitas Anda terjamin.</p>
  <p>Gunakan kode berikut untuk melacak status pengaduan Anda:</p>
  <h1 style="font-size: 24px; background-color: #f0f0f0; padding: 10px; border: 1px solid #ccc; display: inline-block;">
    {{ $pengaduan->kode_pengaduan }}
  </h1>
  <p>Anda bisa melakukan pengecekan melalui menu "Cek Tracking" di website kami.</p>
  <br>
  <p>Hormat kami,</p>
  <p>Tim WBS Pemkab Banjarnegara</p>
</body>

</html>