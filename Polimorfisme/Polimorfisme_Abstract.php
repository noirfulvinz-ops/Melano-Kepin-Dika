<?php
   // kita buat dulu abstract class
   //abstract itu adalah class yang tidak bisa diinstansiasi langsung, tapi bisa diwariskan ke child class
   abstract class NotifikasiWeb{
    protected string $penerima;
    protected string $pesan;

    public function __construct(string $penerima, string $pesan)
    {
        $this->penerima = $penerima;
        $this->pesan = $pesan;
    }

    //method biasa yg diwariskan dan digunakan langsung oleh kelas turunannya
    public function getInfoPengiriman(): string{
        return "Mengirim ke: {$this->penerima}";
        }

    //abstract method: kontrak wajib yg harus di override oleh kelas turunannya
    abstract public function kirimNotifikasi(): void;
    }

//kelas turunan 1: notifikasi via email
class NotifikasiEmail extends NotifikasiWeb{
    private string $subject;

    public function __construct(string $penerima, string $pesan, string $subject)
    {
        parent::__construct($penerima, $pesan);
        $this->subject = $subject;
    }

    //Wajib meng-override abstract method dari parent class
    #[Override]
    public function kirimNotifikasi(): void
    {
        echo "<div style='border: 2px solid #007bff;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f8f9fa;'
        >";

        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
       
        }
    }

//Kelas Turunan 2: Notifikasi via WhatsApp
class NotifikasiWA extends NotifikasiWeb{
    //wajib override abstract method dari parent
    public function kirimNotifikasi(): void
    {
        echo "<div style='border:2px solid #28a745;
                    padding: 10px;
                    margin-bottom:10px;
                    background-color: #e8f5e9;
                    '>";

        echo "<h4>[WhatsApp MESSAGE]</h4>";
        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
        }
    }

//Kelas Turunan 3: Notifikasi Browser
class NotifikasiBrowser extends NotifikasiWeb{
    private string $browserApp;

    public function __construct(string $penerima, string $pesan, string $browserApp)
    {
        parent::__construct($penerima, $pesan);
        $this->browserApp = $browserApp;
    }

    //wajib override abstract method dari parent
    public function kirimNotifikasi(): void
    {
        echo "<div style='border:1px solid #ffc107;
                padding: 10px;
                margin-bottom:10px;
                background-color: #fff3cd;
                '>";

        echo "<h4>[PUSH NOTIF] - Browser: {$this->browserApp}</h4>";
        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
}

//Kelas Turunan 4: Notifikasi GitHub
class NotifikasiGitHub extends NotifikasiWeb{
    private string $repository;

    public function __construct(string $penerima, string $pesan, string $repository)
    {
        parent::__construct($penerima, $pesan);
        $this->repository = $repository;
    }

    //wajib override abstract method dari parent
    public function kirimNotifikasi(): void
    {
        echo "<div style='border: 2px solid #24292e;
                padding: 10px;
                margin-bottom: 10px;
                background-color: #f1f8ff;
                '>";

        echo "<h4>[GitHub NOTIFICATION] - Repository: {$this->repository}</h4>";
        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
}

//Buat class manager untuk menerapkan polimorfisme
class NotifikasiManager{
    //menerima tipe data berdasار abstract class apapun objeknya, asalkan turunan dari NotifikasiWeb, bisa masuk
    public static function prosesKirim(NotifikasiWeb $notif): void{
        $notif->kirimNotifikasi();
    }
}

//Penggunaan dan instansiasi objek
echo "<h2>Dashboard Simulasi Pengiriman Notifikasi Web</h2>";

//membuat berbagai macam objek notifikasi
$notif1 = new NotifikasiEmail("Steve@gmail.com", "Akun anda berhasil didaftarkan.", "Konfirmasi akun");
$notif2 = new NotifikasiWA("08587731212", "Kode OTP Anda adalah 0977, Jangan berikan ke siapapun!");
$notif3 = new NotifikasiBrowser("Token_Device_Asus", "Ada diskon 40% untuk produk pilihan anda!", "Google Chrome");
$notif4 = new NotifikasiGitHub("Galih-Fauzi", "Data codingan berhasil di kirim ke repository.", "Project-Polimorfisme");

//mengirimkan dan menampilkan semua notif secara polimorfisme melalui manager
NotifikasiManager::prosesKirim($notif1);
NotifikasiManager::prosesKirim($notif2);
NotifikasiManager::prosesKirim($notif3);
NotifikasiManager::prosesKirim($notif4);