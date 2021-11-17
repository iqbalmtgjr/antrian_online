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
            <h3>DISDUKCAPIL KAB. SINTANG</h3>
            <h2>Nomor Antrian</h2>
            @if ($antrian->no_antrian > 9)
                @if ($antrian->id_pelayanan == 1)
                    <h1>A{{ $antrian->no_antrian }}</h1>
                @elseif ($antrian->id_pelayanan == 2)
                    <h1>B{{ $antrian->no_antrian }}</h1>
                @elseif ($antrian->id_pelayanan == 3)
                    <h1>C{{ $antrian->no_antrian }}</h1>
                @elseif ($antrian->id_pelayanan == 4)
                    <h1>D{{ $antrian->no_antrian }}</h1>
                @endif
            @else
                @if ($antrian->id_pelayanan == 1)
                    <h1>A0{{ $antrian->no_antrian }}</h1>
                @elseif ($antrian->id_pelayanan == 2)
                    <h1>B0{{ $antrian->no_antrian }}</h1>
                @elseif ($antrian->id_pelayanan == 3)
                    <h1>C0{{ $antrian->no_antrian }}</h1>
                @elseif ($antrian->id_pelayanan == 4)
                    <h1>D0{{ $antrian->no_antrian }}</h1>
                @endif
            @endif
            <h4>Sisa Antrian : {{ $p_antrian->count() - 1 }}</h4>
            <h4>Tanggal {{ $antrian->tgl_antrian }}</h4>
            <h5>Silahkan Menunggu di tempat<br>yang Telah Disediakan <br> *** Terima Kasih ***</h5>
        </div>
    </center>
</body>

</html>
