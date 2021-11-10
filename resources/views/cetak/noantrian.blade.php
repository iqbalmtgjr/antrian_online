<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Nomor Antrian</title>
</head>

<body>
    <center>
        <div style="margin-top: 100px">
            <h2>Nomor Antrian</h2>
            @if ($antrian->no_antrian > 9)
                <h1>A{{ $antrian->no_antrian }}</h1>
            @else
                <h1>A0{{ $antrian->no_antrian }}</h1>
            @endif
            <h3>Dinas Kependudukan dan Pencatatan Sipil <br> Sintang</h3>
            <h4>Sisa Antrian {{ $antrian->count() - 1 }}</h4>
            <h4>Tanggal {{ $antrian->tgl_antrian }}</h4>
        </div>
    </center>
</body>

</html>
