<?php
error_reporting(false);

header('Content-type: application/json;'); 

$phonekobs=$_GET['phone'];
$typekobs=$_GET['type'];
$hashkobs=$_GET['hash'];
$cedekobs=$_GET['code'];


//===================================

$data['phone']=$phonekobs;


if($typekobs=='getcode'){

$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_URL,"https://my.telegram.org/auth/send_password");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
//curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam1= curl_exec($ch);
curl_close($ch);    



$get =json_decode($meysam1,true);

echo $get['random_hash'];


file_put_contents('getcode.php',$meysam1);

}



$data1['phone']=$phonekobs;
$data1['random_hash']=$hashkobs;
$data1['password']=$cedekobs;
$data1['remember']="1";


if($typekobs=='login'){

$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
curl_setopt($ch, CURLOPT_URL,"https://my.telegram.org/auth/login");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam2= curl_exec($ch);
curl_close($ch);    



$ch1 = curl_init();
//curl_setopt($ch1, CURLOPT_POST, true);
//curl_setopt($ch1, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch1, CURLOPT_URL,"https://my.telegram.org/apps");
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch1, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam3= curl_exec($ch1);
curl_close($ch1);    




preg_match_all('#<strong>(.*?)</strong>#',$meysam3,$sidepath1);//[1][0]

preg_match_all('#>(.*?)</span>#',$meysam3,$sidepath2);//[1][2]



$arra=array();

$arra['App api_id']=$sidepath1[1][0];
$arra['App api_hash']=$sidepath2[1][2];


echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71','Results' =>$arra], 448);


}



if($typekobs=='makeidhash'){


$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data1);
curl_setopt($ch, CURLOPT_URL,"https://my.telegram.org/auth/login");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam2= curl_exec($ch);
curl_close($ch);    


file_put_contents('login.php',$meysam2);



$ch4 = curl_init();
//curl_setopt($ch4, CURLOPT_POST, true);
//curl_setopt($ch4, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch4, CURLOPT_URL,"https://my.telegram.org/apps");
curl_setopt($ch4, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch4, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch4, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch4, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam4= curl_exec($ch4);
curl_close($ch4);    

preg_match_all('#<input type="hidden" name="hash" value="(.*?)"/>#',$meysam4,$sidepath31);//[1][0]


file_put_contents('apps.php',$meysam4);

$tt=rand(1,999999);
$tt1=rand(1,999999);
$tt2=rand(1,999999);



$data2['hash']=$sidepath31[1][0];
$data2['app_title']="sidepath_".$tt;
$data2['app_shortname']="telegram".$tt1;
$data2['app_url']="https://t.me/sidepath".$tt2;
$data2['app_platform']="android";
$data2['app_desc']="";




$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS,$data2);
curl_setopt($ch1, CURLOPT_URL,"https://my.telegram.org/apps/create");
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch1, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam3= curl_exec($ch1);
curl_close($ch1);    

file_put_contents('create.php',$meysam3);

$ch2 = curl_init();
//curl_setopt($ch2, CURLOPT_POST, true);
//curl_setopt($ch2, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch2, CURLOPT_URL,"https://my.telegram.org/apps");
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch2, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam5= curl_exec($ch2);
curl_close($ch2);    


preg_match_all('#<strong>(.*?)</strong>#',$meysam5,$sidepath1);//[1][0]

preg_match_all('#>(.*?)</span>#',$meysam5,$sidepath2);//[1][2]

file_put_contents('apps2.php',$meysam5);

$arra=array();

$arra['App api_id']=$sidepath1[1][0];
$arra['App api_hash']=$sidepath2[1][2];


echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71','Results' =>$arra], 448);


}







if($typekobs=='makeidhash1'){

$ch4 = curl_init();
//curl_setopt($ch4, CURLOPT_POST, true);
//curl_setopt($ch4, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch4, CURLOPT_URL,"https://my.telegram.org/apps");
curl_setopt($ch4, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch4, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch4, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch4, CURLOPT_HEADER, true);
//curl_setopt($ch4, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam4= curl_exec($ch4);
curl_close($ch4);    

preg_match_all('#<input type="hidden" name="hash" value="(.*?)"/>#',$meysam4,$sidepath31);//[1][0]


file_put_contents('apps.php',$meysam4);


function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ*&#~$-@";
return substr(str_shuffle($chars),0,$length);
}

$tt=rand_string(16);
$tt1=rand_string(12);
$tt2=rand_string(14);

$data2['hash']=$sidepath31[1][0];
$data2['app_title']=$tt;
$data2['app_shortname']=$tt1;
$data2['app_url']="https://t.me/".$tt2;
$data2['app_platform']="android";
$data2['app_desc']="";




$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS,$data2);
curl_setopt($ch1, CURLOPT_URL,"https://my.telegram.org/apps/create");
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch1, CURLOPT_COOKIEFILE, "cookie.txt");


$headers = array();
$headers[] = ':authority: my.telegram.org';
$headers[] = ':method: POST';
$headers[] = ':path: /apps/create';
$headers[] = ':scheme: https';
$headers[] = 'accept: */*';
$headers[] = 'accept-encoding: gzip, deflate, br';
$headers[] = 'accept-language: en-US,en;q=0.9,fa;q=0.8';
$headers[] = 'content-length: 140';
$headers[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'origin: https://my.telegram.org';
$headers[] = 'referer: https://my.telegram.org/apps';
$headers[] = 'sec-ch-ua: " Not;A Brand";v="99", "Google Chrome";v="97", "Chromium";v="97"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36';
$headers[] = 'x-requested-with: XMLHttpRequest';

curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch1, CURLOPT_HEADER, true);
//curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam3= curl_exec($ch1);
curl_close($ch1);    

file_put_contents('create.php',$meysam3);

$ch2 = curl_init();
//curl_setopt($ch2, CURLOPT_POST, true);
//curl_setopt($ch2, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch2, CURLOPT_URL,"https://my.telegram.org/apps");
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch2, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch2, CURLOPT_HEADER, true);
//curl_setopt($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam5= curl_exec($ch2);
curl_close($ch2);    


preg_match_all('#<strong>(.*?)</strong>#',$meysam5,$sidepath1);//[1][0]

preg_match_all('#>(.*?)</span>#',$meysam5,$sidepath2);//[1][2]

file_put_contents('apps2.php',$meysam5);

$arra=array();

$arra['App api_id']=$sidepath1[1][0];
$arra['App api_hash']=$sidepath2[1][2];


echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71','Results' =>$arra], 448);


}




