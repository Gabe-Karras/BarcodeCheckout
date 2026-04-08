<?php
session_start();
session_unset();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POS System – Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            justify-content: space-between;
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
            margin-top: 40px;
            font-size: 64px;
            color: white;
            letter-spacing: 4px;
        }

        .button-container {
            margin-bottom: 60px;
            display: flex;
            gap: 40px;
        }

        .btn {
            padding: 20px 40px;
            font-size: 22px;
            min-width: 260px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-checkout {
            background-color: #28a745;
            color: white;
        }

        .btn-member {
            background-color: #007bff;
            color: white;
        }

        .popup {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
            z-index: 100;
        }

        .popup-content {
            font-size: 18px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .continue-btn {
            padding: 10px 15px;
            font-size: 14px;
            min-width: 50px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background-color: #28a745;
            color: white;
        }

        .cancel-btn {
            padding: 10px 15px;
            font-size: 14px;
            min-width: 50px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>

    <div class="title">WELCOME</div>

    <div class="button-container">
        <a href="index.php">
            <button class="btn btn-checkout">Begin Checkout</button>
        </a>

        <button class="btn btn-member">Member Login</button>
    </div>

    <!-- Popups for membership login -->
    <div id="memberPopup", class="popup">
        <div class="popup-content" style="width: 400px; height: 180px;">
            <form method="post" action="HomePage.php" style="text-align: center;">
                <label for="code">Scan membership card:</label>
                <input type="text" id="memberCode" name="code" style="font-size: 18px; width: 9em;">
                <p>OR</p>
                <label for="phone">Enter phone number:</label>
                <input type="text" id="memberPhone" name="phone" style="font-size: 18px; width: 10em;">
                <br>
                <br>
                <span style="margin-top: 10px;">
                    <button id="cancelBtn" class="cancel-btn">
                        Cancel
                    </button>
                    <button class="continue-btn" type="submit">
                        Continue
                    </button>
                </span>
            </form>
        </div>
    </div>

    <div id="successPopup", class="popup", style="display: flex;">
        <div class="popup-content", style="height: 75px;">
            <p>Welcome back, !</p>
        </div>
    </div>

</body>
</html>

