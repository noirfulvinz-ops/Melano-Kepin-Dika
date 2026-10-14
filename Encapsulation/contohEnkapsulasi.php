<?php

// Contoh Konsep Enkapsulasi

class AkunBank{

    //properti dengan akses private
    private $nomorRekening;
    private $saldo;
    private $pin;

    //method construct
    public function __construct($nomorRekening, $saldoAwal, $pin){
        $this->nomorRekening = $nomorRekening;
        $this->setSaldo($saldoAwal); //Pemanggilan setter (agar bisa tervalidasi)
        $this->setPin($pin);
    }

    //kita buat getter nomor rekening (read-only)
    public function getNomorRekening(){
        return $this->nomorRekening; //tidak ada setter, karena nomor rekening
                                      //tidak bisa diubah
    }

    //buat getter dan setter untuk saldo
    public function getSaldo(){
        //kita tambahkan fungsi formatter untuk merubah tampilan nilai uang
        return "Rp. " . number_format($this->saldo, 2, ',', '.');
    }

    public function setSaldo($jumlah){
        //buat validasi bahwa saldo tidak boleh negatif
        if($jumlah >= 0){
            $this->saldo = $jumlah;
        } else {
            echo "Error: Saldo awal/perubahan tidak valid!<br>";
        }
    }

    //buat getter dan setter untuk PIN (write-only / terenkripsi:terlindungi)
    public function setPin($pinBaru){
        //validasi pin harus 6 digit angka
        if (preg_match('/^[0-9]{6}$/', $pinBaru)){
            //proses enkripsi pin
            $this->pin = password_hash($pinBaru, PASSWORD_BCRYPT);
        } else {
            echo "Error: PIN harus berupa 6 digit angka! <br>";
        }
    }

//tidak ada getter pin umtuk keamanan data
}

//Penggunaan Kode

//buat object beserta isi propertinya
$akun1 = new AkunBank("3246-786-123", 500000, "123456");

//membaca data via getter
echo "No Rekening: " . $akun1->getNomorRekening() . "<br>";
echo "Saldo Saat ini: " . $akun1->getSaldo() . "<br>";

//mengubah data via setter
$akun1->setSaldo(750000);
echo "Saldo Setelah diupdate: " . $akun1->getSaldo() . "<br>";

//ubah data dengan isi invalid
$akun1->setSaldo(-250000);
echo "Saldo Setelah diupdate: " . $akun1->getSaldo() . "<br>";

//pembuktian enkapsulasi
//mencegah akses dari luar tanpa mengikuti getter dan setter
//bisa dibandingkan dengan program sebelumnya pada cara pengaksesan properti object
$akun1->saldo = 950000; //akan fatal error karena sudah diEnkapsulasi dengan privat
 
?>
