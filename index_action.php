<?php

//for local xampp
error_reporting(0);
ob_start();

include('config.php');

$action = $_POST['action'];

if ($action == "sportlogin") {
    $portfolio = $_POST['portfolio'];
    $gpid = $_POST['gpid'];
    //check user have login
    if (isset($_SESSION["esportclient_username"])) {
        $username = $_SESSION["esportclient_username"];
        $password = $_SESSION["esportclient_userpassword"];
        $_SESSION["esportclient_portfolio"] = $portfolio;
        $_SESSION["esportclient_gpid"] = $gpid;
        $device = getDeviceType();

        mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
        mysqli_begin_transaction($con);

        try {
            $sql = "SELECT * FROM tblplayer WHERE UserName=? AND Password=? FOR UPDATE";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();
                $serverid = $row['ServerID'];

                // Call API
                $url = "https://ex-api-demo-yy.568win.com/web-root/restricted/player/login.aspx";

                $postData = [
                    "Lang" => "EN",
                    "Device" => $device,
                    "BetCode" => "string",
                    "GameId" => 0,
                    "GpId" => $gpid,
                    "Username" => $username,
                    "Portfolio" => $portfolio,
                    "IsWapSports" => false,
                    "CompanyKey" => $companykey,
                    "ServerId" => $serverid
                ];

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json'
                ]);

                //for local xampp
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Only for dev
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Only for dev

                $response = curl_exec($ch);
                curl_close($ch);

                $apiResponse = json_decode($response, true);

                //check error log in local xampp
                error_log("API Response: " . print_r($apiResponse, true));

                if (isset($apiResponse['url']) && !empty($apiResponse['url'])) {
                    mysqli_commit($con);

                    $url = $apiResponse['url'];
                    if (strpos($url, '//') === 0) {
                        $url = 'https:' . $url;
                    }

                    //for local xampp
                    ob_clean();

                    // Redirect to one-time login URL
                    echo json_encode([
                        "status" => "success",
                        "redirect_url" => $url
                    ]);
                    exit();
                } 
                else {
                    mysqli_rollback($con);
                    //for local xampp
                    ob_clean();

                    echo json_encode([
                        "status" => "error",
                        "message" => "No URL received from API."
                    ]);
                    exit();
                }
            } 
            else {
                mysqli_rollback($con);
                echo "Invalid credentials.";
            }
        } 
        catch (Exception $e) {
            mysqli_rollback($con);
            error_log($e->getMessage());
            //for local xampp
            ob_clean();

            echo "System error.";
        }
    }
    else{
        echo 404;
    }  
}

if ($action == "logout"){
    session_unset();
    echo 1;
}

function getDeviceType() {
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $mobileKeywords = ['android', 'iphone', 'ipad', 'ipod', 'blackberry', 'windows phone'];

    foreach ($mobileKeywords as $keyword) {
        if (strpos($userAgent, $keyword) !== false) {
            return 'm'; // Mobile
        }
    }
    return 'd'; // Desktop
}

?>