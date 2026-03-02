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
                <h2>Inventory</h2>
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
                <div class="search-container">
                    <input type="text" placeholder="Search" class="search-input">
                    <i class="fas fa-search search-icon"></i>
                </div><label for="categorySelect" class="category-label">Category</label>
                <div class="category-container">
                    <div class="category-container">
                        
                        <select name="categoryid" id="categorySelect" class="btn-category">
                            
                            {{-- <option value="">Category</option> --}}
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="action-right">
                <button class="btn btn-primary" id="addItemsBtn">Add Items</button>
            </div>
        </div>

        <!-- Table Area -->
        <div class="table-wrapper">
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th style="border-top-left-radius: 4px;">Item Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Category</th>
                        <th>Exp. Date</th>
                        <th>Alert Date</th>
                        <th class="actions-header" style="border-top-right-radius: 4px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        {{-- <td class="actions">
                            <a href="#" class="action-link edit-btn">Edit</a>
                            <a href="#" class="action-link">Delete</a>
                        </td> --}}

                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->itemCode }}</td>
                                <td>{{ $item->itemName }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->cost }}</td>
                                <td>{{ $item->category ? $item->category->name : 'N/A' }}</td>
                                <td>{{ $item->exp_Date }}</td>
                                <td>{{ $item->alert_Date }}</td>
                                <td class="actions">
                                    <a href="#" class="action-link edit-btn">Edit</a>
                                    <a href="#" class="action-link">Delete</a>
                                </td>
                            </tr>   
                        @endforeach
                    </tr>
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
            <form class="add-items-form" method="POST" action="{{ route('inventory.store') }}">
                @csrf
                <div class="form-group">
                    <label>Item Codee</label>
                    <input type="text" name="itemCode">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="itemName">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price">
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity">
                </div>
                <div class="form-group">
                    <label>Cost</label>
                    <input type="text" name="cost">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    @if ($categories->isEmpty())
                        <!-- Show text input when no categories exist -->
                        <input type="text" name="new_category" id="new_category" class="form-control"
                            placeholder="Enter new category" value="{{ old('new_category') }}" required>
                    @else
                        <!-- Show select dropdown when categories exist -->
                        <select name="categoryid" id="categoryid" class="form-control" required>
                            <option value="">-- Select a category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('categoryid') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="form-group">
                    <label>Exp. Date</label>
                    <input type="date" name="exp_Date">
                </div>
                <div class="form-group">
                    <label>Alert Date</label>
                    <input type="date" name="alert_Date">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-add">Add</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Update Items Modal -->
    <div id="updateItemsModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2 class="modal-title">Update Items Form</h2>
            <form class="add-items-form">
                <div class="form-group">
                    <label>Item Code</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Cost</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Catagory</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Exp. Date</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Alert Date</label>
                    <input type="text">
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-add">Update</button>
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
