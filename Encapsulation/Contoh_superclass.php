<?php
class person{
    private string $nama;
    private string $alamat;

    public function __construct(string $nama, string $alamat){
        $this->nama = $nama;
        $this->alamat = $alamat;
    }

    public function tampilkanInfo(): void{
        echo "Nama : " .$this->nama. "<br>";
        echo "Alamat :" .$this->alamat. "<br>";
    }
    //getter untuk di akses subclass karena prroperti private
    public function Getnama():string{
        return $this->nama;
    }
    public function Getalamat(): string{
        return $this->alamat;
    }
}