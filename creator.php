<?php
error_reporting(0);
$trying = "5"; //try in 2 times

function create_random($length)
{
    $data = '1234567890';
    $string = '';
    for($i = 0; $i < $length; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return $string;
}


echo "Starting...
";

for ($i= 1; $i <= $trying; $i++) {

echo "Generating Account...
";

$namadepanstring = "Dewi,Nasyiah,Dartono,Siregar,Zulfa,Riyanti,Candrakanta,Melani,Susanti,Hasim,Mardhiyah,Melani,Wadi,Zulkarnain,Wahyu,Nababan,Rika,Rahmawati,Wirda,Oni,Winarsih,Daliono,Mahfud,Saptono,Fadli,Fadil,Fadiel,Bakijan,Winarno,Karta,Rajata,Latika,Wahyuni,Jagaraga,Natsir,Dwi,Prakasa,Raden,Saragih,Kajen,Dagel,Halim,Lasmanto,Wacana,Balijan,Tampubolon,Cager,Prayoga,Vanya,Susanti,Cici,Laudya,Valen,Putri,Ilyas,Yahya";
$deans = explode(",",$namadepanstring);
$depan = rand(0,10);
$namadepan = $deans[$depan];

$namaakhirstring = "Frances,Rahmawati,Vanya,Wahyu,Dagel,Debby,Yusuf,Mansur,Tuper,Andstein,Posting,Dagelan,Shitpost,Indo,Poster";
$akhirs = explode(",",$namaakhirstring);
$akhir = rand(0,100);
$last = $akhirs[$akhir];  
  
$username = "$namadepan$last$depan".create_random(4);
$email = "$username@nolifecoder.com";
$password = "AlexaMP-123#";
$fullname = "$namadepan $last";

$name = "$fullname";


$instagram = curl_init(); 
curl_setopt($instagram, CURLOPT_URL, "https://www.instagram.com/accounts/web_create_ajax/"); 
curl_setopt($instagram, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($instagram, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($instagram, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($instagram, CURLOPT_HTTPHEADER, array(
	'Host: www.instagram.com',
	'X-CSRFToken: EJMrAsTOEi1SKiZLHzNf2RMBEZTQkI9I',
	'X-Instagram-AJAX: 1',
	'X-Requested-With: XMLHttpRequest',
	'Referer: https://www.instagram.com/',
	'Cookie: csrftoken=EJMrAsTOEi1SKiZLHzNf2RMBEZTQkI9I;'
));
curl_setopt($instagram, CURLOPT_POSTFIELDS, "email=$email&password=$password&username=$username&first_name=$name");
$response = curl_exec($instagram);


echo "Registering Account to Instagram...
";

echo "$response
";


echo "Test Login...
";


$login = curl_init(); 
	curl_setopt($login, CURLOPT_URL, "https://www.instagram.com/accounts/login/ajax/"); 
	curl_setopt($login, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($login, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($login, CURLOPT_HTTPHEADER, array(
		'X-CSRFToken: EJMrAsTOEi1SKiZLHzNf2RMBEZTQkI9I',
		'X-Instagram-AJAX: 1',
		'X-Requested-With: XMLHttpRequest',
		'Referer: https://www.instagram.com/',
		'Cookie: csrftoken=EJMrAsTOEi1SKiZLHzNf2RMBEZTQkI9I;'
    ));
	curl_setopt($login, CURLOPT_POSTFIELDS, "username=$username&password=$password");
	$response = curl_exec($login);
	if(eregi('"authenticated": true,', $response))
	        {
echo "Login Sucessfuly -> $username:$password
";
		}
		else
		{
			if(eregi("checkpoint", $response))
			{
				echo "CheckPoint -> $username:$password
";
echo "
Connection Close..
";
			}
			else
			{
				if(eregi("Please wait a few minutes before you try again.", $response))
				{
					echo " Your Server IP Blocked";
echo "
Connection Close..
";
				}
				else
				{
					echo "Failed Login -> $username:$password
";
echo "
Connection Close..

";
$fp = fopen("Apple-result.txt", "a");
fputs($fp, "$mailist ==> $email \r\n");
fclose($fp);
				}
			}
		}
	curl_close($login);

if($i < $trying){
echo "Trying...



";
}else{
echo "Job Finished...



";
}

}

echo "[ Created by Nolifecoder1337 ]
";
echo "
Version 1.00.1.01
";
echo "Check Update in www.nolifecoder.my.id
Contact : fb.com/satriawdd

";


?>