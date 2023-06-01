<?php

use App\Models\SppdModel;

if(!function_exists("tanggal_indonesia")){
    function tanggal_indonesia($tanggal) {
        $array_bulan=array("01"=>"Januari",
        "02"=>"Februari",
        "03"=>"Maret",
        "04"=>"April",
        "05"=>"Mei",
        "06"=>"Juni",
        "07"=>"Juli",
        "08"=>"Agustus",
        "09"=>"September",
        "10"=>"Oktober",
        "11"=>"Nopember",
        "12"=>"Desember");
        $tgl_temp=explode("-",$tanggal);
        $tgl=$tgl_temp[2];
        $bln=$tgl_temp[1];
        $thn=$tgl_temp[0];
        $nama_bulan=$array_bulan[$bln];
        return $tgl." ".$nama_bulan." ".$thn;
    }
}

if(!function_exists("no_surat")){
    function no_surat($kode,$noAgenda,$bulan,$tahun) {
        $rom = array(
            "01"=>"I",
            "02"=>"II",
            "03"=>"III",
            "04"=>"IV",
            "05"=>"V",
            "06"=>"VI",
            "07"=>"VII",
            "08"=>"VIII",
            "09"=>"IX",
            "10"=>"X",
            "11"=>"XI",
            "12"=>"XII"
        );
        return $kode." / ".$noAgenda." / ".$rom[$bulan]." / ".$tahun;
    }
}

if(!function_exists("no_agenda")){
    function no_agenda() {
        return substr(SppdModel::count() + 10001, 1);
    }
}

if(!function_exists("tanggal_indonesia2")){
    function tanggal_indonesia2($tanggal2) {
        $array_bulan2 = array(
            "00"=>"00",
            "01"=>"01",
            "02"=>"02",
            "03"=>"03",
            "04"=>"04",
            "05"=>"05",
            "06"=>"06",
            "07"=>"07",
            "08"=>"08",
            "09"=>"09",
            "10"=>"10",
            "11"=>"11",
            "12"=>"12"
        );
        $tgl_temp2=explode("-",$tanggal2);
        $tgl2=$tgl_temp2[2];
        $bln2=$tgl_temp2[1];
        $thn2=$tgl_temp2[0];
        $nama_bulan2=$array_bulan2[$bln2];
        return $tgl2."-".$nama_bulan2."-".$thn2;
    }
}
?>