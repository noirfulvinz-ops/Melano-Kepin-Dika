<?php
require "Contoh_superclass.php";

class siswa extends person{
    private string $nisn;

    #[Override]
    public function __construct
    (string $nama, string $alamat, string $nisn){
        //memanggil construct milik contoh_superclass
        parent::__construct($nama, $alamat);
        $this->nisn = $nisn;
    }
    public function belajar(): void{
        // sesuaikan pemanggilan method dengan superclass Anda (misal : get Nama atau tampilkanInfo)
        echo "Siswa bernama : " . $this->getNama()  ." dengan NIS: ".$this->nisn ."sedang belajar mata pelajaran RPL.<br>";
}
 
}

//pengujian inheritance melalui pembuatan objek
$Siswa1 = new Siswa ("Ahmad Dani","kendal","273223");
$Siswa1->tampilkanInfo(); //method warisan
$Siswa1->belajar();


?>