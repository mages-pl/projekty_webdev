<?php
 $subject = 'Wiadomość z '.$_SERVER['SERVER_NAME'].' od '.$_POST['imie_nazwisko'];
 
$headers = "From: " . strip_tags($_POST['e_mail']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['e_mail']) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$msg = "Wiadomość od: ".$_POST['e_mail']."<br/><br/>".$_POST['wiadomosc']."<br/><br/>Pozdrawiam,<br/>".$_POST['imie_nazwisko'];

if(!empty($_POST['e_mail'])&&!empty($_POST['imie_nazwisko'])&&!empty($_POST['wiadomosc'])) {
    mail("michal.jendraszczyk@gmail.com",$subject,$msg,$headers);
    echo "Wiadomość wysłana";

} else { 
    echo "Uzupełnij wszystkie pola";
}
?>
