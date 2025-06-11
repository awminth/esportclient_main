<!-- header -->
<?php
    include("../config.php");
    include(root."master/header.php");
?>
<!-- Show IFrame -->
<?php
    // localhome.php
    $allowedDomains = [
        '568win.com',
        'ex-api-demo-yy.568win.com',
        'ggppqqgg.com',
        'sports-demo.ggppqqgg.com' // သင်သုံးနေတဲ့ domain
    ];

    if (isset($_GET['target_url'])) {
        $url = $_GET['target_url'];
        $parsedUrl = parse_url($url);
        $host = $parsedUrl['host'] ?? '';

        if (in_array($host, $allowedDomains)) {
            $safeUrl = htmlspecialchars($url);
            echo '
            <div class="iframe-container">
                <iframe 
                    src="' . $safeUrl . '" 
                    referrerpolicy="unsafe-url"
                    sandbox="allow-same-origin allow-scripts allow-popups"
                    ></iframe>
            </div>';
        } else {
            echo "<p>This URL is not allowed to be shown in an iframe.</p>";
        }
    } else {
        echo "<p>No target URL provided.</p>";
    }
?>
<!-- footer -->
<?php
    include(root."master/footer.php");
?>