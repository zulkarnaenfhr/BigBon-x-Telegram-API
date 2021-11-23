<?php
 
define('BOT_TOKEN', '2114872958:AAEpeTVx9Mi3G-r_W1i0P-G_mrt6WlPVE1Q');
define('CHAT_ID','1536466209');

function kirimTelegram($pesan){
    $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendmessage?chat_id=".CHAT_ID."&text=$pesan";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, $API);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
$kirimPesan = json_decode(file_get_contents("https://api.bingbon.com/api/v1/market/symbols"), TRUE); 
for($i=0; $i<5; $i++){
$asset = $kirimPesan['data']['result'][$i]['base_currency'];
$pair = $kirimPesan['data']['result'][$i]['quote_currency'];
$tesPesan = $kirimPesan['data']['result'][$i]['last_price'];
$tesPesan1 = $kirimPesan['data']['result'][$i]['high'];
$tesPesan2 = $kirimPesan['data']['result'][$i]['low'];
$lasthigh = $tesPesan1-$tesPesan;
$lastlow = $tesPesan-$tesPesan2;
kirimTelegram("==============================");
kirimTelegram("Asset : ". $asset);
kirimTelegram("Link : ". $asset. "_". $pair);
kirimTelegram("Harga Terakhir : ". $tesPesan);
kirimTelegram("Harga Tertinggi : ".$tesPesan1);
kirimTelegram("Harga Terendah : ". $tesPesan2);
kirimTelegram("Last High : ". $lasthigh);
kirimTelegram("Last Low : ". $lastlow);
if($lastlow===$tesPesan){
    kirimTelegram("Harga terendah adalah harga terakhir");
}
else if($lasthigh === $tesPesan){
    kirimTelegram("Harga tertinggi adalah harga terakhir");
}
else{
    kirimTelegram("Harga Diantara low dan high!");
}
}
