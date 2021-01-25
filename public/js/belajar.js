// setTimeout()

// const tes = setTimeout(function () {
//     console.log('ok');
// }, 5000);

// const tombol = document.getElementById('tombol');
// tombol.addEventListener('click', function () {
//     clearTimeout(tes);
//     console.log('selesai');
// });

// setInterval()

// const tes = setInterval(function () {
//   console.log("ok");
// }, 2000);

// const tombol = document.getElementById("tombol");
// tombol.addEventListener("click", function () {
//   clearInterval(tes);
//   console.log("selesai");
// });

// Program Hitung Mundur

// const tanggalTujuan = new Date("Jan 22, 2021 21:30:00").getTime();

// const hitungMundur = setInterval(function () {
//     const sekarang = new Date().getTime();
//     const selisih = tanggalTujuan - sekarang;

//     const hari = Math.floor(selisih / (1000 * 60 * 60 * 24));
//     const jam = Math.floor((selisih % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//     const menit = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
//     const detik = Math.floor((selisih % (1000 * 60)) / 1000);

//     const teks = document.getElementById("teks2");
//     teks.innerHTML = +
//         jam +
//         ":" +
//         menit +
//         ":" +
//         detik +
//         " detik lagi";

//     if (selisih < 0) {
//         clearInterval(hitungMundur);
//         teks.innerHTML = "Sedang Dalam Pelayanan";
//     }
// }, 1000);

// forEach(hitungMundur as )
