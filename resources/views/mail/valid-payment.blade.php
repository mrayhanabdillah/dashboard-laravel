<!DOCTYPE html>
<html>

<head>
    <title>Voting Confirmation</title>
</head>

<body>
    <h1>Key-Pass Tiket {{ $data['program'] }}</h1>
    <p>Halo, {{ $data['name'] }}</p>
    <p>Terimakasih telah melakukan pembelian tiket {{ $data['program'] }}. Silahkan lakukan pengecekan kode tiket anda
        dengan
        login pada halaman web Ning Ayu 2024 pada bagian pembelian tiket :</p>
    <p>Username : {{ $data['username'] }}<br>Password : {{ $data['password'] }}</p>
    <p>Kami sangat mengapresiasi antusias anda dalam acara {{ $data['program'] }}.</p>
    <p>Terimakasih atas perhatiannya.</p>
    <p>Hormat Kami,<br>Yayasan Putra Pariwisata Indonesia 2021<br>humas@yayasanputrapariwisata.id
    </p>

</body>

</html>
