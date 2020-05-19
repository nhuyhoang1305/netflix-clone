<?php
    require_once("PayPal-PHP-SDK/autoload.php");

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'Ab6PNunPkFns-LBCgd_cEL0Fo-w8hAfw16J_RtxGYo7_IfvJ8180PqwJxVtevEmotzWYnA4BkUzbLx0j',     // ClientID
            'ELmNIg5krQ3GiEexifEhAgASEBgCioVeAbT8xUVsW4ItYaupSEr_v4Xn8bdnUeAx7wg_r1NkjNf6ZrVA'      // ClientSecret
        )
    );
?>

