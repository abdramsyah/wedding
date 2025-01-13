$(document).ready(function () {
  // Ketika halaman dimuat, panggil fungsi untuk mendapatkan data dari PHP
  getDataFromPHP();
  // getDataFromPHPV2();
});

function getDataFromPHP() {
  // Gunakan AJAX untuk mengambil data dari PHP
  $.ajax({
    url: "getData.php", // Sesuaikan dengan nama file PHP yang akan digunakan
    type: "GET",
    dataType: "json",
    success: function (data) {
      // Panggil fungsi untuk menampilkan data di halaman HTML
      displayData(data);
    },
    error: function (error) {
      console.log("[Error ]: " + JSON.stringify(error));
    },
  });
}
