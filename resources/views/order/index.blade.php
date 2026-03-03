 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK MINI MART - Order System</title>
    <link rel="stylesheet" href="{{ asset('assets/items/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Modern Modal Styling */
        .modal-content {
            width: 80% !important;
            max-width: 800px !important;
            border-radius: 12px !important;
            padding: 25px !important;
            background: #ffffff !important;
        }

        .session-table-wrapper {
            margin-top: 20px;
            max-height: 250px;
            overflow-y: auto;
            border: 1px solid #eee;
            border-radius: 8px;
        }

        .session-table {
            width: 100%;
            border-collapse: collapse;
        }

        .session-table th {
            background: #f8f9fa;
            padding: 12px;
            text-align: left;
            font-size: 0.85rem;
            border-bottom: 2px solid #eee;
        }

        .session-table td {
            padding: 10px 12px;
            font-size: 0.9rem;
            border-bottom: 1px solid #eee;
        }

        .btn-remove {
            color: #ff4757;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.1rem;
        }

        .order-form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 0 !important;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 0.75rem;
            color: #666;
            text-transform: uppercase;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background: white !important;
        }

        .session-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-add-list {
            background: #2b88d8;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        .btn-confirm-all {
            background: #2ed573;
            color: white;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .btn-clear-session {
            background: #f1f2f6;
            color: #2f3542;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .empty-session {
            text-align: center;
            padding: 30px;
            color: #a4b0be;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <h2>Order Management</h2>
            </div>
            <div class="header-center">
                <h1>ABK MINI MART</h1>
            </div>
            <div class="header-right">
                <button class="btn btn-main-menu" onclick="window.location.href='{{ route('admin.index') }}'">
                    <i class="fas fa-home"></i> Main Menu
                </button>
            </div>
        </header>

        <!-- Divider -->
        <div class="divider"></div>

        <!-- Action Bar -->
        <div class="action-bar">
            <div class="action-left">
                <p style="font-weight: 600; color: #666;">View and manage stock replenishment orders.</p>
            </div>
            <div class="action-right">
                <button class="btn btn-primary" id="addItemsBtn">
                    <i class="fas fa-plus-circle"></i> Create New Order
                </button>
            </div>
        </div>

        <!-- Table Area -->
        <div class="table-wrapper">
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th style="border-top-left-radius: 4px;">Item Code</th>
                        <th>Cashier Name</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th>Arrival Date</th>
                        <th class="actions-header" style="border-top-right-radius: 4px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td><strong>{{$order->itemCode}}</strong></td>
                        <td>{{$order->user ? $order->user->name : 'N/A'}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->orderDate}}</td>
                        <td>{{$order->commingDate}}</td>
                        <td>
                            <form action="{{route('order.delete',$order->id)}}" method="Post" style="display:inline;">
                                @csrf 
                                @method('DELETE')        
                                <button type="submit" class="btn-remove" onclick="return confirm('Delete this order entry?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; padding: 40px; color: #999;">
                            No order records found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Empty gray space -->
            <div class="table-empty-space"></div>
        </div>
    </div>

    <!-- Add Items Modal -->
    <div id="addItemsModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2 class="modal-title">New Order Session</h2>
            
            <div class="order-form-grid">
                <div class="form-group">
                    <label>Item Code</label>
                    <input type="text" id="temp_itemCode" placeholder="E.g. ITEM-001">
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" id="temp_quantity" value="1" min="1">
                </div>
                <div class="form-group">
                    <label>Order Date</label>
                    <input type="date" id="temp_orderDate" value="{{ date('Y-m-d') }}">
                </div>
                <div class="form-group">
                    <label>Arrival Date</label>
                    <input type="date" id="temp_commingDate" value="{{ date('Y-m-d', strtotime('+7 days')) }}">
                </div>
                <div style="display: flex; align-items: flex-end;">
                    <button type="button" class="btn-add-list" id="addToListBtn">
                        <i class="fas fa-plus"></i> Add
                    </button>
                </div>
            </div>

            <div class="session-table-wrapper">
                <table class="session-table">
                    <thead>
                        <tr>
                            <th>Item Code</th>
                            <th>Qty</th>
                            <th>Order Date</th>
                            <th>Arrival Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="sessionList">
                        <!-- Items will be added here -->
                    </tbody>
                </table>
                <div id="emptyMessage" class="empty-session">
                    Your session is empty. Add items above.
                </div>
            </div>

            <div class="session-actions">
                <button type="button" class="btn-clear-session" id="clearSessionBtn">Clear List</button>
                <button type="button" class="btn-confirm-all" id="confirmOrderBtn">
                    <i class="fas fa-check-circle"></i> Confirm & Submit
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let orderSession = [];

            // --- Modal Logic ---
            const $modal = $("#addItemsModal");
            const $addBtn = $("#addItemsBtn");
            const $closeBtn = $(".close-btn");

            $addBtn.on("click", function() {
                $modal.css("display", "flex");
            });

            $closeBtn.on("click", function() {
                $modal.css("display", "none");
            });

            $(window).on("click", function(event) {
                if ($(event.target).is($modal)) {
                    $modal.css("display", "none");
                }
            });

            // --- Session Logic ---
            function updateSessionUI() {
                const $list = $("#sessionList");
                const $emptyMsg = $("#emptyMessage");
                $list.empty();

                if (orderSession.length === 0) {
                    $emptyMsg.show();
                    return;
                }

                $emptyMsg.hide();
                orderSession.forEach((item, index) => {
                    $list.append(`
                        <tr>
                            <td><strong>${item.itemCode}</strong></td>
                            <td>${item.quantity}</td>
                            <td>${item.orderDate}</td>
                            <td>${item.commingDate}</td>
                            <td style="text-align:right">
                                <button class="btn-remove remove-item" data-index="${index}">
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    `);
                });
            }

            $("#addToListBtn").on("click", function() {
                const itemCode = $("#temp_itemCode").val().trim();
                const quantity = $("#temp_quantity").val();
                const orderDate = $("#temp_orderDate").val();
                const commingDate = $("#temp_commingDate").val();

                if (!itemCode || !quantity) {
                    alert("Please fill in Item Code and Quantity");
                    return;
                }

                orderSession.push({
                    itemCode,
                    quantity,
                    orderDate,
                    commingDate
                });

                // Clear partial form
                $("#temp_itemCode").val("").focus();
                $("#temp_quantity").val("1");
                
                updateSessionUI();
            });

            $(document).on("click", ".remove-item", function() {
                const index = $(this).data("index");
                orderSession.splice(index, 1);
                updateSessionUI();
            });

            $("#clearSessionBtn").on("click", function() {
                if (confirm("Clear all items from list?")) {
                    orderSession = [];
                    updateSessionUI();
                }
            });

            // --- Submit Logic ---
            $("#confirmOrderBtn").on("click", function() {
                if (orderSession.length === 0) {
                    alert("No items in session to confirm.");
                    return;
                }

                if (!confirm("Confirm and save " + orderSession.length + " order items?")) {
                    return;
                }

                const $btn = $(this);
                $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');

                $.ajax({
                    url: "{{ route('order.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        items: orderSession
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload(); // Refresh to show new orders
                        } else {
                            alert("Error: " + response.message);
                            $btn.prop('disabled', false).html('<i class="fas fa-check-circle"></i> Confirm & Submit');
                        }
                    },
                    error: function(xhr) {
                        alert("An error occurred while saving orders.");
                        $btn.prop('disabled', false).html('<i class="fas fa-check-circle"></i> Confirm & Submit');
                    }
                });
            });

            // Enter key to add to list
            $("#temp_itemCode, #temp_quantity").on("keypress", function(e) {
                if (e.which === 13) {
                    $("#addToListBtn").click();
                }
            });
        });
    </script>
</body>

</html>
