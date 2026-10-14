<?php
//buat namespace untuk controllers
namespace App\Controllers;

//kita panggil namespace model siswa -> menggunakan use
use App\Models\Siswa;

//Kita buat kelas baru
class SiswaController{
    //method prosesData
    public function prosesData(): void{
        // Data pertama: Lano
        $siswa1 = new Siswa("257026", "Lano", "XI", "Rekayasa Perangkat Lunak");

        $siswa2 = new Siswa("257018", "Kevin", "XI", "Rekayasa Perangkat Lunak");
         
        $siswa3 = new Siswa("257023", "Dika", "XI", "Rekayasa Perangkat Lunak");

        // Kotak 1
        echo "<div style='border: 2px solid #007bff; padding: 15px; border-radius: 8px; font-family: sans-serif; background: #f8f9fa; margin-bottom: 10px;'>";
        echo "<h3 style='color: #007bff; margin-top: 0;'>Data Profil Siswa 1 (Via Controller)</h3>";
        echo "<b>NIS:</b> {$siswa1->getNis()} <br>";
        echo "<b>Nama:</b> {$siswa1->getNama()} <br>";
        echo "<b>Kelas:</b> {$siswa1->getKelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa1->getJurusan()} <br>";
        echo "</div>";

        // Kotak 2
        echo "<div style='border: 2px solid #28a745; padding: 15px; border-radius: 8px; font-family: sans-serif; background: #f8f9fa;'>";
        echo "<h3 style='color: #28a745; margin-top: 0;'>Data Profil Siswa 2 (Via Controller)</h3>";
        echo "<b>NIS:</b> {$siswa2->getNis()} <br>";
        echo "<b>Nama:</b> {$siswa2->getNama()} <br>";
        echo "<b>Kelas:</b> {$siswa2->getKelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa2->getJurusan()} <br>";
        echo "</div>";

         // Kotak 3
        echo "<div style='border: 2px solid #a72887; padding: 15px; border-radius: 8px; font-family: sans-serif; background: #f8f9fa;'>";
        echo "<h3 style='color: #a72887; margin-top: 0;'>Data Profil Siswa 3 (Via Controller)</h3>";
        echo "<b>NIS:</b> {$siswa3->getNis()} <br>";
        echo "<b>Nama:</b> {$siswa3->getNama()} <br>";
        echo "<b>Kelas:</b> {$siswa3->getKelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa3->getJurusan()} <br>";
        echo "</div>";
    }
}