<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ticketing</title>
</head>
<body style="font-size: 18px;">
  <p>Hello, <?= $nama ?>,<br>
  Permintaan kamu (<?= $id ?>) telah diterima dan sedang ditinjau oleh Tim Support.</p>
  <hr>
  <h2><?= $nama ?></h2>
  <table>
    <tr>
      <td>ID Tiket</td>
      <td>:</td>
      <td><?= $id ?></td>
    </tr>
    <tr>
      <td>Pesan</td>
      <td>:</td>
      <td><?= $message ?></td>
    </tr>
  </table>
  <hr>
  <p>Ticketing</p>
</body>
</html>
