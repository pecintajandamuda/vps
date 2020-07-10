<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://mall.shopee.co.id/api/v2/item/get?itemid=3531481147&shopid=83382147");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'id-ID,en-US;q=0.9';
$headers[] = 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'User-Agent: Dalvik/2.1.0 (Linux; U; Android 8.1.0; SM-G610F Build/M1AJQ)';
$headers[] = 'mall.shopee.co.id';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
curl_close ($ch);
echo "\n";
$decode = json_decode($result,true);
$namaproduk = $decode["item"]["name"];
$stok = "normal";//$decode["item"]["item_status"];
$stokproduk = $decode["item"]["normal_stock"];
 
echo "\n";

if($stok == "normal"){ 
$jamres='Waktu Restok '.date('[d-m-Y] [H:i:s]').''; echo $jamres; $pesan = ''.$namaproduk.' '.$jamres.' Stok Tersedia ['.$stokproduk.']'; $TOKEN  = "1053127154:AAEURHxwKIkN-SgF_vhCOW-NsiLEdVqfooU"; $chatid = "-1001215645002"; $method	= "sendMessage"; $url    = "https://api.telegram.org/bot" . $TOKEN . "/". $method; $post = [ 'chat_id' => $chatid, 'text' => $pesan ]; $header = [ "X-Requested-With: XMLHttpRequest", "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" ]; $ch = curl_init(); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_HTTPHEADER, $header); curl_setopt($ch, CURLOPT_POSTFIELDS, $post ); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); $datas = curl_exec($ch); $error = curl_error($ch); $status = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch); $debug['text'] = $pesan; 
$chatid2 = "-1001215645002";
$post2 = [ 'chat_id' => $chatid2, 'text' => $pesan ]; 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post2 );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$datas = curl_exec($ch); 
$error = curl_error($ch); 
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch); 
$debug['text'] = $pesan;
echo "\n";
}elseif($stok == "sold_out"){
echo $namaproduk;
echo "\n";
echo "Habis!!\n";
//sleep(3);
system("clear");
}else{
echo "Jaringan Kurang Bagus!!\n";
}
