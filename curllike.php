<?php

error_reporting(0);

set_time_limit(0);

 

// BẠN SỬA 2 BIẾN $UID VÀ $LIST_TOKEN

$uid = '100004572219767';

$list_token = array('EAAAAAYsX7TsBAKW1ZCPZCZBwf84HIdKdS9JZC5MViLTDZBQabYikjWZAqU16JgtWYi2zdWfWKrlnzbtiM6rz499r9LDonb5W84lDuw4TEgZAxWcSeS1LYJDeXlEulZAIYQLoYPkDlH6VTg58pMkBaZAZAc7ogt1awGNAoRcGAfhJoZBZA2mmWc5CTwrxLCo3gCETFKzwiO51YAYzMppXlkJZAZBQWo');

 

$token = $list_token[rand(0,count($list_token)-1)];

 

$feed=json_decode(file_get_contents('https://graph.fb.me/'.$uid.'/feed?access_token='.$token.'&limit=1'),true); 

for($i=0;$i<count($feed['data']);$i++){

$id = $feed['data'][$i]['id'];  

$sllike = $feed['data'][$i]['likes']['count']; 

} 

$stt = explode("_", $id);

$iduser= $stt[0];

$idstt= $stt[1];

echo $idstt."<br>";

 

echo icelike($token,$idstt);

echo liketrum($token,$idstt);

 echo autolikez($token,$idstt);

 echo autolike($token,$idstt);

echo zunwho($token,$idstt);

 

function icelike($tok,$id){

// part 1

$url = "http://icelike.us/a_login.php";

$data = array(

"user" => $tok,

"submit" => "Submit"

);

echo Submit($url,$data);

echo "<br>";

// part 2

$url2 = "http://icelike.us/like.php?type=status";

$data2 = array(

"id" => $id,

"limit"=> "100",

"submit" => "Submit");

 echo Submit($url2,$data2);

}

 

 

 

function liketrum($tok,$id){

// part 1

$url = "https://like.trum.online/index.php";

$data = array(

"user" => $tok,

"submit" => "Submit"

);

Submit($url,$data);

echo "<br>";

// part 2

$url2 = "https://like.trum.online/index.php";

$data2 = array(

"id" => $id,

"submit" => "Tăng Like");

 echo Submit($url2,$data2);

}

 

 

function autolikez($tok,$id){

// part 1

$url = "http://autolikez.com/login.php?user=".$tok;

$data = array(

"null" => "null"

);

echo Submit($url,$data);

echo "<br>";

// part 2

$url2 = "http://autolikez.com/index.php";

$data2 = array(

"id" => $id,

"access_token" => $tok,

"pancal" => "SEND LIKES"

);

echo Submit($url2,$data2);

}

 

function autolike($tok,$id){

// part 1

$url = "http://autolike.ga/login.php?user=".$tok;

$data = array(

"null" => "null"

);

echo Submit($url,$data);

echo "<br>";

// part 2

$url2 = "http://autolikez.com/index.php";

$data2 = array(

"id" => $id,

"access_token" => $tok,

"pancal" => "SEND LIKES"

);

echo Submit($url2,$data2);

}

 

 

function zunwho($tok,$id){

// part 1

$url = "https://auto-like.org/login.php?user=".$tok;

$data = array(

"null" => "null"

);

echo Submit($url,$data);

echo "<br>";

// part 2

$url2 = "https://auto-like.org/zunwholiker.php?type=status";

$data2 = array(

"id" => $id,

"submit" => "SEND LIKES"

);

echo Submit($url2,$data2);

}

 

 

 

 

 

 

 

function Submit($url,$fields)

    {

$field_string = http_build_query($fields);

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$url);

curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);

curl_setopt($ch,CURLOPT_REFERER,$url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_USERAGENT,'Opera/9.80 (Android; Opera Mini/7.6.40234/37.7148; U; id) Presto/2.12.423 Version/12.16');curl_setopt($ch,CURLOPT_COOKIEFILE,'cookie.txt');

curl_setopt($ch,CURLOPT_COOKIEJAR,'cookie.txt');

curl_setopt($ch, CURLOPT_POST, count($field_string));

curl_setopt($ch,CURLOPT_POSTFIELDS,$field_string);   

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$body = curl_exec($ch);

 

if(!curl_errno($ch)) {

$info = curl_getinfo($ch);

$redir = $info['redirect_url'];

$code = $info['http_code'];

curl_close($ch);

return $body.$redir."<br>Trạng thái Header = ".$code;

}

unlink("cookie.txt"); 

curl_close($ch);

    }

?>