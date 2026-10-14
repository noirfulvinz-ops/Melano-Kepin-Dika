<?php
// kita buat dulu interface
interface Cetakable {
    // kontrak: siapapun yang mengimplementasi ini,
    // wajib punya method tampilkanCetak()
    public function tampilkanCetak(): void;
}

// kelas laporan siswa
class LaporanSiswa implements Cetakable {
    private string $namaSiswa;
    private string $kelas;

    public function __construct(string $nama, string $kelas) {
        $this->namaSiswa = $nama;
        $this->kelas = $kelas;
    }

    // wajib menjalankan kontrak interface
    // yaitu membuat isi method tampilkanCetak()
    public function tampilkanCetak(): void {
        echo "<div style='border:1px solid green; padding:10px; margin-bottom:10px;'>";
        echo "<h3>Cetak Dokumen: Rapor Siswa</h3>";
        echo "Nama: {$this->namaSiswa} | Kelas: {$this->kelas}";
        echo "</div>";
    }
}

// buat kelas guru
class LaporanGuru implements Cetakable {
    private string $namaGuru;
    private string $mataPelajaran;

    public function __construct(string $nama, string $mapel) {
        $this->namaGuru = $nama;
        $this->mataPelajaran = $mapel;
    }

    public function tampilkanCetak(): void {
        echo "<div style='border:1px solid blue; padding:10px; margin-bottom:10px;'>";
        echo "<h3>Cetak Dokumen: Jadwal / Data Guru</h3>";
        echo "Nama Guru: {$this->namaGuru} | Mata Pelajaran: {$this->mataPelajaran}";
        echo "</div>";
    }
}

// buat kelas untuk mencetak berbagai objek
// yang mengimplementasikan interface
class CetakManager {
    // menerima data apapun selama dia mengimplementasikan
    // interface Cetakable (ini adalah penerapan polimorfisme-nya)
    public static function prosesCetak(Cetakable $dokumen): void {
        // keyword static artinya: class bisa dipanggil langsung
        // tanpa harus ada objeknya
        $dokumen->tampilkanCetak();
    }
}

// Contoh instansiasi objek
echo "<h2>Daftar Cetak Dokumen Sekolah</h2>";

// membuat objek siswa
$siswa1 = new LaporanSiswa("Melano", "XI RPL 1");
$siswa2 = new LaporanSiswa("Dika", "XI RPL 1");
$siswa3 = new LaporanSiswa("Kevin", "XI RPL 1");
$siswa4 = new LaporanSiswa("Tri", "XI RPL 1");

// membuat objek guru
$guru1 = new LaporanGuru("Pak Galih Haris Fauzi, S.Pd", "Produktif Rekayasa Perangkat Lunak");
$guru2 = new LaporanGuru("Pak Wahab, S.Pd", "Produktif Rekayasa Perangkat Lunak");

// Mencetak menggunakan kelas CetakManager (Hasil Polimorfisme)
CetakManager::prosesCetak($siswa1);
CetakManager::prosesCetak($siswa2);
CetakManager::prosesCetak($siswa3);
CetakManager::prosesCetak($siswa4);
CetakManager::prosesCetak($guru1);
CetakManager::prosesCetak($guru2);