<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Select Payment Type</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .header {
            padding: 20px;
            border-bottom: 1px solid #fff;
            color: white;
        }

        body {
            background: url("PoS_System_Background.png") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            color: #111;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: -1;
        }

        .topbar {
            padding: 14px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
        }

        .screen {
            flex: 1;
            display: flex;
            justify-content: center;
            padding: 18px;
        }

        .content {
            width: min(1150px, 98vw);
            display: flex;
            gap: 18px;
            align-items: stretch;
        }

        /* LEFT */
        .left {
            flex: 1.35;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 10px;
            padding: 18px;
            display: flex;
            flex-direction: column;
            min-height: 560px;
        }

        .left h2 {
            font-size: 34px;
            font-weight: 500;
            color: #2b6cb0;
            margin-bottom: 34px;
        }

        .pay-options {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;

            width: 100%;
            justify-content: center;
            align-items: center;
            align-content: center;

            padding: 6px 0;
            margin-bottom: 16px;
        }

        .pay-tile {
            width: 170px;
            height: 160px;
            border: 2px solid #cfd8e3;
            background: #fff;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: transform 0.08s ease, border-color 0.08s ease;
            user-select: none;
        }

        .pay-tile:hover {
            transform: translateY(-1px);
            border-color: #2b6cb0;
        }

        .pay-tile.selected {
            border-color: #2b6cb0;
            box-shadow: 0 0 0 3px rgba(43, 108, 176, 0.18);
        }

        .icon {
            width: 70px;
            height: 46px;
            position: relative;
        }

        .icon.card {
            border: 4px solid #2b6cb0;
            border-radius: 6px;
        }

        .icon.card::before {
            content: "";
            position: absolute;
            left: 6px;
            top: 10px;
            width: 58px;
            height: 8px;
            background: #2b6cb0;
            border-radius: 3px;
        }

        .icon.cash {
            border: 4px solid #2b6cb0;
            border-radius: 6px;
        }

        .icon.cash::before {
            content: "";
            position: absolute;
            inset: 10px 18px;
            border: 4px solid #2b6cb0;
            border-radius: 999px;
        }

        .icon.gift {
            border: 4px solid #2b6cb0;
            border-radius: 8px;
        }

        .icon.gift::before {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            width: 52px;
            
            height: 6px;
            background: #2b6cb0;
            border-radius: 4px;
            transform: translate(-50%, -50%);
        }

        .icon.gift::after {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            width: 6px;
            height: 34px;
            
            background: #2b6cb0;
            border-radius: 4px;
            transform: translate(-50%, -50%);
        }


        .pay-tile .label {
            font-size: 20px;
            color: #2b6cb0;
            font-weight: 500;
        }

        .promo {
            margin-top: 8px;
            background: #9b59b6;
            color: #fff;
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 16px;
        }

        .left-footer {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding-top: 14px;
        }

        .btn-back {
            padding: 12px 16px;
            background: #2b6cb0;
            border: none;
            color: #fff;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-back:hover {
            background: #245a95;
        }

        .selected-method {
            font-size: 16px;
            color: #333;
        }

        .selected-method b {
            color: #2b6cb0;
        }

        /* RIGHT */
        .right {
            flex: 0.85;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 10px;
            padding: 18px;
            display: flex;
            flex-direction: column;
            min-height: 560px;
        }

        .cart-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .cart-head .title {
            font-size: 18px;
            font-weight: 700;
            color: #111;
        }

        .cart-items {
            border-top: 1px solid #d6d6d6;
            padding-top: 12px;
            flex: 1;
            overflow-y: auto;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .item-row .name {
            font-weight: 700;
            color: #111;
        }

        .item-row .meta {
            font-size: 12px;
            color: #666;
            margin-top: 2px;
        }

        .totals {
            margin-top: 12px;
            border-top: 1px solid #d6d6d6;
            padding-top: 12px;
            font-size: 14px;
            color: #222;
        }

        .totals .line {
            display: flex;
            justify-content: space-between;
            padding: 3px 0;
        }

        .totals .grand {
            font-weight: 800;
            font-size: 16px;
            color: #111;
            margin-top: 6px;
        }

        .hint {
            position: fixed;
            bottom: 18px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.92);
            border: 2px solid #111;
            border-radius: 8px;
            width: min(520px, 94vw);
            padding: 14px 16px;
            text-align: center;
            font-size: 18px;
            color: #111;
        }

        @media (max-width: 980px) {
            .content {
                flex-direction: column;
            }

            .left,
            .right {
                min-height: auto;
            }

            .pay-tile {
                width: 155px;
                height: 150px;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>Payment</h1>
    </header>
    <div class="topbar">
        <div style="width: 80px;"></div>
    </div>

    <div class="screen">
        <div class="content">
            <!-- LEFT -->
            <section class="left" aria-label="Payment selection">
                <h2>Select Payment Type</h2>

                <div class="pay-options">
                    <div class="pay-tile selected" data-method="Card" role="button" tabindex="0"
                        aria-label="Pay by card">
                        <div class="icon card" aria-hidden="true"></div>
                        <div class="label">Card</div>
                    </div>

                    <div class="pay-tile" data-method="Cash" role="button" tabindex="0" aria-label="Pay by cash">
                        <div class="icon cash" aria-hidden="true"></div>
                        <div class="label">Cash</div>
                    </div>

                    <div class="pay-tile" data-method="Gift Card" role="button" tabindex="0"
                        aria-label="Pay by gift card">
                        <div class="icon gift" aria-hidden="true"></div>
                        <div class="label">Gift Card</div>
                    </div>
                </div>

                <div class="left-footer">
                    <button class="btn-back" id="goBackBtn">◀ Go Back</button>
                    <div class="selected-method">Selected: <b id="selectedMethodText">Card</b></div>
                </div>
            </section>

            <!-- RIGHT -->
            <aside class="right" aria-label="Cart summary">
                <div class="cart-head">
                    <div class="title"><span id="itemCountText">0</span> item(s)</div>
                    <div style="font-size: 12px; color:#666;">Cart</div>
                </div>

                <div class="cart-items" id="cartItems"></div>
                <h2>Item's name and price will show up here</h2>

                <div class="totals">
                    <div class="line"><span>Subtotal</span><span id="subtotalText">$0.00</span></div>
                    <div class="line"><span>Tax</span><span id="taxText">$0.00</span></div>
                    <div class="line grand"><span>Total</span><span id="totalText">$0.00</span></div>
                </div>
            </aside>
        </div>
    </div>

    <script>
        // ---- Payment Selection ----
        const tiles = Array.from(document.querySelectorAll(".pay-tile"));
        const selectedMethodText = document.getElementById("selectedMethodText");

        function selectMethod(method, tileEl) {
            tiles.forEach(t => t.classList.remove("selected"));
            tileEl.classList.add("selected");
            selectedMethodText.textContent = method;
            localStorage.setItem("payment_method", method);
        }

        tiles.forEach(tile => {
            tile.addEventListener("click", () => selectMethod(tile.dataset.method, tile));
            tile.addEventListener("keydown", (e) => {
                if (e.key === "Enter" || e.key === " ") {
                    e.preventDefault();
                    selectMethod(tile.dataset.method, tile);
                }
            });
        });

        // ---- Back button ----
        document.getElementById("goBackBtn").addEventListener("click", () => {
            if (window.history.length > 1) window.history.back();
            else window.location.href = "index.html";
        });

    </script>
</body>

</html>