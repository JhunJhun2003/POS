<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK MINI MART - Receipt</title>
    <link rel="stylesheet" href="{{asset('assets/order/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Padauk:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- Google Fonts for Myanmar language (not always reliable, so we use fallback) -->
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header>
            <div class="nav-btn">Order</div>
            <h1>ABK MINI MART</h1>
            <div class="nav-right">
                <button class="btn btn-main-menu">Main Menu</button>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <!-- Left Side: Order System -->
            <div class="order-system">
                <div class="card-header">Order System</div>
                <div class="form-container">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Date : <input type="Date" id="Date" class="form-input"> </label>
                        </div>
                        <div class="form-group">
                            <label>Cashier Name : <select class="form-input" style="width:200px" name="cashier">
								<option value="">Cashier</option>
							</select></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Items : <input type="text" id="item_name" class="form-input"></label>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity :</label>
                            <input type="text" id="quantity" class="form-input">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="price">Price :</label>
                            <input type="text" id="price" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="cashback">Cashback :</label>
                            <input type="text" id="cashback" class="form-input">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="amount">Amount :</label>
                            <input type="text" id="amount" class="form-input">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button class="btn btn-reset">Reset</button>
                        <button class="btn btn-confirm">Comfirm</button>
                    </div>
                </div>

                <!-- Footer Section: Numpad and Info -->
                <div class="order-footer">
                    <div class="numpad">
                        <button class="num-btn">9</button>
                        <button class="num-btn">8</button>
                        <button class="num-btn">7</button>
                        <button class="num-btn">6</button>
                        <button class="num-btn">5</button>
                        <button class="num-btn">4</button>
                        <button class="num-btn">1</button>
                        <button class="num-btn">2</button>
                        <button class="num-btn">3</button>
                        <button class="num-btn">0</button>
                        <button class="num-btn">00</button>
                        <button class="num-btn btn-enter">Enter</button>
                    </div>
                    <div class="info-box">
                        <div class="info-title">MSH</div>
                        <div class="info-contact">Contact Info ~ 09111111111</div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Receipt Section -->
            <div class="receipt-section">
                <div class="card-header">Receipt</div>
                <div class="receipt-paper">
                    <div class="receipt-mart-name">အောင်ဘုန်းခန့် Mini Mart</div>
                    <div class="receipt-divider">******************** Cash Receipt ********************</div>
                    <div class="receipt-bill-info">
                        <div class="receipt-row">
                            <span>Receipt No. : <span class="highlight">BILL00001</span></span>
                            <span>Cashier : <span class="highlight">Kyaw Zin</span></span>
                        </div>
                    </div>
                    <div class="receipt-divider">************************************************************</div>
                    <div class="receipt-row">
                        <span>Date : 2026-Mar-01</span>
                        <span>10:20 AM</span>
                    </div>
                    <div class="receipt-divider">************************************************************</div>

                    <table class="receipt-table">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="highlight">Mavius</td>
                                <td class="highlight text-center">1</td>
                                <td class="highlight text-right">4500</td>
                                <td class="highlight text-right">4500</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="receipt-divider">************************************************************</div>

                    <div class="receipt-totals">
                        <div class="total-row">
                            <span>Total</span>
                            <span>:</span>
                            <span class="highlight">4500</span>
                        </div>
                        <div class="total-row">
                            <span>Tax 5%</span>
                            <span>:</span>
                            <span class="highlight">162</span>
                        </div>
                        <div class="total-row">
                            <span></span>
                            <span>:</span>
                            <span class="highlight">4612</span>
                        </div>
                    </div>
                </div>

                <div class="receipt-actions">
                    <button class="btn btn-cancel">Cancel</button>
                    <button class="btn btn-print">Print</button>
                </div>
            </div>
        </main>
    </div>
</body>

</html>