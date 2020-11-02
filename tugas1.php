<?php

//trait
trait Hewan
{
    public $nama,
        $darah = 50,
        $jumlahKaki,
        $keahlian;
    public function atraksi()
    {
        return "$this->nama, memeliki keahlian {$this->keahlian}";
    }
}

trait Fight
{
    public $attackPower,
        $defensePower;

    public function serang($hewan = ' ---isikan hewan (elang/ harimau)--- ')
    {
        return "$this->nama, sedang menyerang {$hewan}";
    }
    public function diserang()
    {
        $darah = $this->darah;
        $ap = $this->attackPower;
        $dp = $this->defensePower;
        $pendarahan = $darah - $ap / $dp;
        if ($darah == 0) {
            echo "$this->nama Tewas";
        }
        //darah sekarang – attackPower penyerang / defencePower yang diserang”
        echo "$this->nama , sedang diserang";
        echo "<br>";
        return "darah tinggal $pendarahan";
    }
}

class Elang
{
    use Hewan, Fight;
    public function __construct($nama = 'Elang')
    {
        $this->nama = $nama;
        $this->darah = 50;
        $this->jumlahKaki = 2;
        $this->keahlian = 'terbang tinggi';
        $this->attackPower = 10;
        $this->defensePower = 5;
    }
    public function getInfoHewan()
    {
        return " $this->nama , Jumlah kaki {$this->jumlahKaki}, 
                keahliannya {$this->keahlian} attack power: {$this->attackPower}
                defense power : {$this->defensePower} ";
    }
}

class Harimau
{
    use Hewan, Fight;
    public function __construct($nama = 'Harimau')
    {
        $this->nama = $nama;
        $this->darah = 50;
        $this->jumlahKaki = 4;
        $this->keahlian = 'Lari kencang';
        $this->attackPower = 7;
        $this->defensePower = 8;
    }
    public function getInfoHewan()
    {
        return " $this->nama , Jumlah kaki {$this->jumlahKaki}, 
        keahliannya {$this->keahlian} attack power: {$this->attackPower}
        defense power : {$this->defensePower} ";
    }
}

$elang1 = new Elang('Elang1');
$harimau1 = new  Harimau('Harimau Sumatra');

echo $elang1->getInfoHewan();
echo '<hr>';
echo $harimau1->getInfoHewan();
echo '<hr>';
echo $harimau1->atraksi();
echo '<hr>';
echo $elang1->atraksi();
echo '<hr>';
echo $elang1->serang('harimau');
echo '<hr>';
echo $elang1->diserang();
echo '<hr>';
echo $harimau1->serang('elang');
echo '<hr>';
echo $harimau1->diserang();
echo '<hr>';
