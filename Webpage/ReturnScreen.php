<?php
// Get payment method from url and put it in the session
session_start();
if (isset($_GET['method'])) {
    $_SESSION['payment_method'] = $_GET['method'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        body {
            background: url("PoS_System_Background.png") no-repeat center center fixed;
            background-size: cover;

            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Overlay for readability */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            z-index: -1;
        }

        .title {
            margin-top: 120px;
            font-size: 64px;
            color: white;
            letter-spacing: 4px;
        }

        .text {
            font-size: 48px;
            color: white;
            letter-spacing: 3px;
            display: flex;
        }

        .btn {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 40px;
            font-size: 26px;
            min-width: 260px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background-color: #28a745;
            color: white;
            margin-top: 60px;
        }
    </style>
</head>

<body>
    <div class="title">THANK YOU FOR SHOPPING WITH US!</div>
    <div class="text" style="margin-top: 40px;">
        <label style="margin-right: 10px;">This kiosk will reset in</label>
        <label id="countdown">10</label>
    </div>
    <a class="btn" href="PrintReceipt.php">Print Receipt</a>
</body>

<script>
// Tick number down to zero then return to home page
function goDown() {
    let label = document.getElementById("countdown");
    let time = Number(label.textContent);
    time = time - 1;
    if (time < 1) {
        window.location.href = "HomePage.php";
    }
    label.textContent = time.toString();
    setTimeout(goDown, 1000);
}
setTimeout(goDown, 1000);
</script>