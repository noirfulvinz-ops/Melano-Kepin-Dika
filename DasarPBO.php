<?php
//pseudecode
//class = pesawat
//property = Noregistrasi, Merk, Warna, Tahun
//method = terbang(), mendarat()
//objek1 : pesawat_garuda
//No_Registrasi = PK-GIA
//Merk = Boeing 737
//Warna = Putih Biru
//Tahun = 2021
//objek2 : pesawat LionAir
//PK-LQP
//Airbus A320
//Merah Putih
//2019

class Pesawat {
    
    public string $namaMaskapai;
    public string $jenisPesawat;
    public int $ketinggianTerbang;

    public function __construct(string $maskapai, string $jenis, int $tinggi) {
        $this->namaMaskapai = $maskapai;
        $this->jenisPesawat = $jenis;
        $this->ketinggianTerbang = $tinggi;
    }

    public function infoPenerbangan(): void {
        echo " Pesawat {$this->namaMaskapai} berjenis {$this->jenisPesawat} sedang mengudara di ketinggian {$this->ketinggianTerbang} kaki.\n";
    }
}

$pesawatSatu = new Pesawat("Lion Air", "Boeing 737", 35000);
$pesawatDua  = new Pesawat("Garuda", "Airbus A320", 32000);

$pesawatSatu->infoPenerbangan();
$pesawatDua->infoPenerbangan();

?>