<?php
// buat parent class
class karyawan{
    private $nama;
    protected $gajiPokok;

    public function __construct($nama, $gajiPokok)
    {
        $this->nama = $nama;
        $this->gajiPokok = $gajiPokok;
    }

    public function getNama(){
        return $this->nama; // Diperbaiki dari "retrun" menjadi "return"
    }

    // method asli untuk ambil gaji pokok
    public function hitungTotalGaji(){
        return $this->gajiPokok;
    }
}

//Buat Child Class / Kelas Turunan
class Manager extends Karyawan{
    private $bonus;

    public function __construct
    ($nama, $gajiPokok, $bonus)
    {
        //panggil konstruk parent
        parent::__construct($nama, $gajiPokok);
        $this->bonus;
    }

    //method baru untuk bonus manager
    public function getBonus() {
        return $this->bonus;
    }
}

//Penggunaan Kode
$staff = new Karyawan("Budi", 5000000);
$manager1 = new Manager("Andi", 6000000, 1000000);

//1. staff menggunakan method bawaan karyawan
echo "Nama Karyawan: " .$staff->getNama().
" | Total Gaji: Rp. ". number_format($staff->hitungTotalGaji()
,0, ',', '.') . "<br>";

//2. Manager menggunakan method karyawan ditambah getBonus milik child class
$totalGajiManager = $manager1->hitungTotalGaji() +
$manager1->getBonus();

echo "Nama Manager: " .$manager1->getNama()."
| Total Gaji Rp. " .number_format($totalGajiManager,
0, ',', '.') . "<br>";

?>