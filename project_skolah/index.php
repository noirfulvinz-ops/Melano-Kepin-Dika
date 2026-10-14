<?php
//panggil namespace
use App\Models\Siswa;
//bisa gunakan alias jika nama kelasnya sama persis
use App\Controllers\SiswaController;

//memuat file kelas(nantinya ini akan dilakukan composer/autoload)
require_once 'App/Models/Siswa.php';
require_once 'App/controller/siswaController.php';

echo "<h2>Sistem Informasi Sekolah - SMK Texmaco Semarang</h2>";
echo "<hr>";

//instansiasi controller dan jalankan method
$controller = new SiswaController();
$controller->prosesData();

echo "<br> <hr>";

//instansiasi objek
$siswa1 = new Siswa ("25701", "Siti Kusmini", "XI", "Rekayasa Perangkat Lunak");
echo "NIS: " . $siswa1->getNis() . "<br>";
echo "NAMA: " . $siswa1->getNama() . "<br>";
echo "KELAS: " . $siswa1->getKelas() . "<br>";
echo "JURUSAN: " . $siswa1->getJurusan() . "<br>";
?>