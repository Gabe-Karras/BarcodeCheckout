<?php
session_start();
session_unset();
require_once __DIR__ . '/../config/db_functions.php';

// Leave name empty if no membership is queried
// Set name to * if query fails
// name contains actual value if query is successful
$name = "";
$member = NULL;
if (isset($_POST['code'])) {
    $member = get_member_by_code($_POST['code']);
    if ($member == NULL) {
        $member = get_member_by_phone($_POST['phone']);
        if ($member == NULL) {
            $name = "*";
        } else {
            $name = $member->name;
            $_SESSION['membership'] = true;
        }
    } else {
        $name = $member->name;
        $_SESSION['membership'] = true;
    }
}
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

        <button class="btn btn-member" id="memberBtn">Member Login</button>
    </div>

    <!-- Popups for membership login -->
    <div id="memberPopup", class="popup">
        <div class="popup-content" style="width: 400px; height: 180px;">
            <p style="display: none; color: #ff9500;" id="failMessage">Membership not found!!</p>
            <form method="post" action="HomePage.php" style="text-align: center;">
                <label for="code">Scan membership card:</label>
                <input type="text" id="memberCode" name="code" style="font-size: 18px; width: 9em;">
                <p>OR</p>
                <label for="phone">Enter phone number:</label>
                <input type="text" id="memberPhone" name="phone" style="font-size: 18px; width: 10em;">
                <br>
                <br>
                <span style="margin-top: 10px;">
                    <button id="cancelBtn" class="cancel-btn" type="button">
                        Cancel
                    </button>
                    <button class="continue-btn" type="submit">
                        Continue
                    </button>
                </span>
            </form>
        </div>
    </div>

    <div id="successPopup", class="popup">
        <div class="popup-content", style="height: 75px;">
            <p>Welcome back, <?php echo $name ?>!</p>
        </div>
    </div>

    <script>
        const memberBtn = document.getElementById("memberBtn");
        const memberPopup = document.getElementById("memberPopup");
        const memberCode = document.getElementById("memberCode");
        const memberPhone = document.getElementById("memberPhone");
        const cancelBtn = document.getElementById("cancelBtn");
        const successPopup = document.getElementById("successPopup");
        const failMessage = document.getElementById("failMessage");

        // Decide to show popups if membership was queried
        const name = "<?php echo $name ?>";
        if (name == "*") {
            memberPopup.style.display = "flex";
            failMessage.style.display = "block";
        } else if (name != "") {
            successPopup.style.display = "flex";
            setTimeout(nextPage, 3000);
        }

        memberBtn.onclick = () => {
            memberPopup.style.display = "flex";
            memberCode.focus();
        }

        cancelBtn.onclick = () => {
            memberCode.value = "";
            memberPhone.value = "";
            memberPopup.style.display = "none";
            failMessage.style.display = "none";
        }

        // Function to proceed to the checkout page.
        // To be called by setTimeout
        function nextPage() {
            window.location.href = "index.php";
        }
    </script>

</body>
</html>

