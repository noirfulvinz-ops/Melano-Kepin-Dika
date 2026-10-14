<?php

// kita buat parent class
class Pegawai{
    protected $nama_pegawai;
    protected $gaji_pegawai;

    // method construct
    public function __construct($nama_pegawai, $gaji_pegawai) {
        $this->nama_pegawai = $nama_pegawai;
        $this->gaji_pegawai = $gaji_pegawai;
    }

    // fungsi getter untuk ambil nama
    public function getNama(){
        return $this->nama_pegawai;
    }

    // method dasar di parents class
    public function hitungGaji(){
        return $this->gaji_pegawai;
    }
}

// polimorfisme dengan inheritance, menggunakan overriding
class freelancer extends Pegawai{
    private $projectRate;
    private $jumlahProject;

    public function __construct($nama_pegawai, $projectRate, $jumlahProject) {
        // Gaji dibuat 0, karena freelancer hanya dibayar per project
        parent::__construct($nama_pegawai, 0);
        $this->projectRate = $projectRate;
        $this->jumlahProject = $jumlahProject;
    }

    // Overriding untuk menghitung ulang gaji
    public function hitungGaji()
    {
        return $this->projectRate * $this->jumlahProject;
    }
}

class KaryawanTetap extends Pegawai{
    private $tunjangan;

    public function __construct($nama_pegawai, $gaji_pegawai, $tunjangan)
    {
        parent::__construct($nama_pegawai, $gaji_pegawai);
        $this->tunjangan = $tunjangan;
    }

    // Polimorfisme, dengan Overriding/Menimpa karakteristik
    #[Override]
    public function hitungGaji()
    {
        // Ambil Gaji Pokok dari parent lalu tambahkan tunjangan
        return parent::hitungGaji() + $this->tunjangan;
    }
}

// === PASTIKAN FUNGSI INI BERADA DI ATAS SEBELUM DIPANGGIL ===
// Buat fungsi untuk melihat hasil penerapan polimorfisme
function cetakGaji($pegawai) {
    echo "Gaji " . $pegawai->getNama() . ": Rp." . 
    number_format($pegawai->hitungGaji(), 0, ',', '.') . "<br>";
}

// Penggunaan Class dan Fungsi (Pemanggilan objek)
$pegawaiBiasa = new Pegawai("Galih", 3000000);
$pegawaiFreelancer = new freelancer("Lenskep", 2000000, 4);
$pegawaiTetap = new KaryawanTetap("Tutik", 5000000, 2000000);

// Menggunakan satu fungsi yang sama untuk berbagai objek
cetakGaji($pegawaiBiasa);
cetakGaji($pegawaiFreelancer);
cetakGaji($pegawaiTetap);

?>