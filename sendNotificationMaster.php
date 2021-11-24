<?php 
    
        $id = 1062055729;
        $pesan = "halo guys";
        $token = "2110768960:AAHHf2NmJ0tiP95zF4-V_u_-wBn5O_JD2As";
        $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$id&text=$pesan";

        $curl = curl_init($url);

        curl_exec($curl);

        curl_close($curl);
        echo "<script>
                document.location.href = 'bigBonxTelegramHomepage.php'
            </script>";
?>