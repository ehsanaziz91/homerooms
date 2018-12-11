<?php
include('../../Connections/connection.php');

if(isset($_POST['abc']))
{
    $userid = $_REQUEST['userid'];
    // Authorisation details.
	$username = "homeroomsmeritdemerit@gmail.com";
	$hash = "a3ccf09f10a593e325a39c589dfb86a450bf0f9e3069b954919eddad7f0d2afa";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "HMDS"; // This is who the message appears to be from.
	$numbers = $_POST['num']; // A single number or a comma-seperated list of numbers
	$message = "Amaran Kepada Pelajar! Saya dengan ini diarahkan untuk memaklumkan bahawa anak / jagaan Tuan / Puan bahawa telah mengumpul pungutan mata demerit disiplin sekolah pada tahap tertinggi berturut- turut mengikut Buku Peraturan Sistem Demerit Sekolah. Sila maklumi pihak sekolah atau berhubung terus Guru Besar dengan kadar segera untuk berbincang.Sekian untuk makluman. Terima Kasih.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
    
    if($result)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('SMS has been sent !'),location.href='../admin_studListPage.php?userid=$userid'";
        echo "</script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('SMS could not be sent !'),location.href='../admin_studListPage.php?userid=$userid'";
        echo "</script>";
    }
}

?>
