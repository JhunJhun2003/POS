 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK MINI MART - Inventory</title>
    <link rel="stylesheet" href="{{ asset('assets/items/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <h2>Order</h2>
            </div>
            <div class="header-center">
                <h1>ABK MINI MART</h1>
            </div>
            <div class="header-right">
                <button class="btn btn-main-menu" onclick="window.location.href='{{ route('admin.index') }}'">Main
                    Menu</button>
            </div>
        </header>

        <!-- Divider -->
        <div class="divider"></div>

        <!-- Action Bar -->
        <div class="action-bar">
            <div class="action-left">
                
                
            </div>
            <div class="action-right">
                <button class="btn btn-primary" id="addItemsBtn">Order</button>
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
                        <th>Order. Date</th>
                        <th>Comming Date</th>
                        <th class="actions-header" style="border-top-right-radius: 4px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->itemCode}}</td>
                        <td>{{$order->User->name}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->orderDate}}</td>
                        <td>{{$order->	commingDate}}</td>
                        <td>
                            <form action="{{route('order.delete',$order->id)}}" method="Post">
                                @csrf 
                                @method('DELETE')        
                                <button onclick="confirm('Are you sure delete!!')">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
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
            <h2 class="modal-title">Add Items Form</h2>
            <form class="add-items-form" method="POST" action="{{ route('order.store') }}">
                @csrf
                <div class="form-group">
                    <label>Item Codee</label>
                    <input type="text" name="itemCode">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <select name="cashierid" style="width:200px;height:30px;background:#cecece" >
                        <option value="">Select</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity">
                </div>
                
                
                <div class="form-group">
                    <label>Order. Date</label>
                    <input type="date" name="orderDate">
                </div>
                <div class="form-group">
                    <label>Comming Date</label>
                    <input type="date" name="commingDate">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-add">Order</button>
                </div>
            </form>
        </div>
    </div>

   

    <script>
        // --- Add Items Modal Logic ---
        const addModal = document.getElementById("addItemsModal");
        const addBtn = document.getElementById("addItemsBtn");
        const addSpan = document.querySelector("#addItemsModal .close-btn");

        addBtn.onclick = function() {
            addModal.style.display = "flex";
        }

        addSpan.onclick = function() {
            addModal.style.display = "none";
        }

        // --- Update Items Modal Logic ---
        const updateModal = document.getElementById("updateItemsModal");
        const editBtns = document.querySelectorAll(".edit-btn");
        const updateSpan = document.querySelector("#updateItemsModal .close-btn");

        editBtns.forEach(btn => {
            btn.onclick = function(e) {
                e.preventDefault();
                updateModal.style.display = "flex";
            } 
        });

        updateSpan.onclick = function() {
            updateModal.style.display = "none";
        }

        // --- Global Window Click ---
        window.onclick = function(event) {
            if (event.target == addModal) {
                addModal.style.display = "none";
            }
            if (event.target == updateModal) {
                updateModal.style.display = "none";
            }
        }

        
    </script>
</body>

</html>
