<?php 
date_default_timezone_set("Asia/Jakarta");
$conn = new mysqli("localhost","root","","bidan");
error_reporting(0);
session_start();
function dateIndonesian($date){
	$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
	$array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
	$date  = strtotime($date);
	$hari  = $array_hari[date('N',$date)];
	$tanggal = date ('j', $date);
	$bulan = $array_bulan[date('n',$date)];
	$tahun = date('Y',$date);
	$formatTanggal = $hari.", ".$tanggal." ".$bulan." ".$tahun;
	return $formatTanggal;
}
function bulan($bln)
{
	if ($bln==1) {$string = "Januari";}
	elseif ($bln==2) {$string = "Februari";}
	elseif ($bln==3) {$string = "Maret";}
	elseif ($bln==4) {$string = "April";}
	elseif ($bln==5) {$string = "Mei";}
	elseif ($bln==6) {$string = "Juni";}
	elseif ($bln==7) {$string = "Juli";}
	elseif ($bln==8) {$string = "Agustus";}
	elseif ($bln==9) {$string = "September";}
	elseif ($bln==10) {$string = "Oktober";}
	elseif ($bln==11) {$string = "November";}
	elseif ($bln==12) {$string = "Desember";}
	return $string;
}
?>