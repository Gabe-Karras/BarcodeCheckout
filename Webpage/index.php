<?php
require_once __DIR__ . '/../config/db_functions.php';
session_start();

// Initialize gift card credit
$_SESSION['credit'] = 0;

if (!isset($_SESSION['items'])) {
    $_SESSION['items'] = [];
}

$code = $_GET['code'] ?? null;
$product = $code ? get_product_by_code($code) : null;
if ($product != null) {
    $_SESSION['items'][] = get_product_by_code($code);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        html, body {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        body {
            background: url("PoS_System_Background.png") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
        }

        /* Dark overlay for readability */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: -1;
        }

        .header {
            padding: 20px;
            border-bottom: 1px solid #fff;
            color: white;
        }

        .main {
            display: flex;
            flex: 1;
            padding: 20px;
            justify-content: center; /* center content horizontally */
            gap: 30px;
        }

        /* Left side: Product image and item details */
        .product-display {
            flex: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-image {
            width: 500px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1); /* slightly see-through */
            border: 2px solid white;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 20px;
        }

        .cart-items {
            width: 500px;
            background: #e0e0e0; /* grey for black text */
            padding: 15px;
            min-height: 150px;
            border-radius: 8px;
            overflow-y: auto;
        }

        /* Right side: Summary box */
        .summary {
            width: 300px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 8px;
        }

        .btn {
            padding: 20px 40px;
            font-size: 22px;
            cursor: pointer;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
        }

        .btn:hover {
            background-color: #218838;
        }

        /* Barcode box at bottom center */
        .barcode-box {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 400px;
            height: 60px;
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid #000;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: black;
        }

        .fixed-content {
            height: 500px;
            overflow-y: scroll;
        }
        .blue-btn {
            position: absolute;
            right: 20px;
            top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer; 
            background-color: 
            #0080ff; 
            color: white; 
            border: none; 
            border-radius: 8px;
        }
        .green-btn {
            cursor:pointer;
            width: 100%; 
            padding: 10px; 
            font-size: 16px; 
            background-color: #28a745; 
            color: white; 
            border: none; 
            border-radius: 8px;
        }
        .red-btn {
            cursor:pointer; 
            margin-top: 10px; 
            width: 100%; 
            padding: 10px; 
            font-size: 16px; 
            background-color: #dc3545; 
            color: white; 
            border: none; 
            border-radius: 8px;
        }
        .blue-btn:hover {
            background-color: #0453ba;
        }
        .red-btn:hover {
            background-color: #b50719;
        }
        .green-btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

    <header class="header">
        <h1>Checkout</h1>
        <button type="button" class="blue-btn" onClick="openForm()" >Add Item</button>
        <div class="popup" id="popupForm" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.5); z-index: 100;">
            <h2>Add Item</h2>
            <form method="POST" action="db_functions.php">
                <input type="text" name="code" placeholder="Enter product code" style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 16px;">
                <input type="text" name="name" placeholder="Enter product name" style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 16px;">
                <input type="text" name="main_category" placeholder="Enter main category" style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 16px;">
                <input type="text" name="sub_category" placeholder="Enter sub category" style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 16px;">
                <input type="text" name="image" placeholder="Enter image URL" style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 16px;">
                <input type="text" name="discount_price" placeholder="Enter product discount price" style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 16px;">
                <input type="text" name="original_price" placeholder="Enter product original price" style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 16px;">
                <button type="submit" class="green-btn"name="action" value="add_product">Add Item</button>
            </form>
            <button type="button" class="red-btn" onClick="closeForm()">Close</button>
        </div>
        <button type="button" class="blue-btn" onClick="openPForm()" style="right: 140px;">Add Member</button>
        <div class="popup" id="popupPForm" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.5); z-index: 100;">
            <h2>Add Member</h2>
            <form method="POST" action="db_functions.php">
                <input type="text" name="member_id" placeholder="Enter member ID" style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 16px;">
                <input type="text" name="name" placeholder="Enter member name" style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 16px;">
                <input type="text" name="phone" placeholder="Enter member phone number" style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 16px;">
                <button type="submit" class="green-btn"name="action" value="add_member">Add Member</button>
            </form>
            <button type="button" class="red-btn" onClick="closePForm()">Close</button>
        
    </header>

    <div class="main">
        <div class="product-display">
            <div class="product-image">
                <?php
                if ($product) {
                    echo "<img src='" . htmlspecialchars($product->image) . "' alt='No Image Available' style='max-width: 500px; max-height: 300px;'>";
                } else {
                    echo "Scan a product to see its image here";
                }
                ?>
            </div>
            <div class="cart-items">
                <?php
                if ($product) {
                    echo "<p><strong>" . htmlspecialchars($product->name) . "</strong></p>";
                    echo "<p>Price: $" . number_format($product->original_price, 2) . "</p>";
                    echo "<p>Main Category: " . htmlspecialchars($product->main_category) . "</p>";
                } else {
                    echo "<p>Scan an item to see its details here</p>";
                }
                ?>
            </div>
        </div>

        <div class="summary">
            <div style="justify-content: flex-start;">
                <h2>Summary</h2>
                <div class="fixed-content">
                    <?php
                    foreach ($_SESSION['items'] as $item) {
                        echo '<p style="margin-top: 20px;">' . $item->name . '</p>';
                    }
                    ?>
                </div>
            </div>
            <button class="btn" onclick="location.href='payment.php'">Pay</button>
        </div>
    </div>

    <form method="GET">
    <input class="barcode-box" type="text" name="code" placeholder="Scan or enter barcode" autofocus>
    </form>

</body>
<script>
    function openForm() {
        document.getElementById("popupForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("popupForm").style.display = "none";
    }
    function openPForm() {
        document.getElementById("popupPForm").style.display = "block";
    }

    function closePForm() {
        document.getElementById("popupPForm").style.display = "none";
    }
</script>
</html>


