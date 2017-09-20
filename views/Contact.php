<?php

$title = "Contact";

session_start();

if (!isset($_SESSION['token'])) {
    $cstrong = true;
    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
    $_SESSION['token'] = $token;
}

require_once('./views/inc/header.php');

?>

<div id="contact_message">
    <h3>Send a Message</h3>
    <hr id="send_m_hr" />
    <form action="#" method="POST" id="send_message_form">
        <p>Name:</p>
        <input type="text" name="name" placeholder="Name ..." required />
        <p>Email:</p>
        <input type="email" name="email" placeholder="Email ..." required />
        <p>Subject:</p>
        <input type="text" name="subject" placeholder="Subject ..." required />
        <p>Message:</p>
        <textarea name="message" rows="7" placeholder="Message ..." required></textarea>
        <input type="hidden" name="nocsrf" value="<?php echo $_SESSION['token']; ?>">
        <input type="submit" value="Send" id="send_m_btn" />
        <div id="sending_m_btn">Sending ...</div>
    </form>
</div>
<div id="contact_soc_med">
    <a href="https://twitter.com/FinalTriumph_" target="_blank">
        <img src="/images/soc/twitter_d.png" class="cont_soc_img" />/FinalTriumph_</a>
    <a href="https://www.facebook.com/kaspars.andzans" target="_blank">
        <img src="/images/soc/facebook_d.png" class="cont_soc_img" />/kaspars.andzans</a>
    <a href="https://github.com/FinalTriumph" target="_blank">
        <img src="/images/soc/github_d.png" class="cont_soc_img" />/FinalTriumph</a>
    <a href="https://codepen.io/FinalTriumph/#" target="_blank">
        <img src="/images/soc/codepen_d.png" class="cont_soc_img" />/FinalTriumph</a>
</div>

<div id="popup">
    <div id="popup_message">
        <p1>Message successfully sent!</p1>
        <br />
        <button id="popup_ok">OK</button>
    </div>
</div>

<script type="text/javascript" src="/public/js/contact.js"></script>
    
<?php

require_once('./views/inc/footer.php')

?>