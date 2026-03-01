<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK MINI MART - Report</title>
    <link rel="stylesheet" href="{{asset('assets/report/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="main-header">
            <div class="breadcrumb">Report</div>
            <h1 class="title">ABK MINI MART</h1>
            <button class="btn-main-menu">Main Menu</button>
        </header>

        <section class="filters-section">
            <!-- Daily Sales Report Card -->
            <div class="card">
                <h3>Daily Sales Report</h3>
                <div class="form-group">
                    <label>Date :</label>
                    <input type="Date" placeholder="<Dropdown Calendar>">
                </div>
                <div class="form-group">
                    <label>Sales Person :</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Voucher No. :</label>
                    <input type="text">
                </div>
                <button class="btn-search">Search</button>
            </div>

            <!-- Monthly Sales Report Card -->
            <div class="card">
                <h3>Monthly Sales Report</h3>
                <div class="form-group">
                    <label>Months :</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Sales Person :</label>
                    <input type="text">
                </div>
                <button class="btn-search">Search</button>
            </div>

            <!-- Total Stocks Report Card -->
            <div class="card">
                <h3>Total Stocks Report</h3>
                <div class="form-group">
                    <label>Item Code :</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label>Name :</label>
                    <input type="text">
                </div>
                <div class="btn-group">
                    <button class="btn-search">Search</button>
                    <button class="btn-all-items">All Items</button>
                </div>
            </div>
        </section>

        <section class="report-table-section">
            <div class="table-container">
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Item Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price(Unit)</th>
                            <th>Amount</th>
                            <th>Cashier</th>
                            <th class="export-header"><button class="btn-export">Export</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Empty table body as in the image -->
                        <tr class="empty-row">
                            <td colspan="9"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
</html>
