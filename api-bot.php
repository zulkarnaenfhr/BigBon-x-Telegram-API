<?php 
// define('BOT_TOKEN', '2114872958:AAEpeTVx9Mi3G-r_W1i0P-G_mrt6WlPVE1Q');
// define('CHAT_ID','1062055729');

// function kirimTelegram($pesan){
//     $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendmessage?chat_id=".CHAT_ID."&text=$pesan";
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//     curl_setopt($ch, CURLOPT_URL, $API);
//     $result = curl_exec($ch);
//     curl_close($ch);
//     return $result;
// }
// $kirimPesan = json_decode(file_get_contents("https://api.bingbon.com/api/v1/market/symbols"), TRUE); 
// for($i=0; $i<47; $i++){
//     $asset = $kirimPesan['data']['result'][$i]['base_currency'];
//     $pair = $kirimPesan['data']['result'][$i]['quote_currency'];
//     $tesPesan = $kirimPesan['data']['result'][$i]['last_price'];
//     $tesPesan1 = $kirimPesan['data']['result'][$i]['high'];
//     $tesPesan2 = $kirimPesan['data']['result'][$i]['low'];
//     $lasthigh = $tesPesan1-$tesPesan;
//     $lastlow = $tesPesan-$tesPesan2;
//     $tb .= "Asset : ".$asset. 
//                 "_". $pair. 
//                 "%0aLast Price : ".$tesPesan.
//                 "%0aHigh : ". $tesPesan1.
//                 "%0aLow : ". $tesPesan2.
//                 "%0aLast-high : ". $lasthigh.
//                 "%0aLast-Low  : ". $lastlow.
//                 "%0a%0a%0a";
// }
// kirimTelegram($tb);

 
define('BOT_TOKEN', '2114872958:AAEpeTVx9Mi3G-r_W1i0P-G_mrt6WlPVE1Q');
define('CHAT_ID','1062055729');

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
for($i=0; $i<47; $i++){
    $asset = $kirimPesan['data']['result'][$i]['base_currency'];
    $pair = $kirimPesan['data']['result'][$i]['quote_currency'];
    $tesPesan = $kirimPesan['data']['result'][$i]['last_price'];
    $tesPesan1 = $kirimPesan['data']['result'][$i]['high'];
    $tesPesan2 = $kirimPesan['data']['result'][$i]['low'];
    $lasthigh = $tesPesan1-$tesPesan;
    $lastlow = $tesPesan-$tesPesan2;
    $tb .="Nomor : ".$i. "%0aAsset : ".$asset. 
                "_". $pair. 
                "%0aLast Price : ".$tesPesan.
                "%0aHigh : ". $tesPesan1.
                "%0aLow : ". $tesPesan2.
                "%0aLast-high : ". $lasthigh.
                "%0aLast-Low  : ". $lastlow.
                "%0a%0a%0a";      
    if($i == 45){
        kirimTelegram($tb);
    }
}
// iki tinggal buat fungsi yaopo carae isok ngirim keseluruhan jadi 1 langsung, ora print 1 1 pake loop
?>