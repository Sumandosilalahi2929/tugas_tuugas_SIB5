<?php
class gempa {
    private $lokasi;
    private $skala;

    //konstruktur untuk menghantarkan variable atau paramater kedalam file lainnnya
    public function __construct ($lokasi, $skala){
        $this->lokasi = $lokasi;
        $this->skala = $skala;
    }
    private function dampak ($skala) {
        $this->skala = $skala;
        if ($skala >= 0 && $skala <=2)
            $dampak = 'Tidak Terasa';
        else if($skala >2 && $skala <= 4)
            $dampak = 'Bangunan Retak-Retak';
        else if($skala >4 && $skala <= 6)
            $dampak = 'Berpotensi Tsunami';
        return $dampak;
        }
        public function cetak(){
            echo '<br><hr>Lokasi : '.$this->lokasi;
            echo '<br>Skala : '.$this->skala;
            echo '<br>Dampak : '.$this->dampak($this->skala);
        }
    }


?>