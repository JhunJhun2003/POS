
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK MINI MART - Inventory</title>
    <link rel="stylesheet" href="{{asset('assets/items/style.css')}}">
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
               <button class="btn btn-main-menu" onclick="window.location.href='{{ route('admin.index') }}'">Main Menu</button>
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
                </div>
                <div class="category-container">
                     <div class="category-container">
                        <select name="" id="" class="btn-category">
                            <option value="">Category</option>
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
                        <th>Catagory</th>
                        <th>Exp. Date</th>
                        <th>Alert Date</th>
                        <th class="actions-header" style="border-top-right-radius: 4px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1001</td>
                        <td>Mavius</td>
                        <td>4500</td>
                        <td>50</td>
                        <td>4000</td>
                        <td>Cigarettes</td>
                        <td>None</td>
                        <td>None</td>
                        <td class="actions">
                            <a href="#" class="action-link edit-btn">Edit</a>
                            <a href="#" class="action-link">Delete</a>
                        </td>
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
                    <button type="button" class="btn-add">Add</button>
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

        addBtn.onclick = function () {
            addModal.style.display = "flex";
        }

        addSpan.onclick = function () {
            addModal.style.display = "none";
        }

        // --- Update Items Modal Logic ---
        const updateModal = document.getElementById("updateItemsModal");
        const editBtns = document.querySelectorAll(".edit-btn");
        const updateSpan = document.querySelector("#updateItemsModal .close-btn");

        editBtns.forEach(btn => {
            btn.onclick = function (e) {
                e.preventDefault();
                updateModal.style.display = "flex";
            }
        });

        updateSpan.onclick = function () {
            updateModal.style.display = "none";
        }

        // --- Global Window Click ---
        window.onclick = function (event) {
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
