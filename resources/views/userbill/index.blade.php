<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK MINI MART - Billing System</title>
    <link rel="stylesheet" href="{{ asset('assets/order/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Padauk:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Print Styles - Only Receipt Will Print */
        @media print {
            body * {
                visibility: hidden;
            }
            
            .receipt-section,
            .receipt-section * {
                visibility: visible;
            }
            
            .receipt-section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                max-width: 320px;
                margin: 0 auto;
                padding: 10px;
                background: white;
            }
            
            .receipt-actions,
            .card-header,
            .btn-print,
            .btn-cancel,
            header,
            .order-system,
            .nav-right,
            .nav-btn,
            .btn-main-menu {
                display: none !important;
            }
            
            .receipt-paper {
                border: none;
                box-shadow: none;
                background: white;
                font-size: 12px;
                font-family: 'Courier New', monospace;
            }
            
            .receipt-mart-name {
                font-size: 16px;
                font-weight: bold;
                text-align: center;
                margin-bottom: 5px;
            }
            
            .receipt-divider {
                text-align: center;
                margin: 5px 0;
                letter-spacing: 1px;
            }
            
            .receipt-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 3px;
                font-size: 11px;
            }
            
            .receipt-table {
                width: 100%;
                border-collapse: collapse;
                font-size: 11px;
            }
            
            .receipt-table th,
            .receipt-table td {
                padding: 3px;
                border-bottom: 1px dashed #999;
            }
            
            .receipt-table th {
                font-weight: bold;
                text-align: left;
            }
            
            .text-center { text-align: center; }
            .text-right { text-align: right; }
            
            .receipt-totals {
                margin-top: 5px;
            }
            
            .total-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 2px;
                font-weight: bold;
            }
        }

        /* Screen Styles */
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .highlight { font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <div class="nav-btn">Bill</div>
            <h1>ABK MINI MART</h1>
            <div class="nav-right">
                <button class="btn btn-main-menu" >
                      <form method="POST" action="{{ route('logout') }}" >
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            style="text-decoration: none; color: white;" class="nav-item exit">

                            {{ __('Log Out') }}
                        </x-dropdown-link>
                       
                    </form>
                </button>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <!-- Left Side: Order System -->
            <div class="order-system">
                <div class="card-header">Bill System</div>
                <div class="form-container">
                    <!-- Date & Cashier Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label>Date : {{ date('Y-m-d') }}</label>
                        </div>
                        <div class="form-group">
                            <label>Cashier : {{ Auth::user()->name }}</label>
                        </div>
                    </div>

                    <!-- Item Code & Price Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label>Item Code :</label>
                            <input type="text" id="item_code" class="form-input" placeholder="Enter code or name" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Price :</label>
                            <input type="text" id="price" class="form-input" readonly>
                        </div>
                    </div>

                    <!-- Quantity & Cashback Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label>Quantity :</label>
                            <input type="number" id="quantity" class="form-input" value="1" min="1">
                        </div>
                        <div class="form-group">
                            <label>Cashback :</label>
                            <input type="text" id="cashback" class="form-input" readonly>
                        </div>
                    </div>

                    <!-- Amount Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label>Amount :</label>
                            <input type="text" id="amount" class="form-input" readonly>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-actions">
                        <button class="btn btn-reset" id="resetBtn">Reset</button>
                        <button class="btn btn-confirm" id="confirmBtn">Confirm</button>
                    </div>
                </div>

                <!-- Numpad Section -->
                <div class="order-footer">
                    <div class="numpad">
                        <button class="num-btn" data-num="7">7</button>
                        <button class="num-btn" data-num="8">8</button>
                        <button class="num-btn" data-num="9">9</button>
                        <button class="num-btn" data-num="4">4</button>
                        <button class="num-btn" data-num="5">5</button>
                        <button class="num-btn" data-num="6">6</button>
                        <button class="num-btn" data-num="1">1</button>
                        <button class="num-btn" data-num="2">2</button>
                        <button class="num-btn" data-num="3">3</button>
                        <button class="num-btn" data-num="0">0</button>
                        <button class="num-btn" data-num="00">00</button>
                        <button class="num-btn btn-enter" id="enterBtn">Enter</button>
                    </div>  
                    <div class="info-box">
                        <div class="info-title">MSH</div>
                        <div class="info-contact">Contact: 09111111111</div>
                        
                    </div>
                </div>
            </div>

            <!-- Right Side: Receipt Section -->
            <div class="receipt-section">
                <div class="card-header">Receipt</div>
                <div class="receipt-paper" id="receipt-paper">
                    <!-- Receipt Header -->
                    <div class="receipt-mart-name">အောင်ဘုန်းခန့် Mini Mart</div>
                    <div class="receipt-divider">******************************</div>
                    
                    <!-- Receipt Info -->
                    <div class="receipt-row">
                        <span>Receipt No: <span class="highlight" id="receiptNo">---</span></span>
                        <span>Cashier: <span class="highlight">{{ Auth::user()->name }}</span></span>
                    </div>
                    <div class="receipt-row">
                        <span>Date: {{ date('Y-m-d') }}</span>
                        <span>Time: <span id="currentTime">{{ date('h:i A') }}</span></span>
                    </div>
                    
                    <div class="receipt-divider">******************************</div>

                    <!-- Items Table -->
                    <table class="receipt-table" id="receipt-table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th class="text-center">Qty</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody id="receiptItems">
                            <tr>
                                <td colspan="4" class="text-center">--- No items ---</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="receipt-divider">******************************</div>

                    <!-- Totals -->
                    <div class="receipt-totals">
                        <div class="total-row">
                            <span>Total:</span>
                            <span class="highlight" id="totalAmount">0.00</span>
                        </div>
                        <div class="total-row">
                            <span>Grand Total:</span>
                            <span class="highlight" id="grandTotal">0.00</span>
                        </div>
                    </div>
                    
                    <!-- Footer -->
                    <div class="receipt-divider">******************************</div>
                    <div class="receipt-row" style="justify-content: center;">
                        <span>Thank You - Come Again!</span>
                    </div>
                </div>

                <!-- Receipt Actions -->
                <div class="receipt-actions">
                    <button class="btn btn-cancel" id="cancelBtn">Cancel</button>
                    <button class="btn btn-print" id="printBtn">Print Receipt</button>
                </div>
            </div>
        </main>
    </div>

    <!-- jQuery and Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // State management
        let searchTimeout;
        let currentItem = null;
        let receiptItems = [];
        let lastReceiptNumber = '';

        // DOM Elements
        const $itemCode = $('#item_code');
        const $price = $('#price');
        const $quantity = $('#quantity');
        const $amount = $('#amount');
        const $receiptNo = $('#receiptNo');
        const $totalAmount = $('#totalAmount');
        const $grandTotal = $('#grandTotal');
        const $receiptItems = $('#receiptItems');

        // Initialize
        updateCurrentTime();

        // ============ EVENT LISTENERS ============
        
        // Item code input with debounce
        $itemCode.on('input', function() {
            clearTimeout(searchTimeout);
            const itemCode = $(this).val().trim();
            
            if (itemCode.length < 2) {
                clearItemData();
                return;
            }

            searchTimeout = setTimeout(() => fetchItemPrice(itemCode), 500);
        });

        // Quantity change
        $quantity.on('input', calculateAmount);

        // Numpad buttons
        $('.num-btn[data-num]').click(function() {
            const num = $(this).data('num');
            const $activeInput = $(':focus');
            
            if ($activeInput.length && $activeInput.is('input')) {
                $activeInput.val($activeInput.val() + num).trigger('input');
            } else {
                $itemCode.focus().val($itemCode.val() + num).trigger('input');
            }
        });

        // Enter button
        $('#enterBtn').click(addItemToReceipt);

        // Confirm button
        $('#confirmBtn').click(function() {
            receiptItems.length > 0 ? saveBill() : alert('No items to confirm');
        });

        // Reset button
        $('#resetBtn').click(resetForm);

        // Cancel button
        $('#cancelBtn').click(function() {
            if (receiptItems.length === 0 || confirm('Clear all items?')) {
                receiptItems = [];
                updateReceiptDisplay();
                resetForm();
            }
        });

        // Print button
        $('#printBtn').click(function() {
            receiptItems.length > 0 ? printReceipt() : alert('No items to print');
        });

        // Enter key shortcut
        $itemCode.add($quantity).on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                addItemToReceipt();
            }
        });

        // ============ CORE FUNCTIONS ============

        function fetchItemPrice(itemCode) {
            $.ajax({
                url: '{{ route("user.get.item.price") }}',
                method: 'POST',
                data: {
                    item_code: itemCode,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $price.val(response.price);
                        currentItem = response;
                        calculateAmount();
                    } else {
                        clearItemData();
                        alert('Item not found: ' + itemCode);
                    }
                },
                error: function() {
                    alert('Error fetching item price');
                }
            });
        }

        function calculateAmount() {
            const price = parseFloat($price.val()) || 0;
            const quantity = parseInt($quantity.val()) || 1;
            const amount = price * quantity;
            $amount.val(amount.toFixed(2));
        }

        function addItemToReceipt() {
            // Validation
            if (!currentItem) {
                alert('Please enter a valid item code');
                $itemCode.focus();
                return;
            }

            const quantity = parseInt($quantity.val());
            if (isNaN(quantity) || quantity <= 0) {
                alert('Please enter a valid quantity');
                $quantity.focus();
                return;
            }

            const price = parseFloat($price.val());
            const amount = price * quantity;

            // Create item object
            const item = {
                item_code: currentItem.item_code,
                item_name: currentItem.item_name,
                price: price,
                quantity: quantity,
                amount: amount
            };

            // Add to receipt
            receiptItems.push(item);
            updateReceiptDisplay();
            resetForm();
        }

        function updateReceiptDisplay() {
            $receiptItems.empty();
            
            if (receiptItems.length === 0) {
                $receiptItems.html('<tr><td colspan="4" class="text-center">--- No items ---</td></tr>');
                $totalAmount.text('0.00');
                $grandTotal.text('0.00');
                $receiptNo.text('---');
                return;
            }

            // Calculate total
            const total = receiptItems.reduce((sum, item) => sum + item.amount, 0);

            // Generate receipt number
            const receiptNo = 'R' + Date.now().toString().slice(-8);
            $receiptNo.text(receiptNo);

            // Render items
            receiptItems.forEach(item => {
                const row = `
                    <tr>
                        <td>${item.item_name}</td>
                        <td class="text-center">${item.quantity}</td>
                        <td class="text-right">${formatMoney(item.price)}</td>
                        <td class="text-right">${formatMoney(item.amount)}</td>
                    </tr>
                `;
                $receiptItems.append(row);
            });

            // Update totals
            $totalAmount.text(formatMoney(total));
            $grandTotal.text(formatMoney(total));
        }

        function saveBill() {
            if (!confirm('Save this bill to database?')) return;

            const $btn = $('#confirmBtn');
            $btn.prop('disabled', true).text('Saving...');

            const postData = {
                items: receiptItems,
                total: $totalAmount.text(),
                grand_total: $grandTotal.text(),
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: '{{ route("user.save.bill") }}',
                method: 'POST',
                data: postData,
                dataType: 'json',
                success: function(response) {
                    alert('✅ Bill saved successfully!');
                    receiptItems = [];
                    updateReceiptDisplay();
                    resetForm();
                },
                error: function(xhr) {
                    const message = xhr.responseJSON?.message || 'Please try again';
                    alert('❌ Error saving bill.\n' + message);
                    console.error('Save error:', xhr);
                },
                complete: function() {
                    $btn.prop('disabled', false).text('Confirm');
                }
            });
        }

        function printReceipt() {
            // Ensure receipt number exists
            if ($receiptNo.text() === '---') {
                const receiptNo = 'R' + Date.now().toString().slice(-8);
                $receiptNo.text(receiptNo);
            }
            
            // Update time
            updateCurrentTime();
            
            // Print
            window.print();
        }

        // ============ UTILITY FUNCTIONS ============

        function resetForm() {
            $itemCode.val('').focus();
            $price.val('');
            $quantity.val('1');
            $amount.val('');
            currentItem = null;
        }

        function clearItemData() {
            $price.val('');
            $amount.val('');
            currentItem = null;
        }

        function formatMoney(amount) {
            return parseFloat(amount).toFixed(2);
        }

        function updateCurrentTime() {
            const now = new Date();
            const timeStr = now.toLocaleTimeString('en-US', { 
                hour: '2-digit', 
                minute: '2-digit',
                hour12: true 
            });
            $('#currentTime').text(timeStr);
        }
    });
    </script>
</body>
</html>