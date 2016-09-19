<?php
/**
 * cekip.php
 *
 * Command line interface for Check IP Address
 *
 * @author     Excel Dwi Oktavianto "N07HY" <excelokta@gmail.com>
 * @copyright  2016 Excel
 * @license    http://www.apache.org/licenses/  Apache License 2.0
 * @version    0.5
 */

function getLink($url){
   $curl_handle=curl_init();
   curl_setopt($curl_handle,CURLOPT_URL,$url);
   curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,0);
   curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
   $result = curl_exec($curl_handle);
   curl_close($curl_handle);
  
   return $result;
}
$file_contents = getLink("http://cekip.com");
preg_match('/<h2>Hostname: (.*?)<\/h2>/s',$file_contents,$ip);
preg_match('/<h2>City: (.*?)<\/h2>/s',$file_contents,$kota);
preg_match('/<h2>Country: (.*?)<\/h2>/s',$file_contents,$negara);

$city = "";
if($kota[1] == "") {
  $city = "Tidak Ditemukan";
} else {
  $city = $kota[1];
}

echo "\n==================================\n";
echo "[-] IP Address: ".$ip[1]."\n";
echo "[-] Kota: ".$city."\n";
echo "[-] Negara: ".$negara[1]."\n";
echo "==================================\n";
echo "=   AUTHOR: N07HY | Version 0.5  =\n";
echo "==================================\n\n";
?>
