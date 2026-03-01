<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK Mini Mart - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4988C4;
            --primary-dark: #3a6da0;
            --danger: #B44744;
            --danger-hover: #9c3c3a;
            --cream: #F4F0E4;
            --bg-light: #F8F9FA;
            --text-dark: #2D3436;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg-light);
            color: var(--text-dark);
            height: 100vh;
            overflow: hidden;
            width: 100%;
        }

        .dashboard {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Styling */
        .header {
            width: 100%;
            height: 120px;
            background: var(--cream);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            z-index: 10;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .dashboard-badge {
            background: var(--primary);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 20px;
            box-shadow: var(--shadow-sm);
            cursor: pointer;
            transition: var(--transition);
        }

        .dashboard-badge:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            background: var(--primary-dark);
        }

        .store-title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 48px;
            font-weight: 800;
            letter-spacing: -1px;
            color: var(--text-dark);
        }

        .notification-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }

        .notification-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Main Layout */
        .main-container {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 280px;
            background: var(--cream);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.03);
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            background: var(--primary);
            color: white;
            border-radius: 12px;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
            cursor: pointer;
            border: none;
            text-align: left;
        }

        .nav-item:hover {
            transform: translateX(5px) translateY(-2px);
            background: var(--primary-dark);
            box-shadow: var(--shadow-md);
        }

        .nav-item.exit {
            margin-top: auto;
            background: var(--danger);
        }

        .nav-item.exit:hover {
            background: var(--danger-hover);
        }

        /* Content Area */
        .content {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
            background: white;
        }

        .content-header {
            margin-bottom: 30px;
        }

        .content-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-dark);
        }

        /* Modern Table Card */
        .table-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: var(--primary);
            color: white;
        }

        th {
            padding: 20px;
            font-weight: 600;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 18px 20px;
            font-size: 16px;
            border-bottom: 1px solid #f1f1f1;
            color: #555;
        }

        tbody tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        tbody tr:hover {
            background-color: #f8fbff;
            transition: background-color 0.2s;
        }

        /* Column specific spacing */
        .col-no {
            width: 60px;
            text-align: center;
        }

        .col-date {
            width: 120px;
        }

        .col-bill {
            width: 150px;
        }

        .col-code {
            width: 140px;
        }

        .col-name {
            width: auto;
        }

        .col-price {
            width: 120px;
            text-align: right;
        }

        .col-cashier {
            width: 150px;
        }

        @media (max-width: 1200px) {
            .store-title {
                font-size: 36px;
            }

            .sidebar {
                width: 240px;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <div class="dashboard-badge">Dashboard</div>
            </div>

            <h1 class="store-title">ABK MINI MART</h1>

            <button class="notification-btn">Notifications</button>
        </header>

        <div class="main-container">
            <!-- Sidebar -->
            <nav class="sidebar">
                <button class="nav-item">Order</button>
                <button class="nav-item">Items</button>
                <button class="nav-item">Account</button>
                <button class="nav-item">Inventory</button>
                <button class="nav-item">User Manual</button>
                <button class="nav-item">Report</button>
                <button class="nav-item exit">Exit</button>
            </nav>

            <!-- Main Content -->
            <main class="content">
                <div class="content-header">
                    <h2 class="content-title">Sales Report</h2>
                </div>

                <div class="table-card">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-no">No.</th>
                                <th class="col-date">Date</th>
                                <th class="col-bill">Bill Number</th>
                                <th class="col-code">Item Code</th>
                                <th class="col-name">Item Name</th>
                                <th class="col-price">Price</th>
                                <th class="col-cashier">Cashier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data Row -->
                            <tr>
                                <td class="col-no">1</td>
                                <td class="col-date">2026-03-01</td>
                                <td class="col-bill">#BILL-1001</td>
                                <td class="col-code">P001</td>
                                <td class="col-name">Organic Apple Juice</td>
                                <td class="col-price">4,500 MMK</td>
                                <td class="col-cashier">Kyaw Kyaw</td>
                            </tr>
                            <tr>
                                <td class="col-no">2</td>
                                <td class="col-date">2026-03-01</td>
                                <td class="col-bill">#BILL-1002</td>
                                <td class="col-code">P002</td>
                                <td class="col-name">Chocolate Cookies (200g)</td>
                                <td class="col-price">2,800 MMK</td>
                                <td class="col-cashier">Su Su</td>
                            </tr>
                            <tr>
                                <td class="col-no">3</td>
                                <td class="col-date">2026-03-01</td>
                                <td class="col-bill">#BILL-1003</td>
                                <td class="col-code">P003</td>
                                <td class="col-name">Instant Coffee Mix</td>
                                <td class="col-price">5,200 MMK</td>
                                <td class="col-cashier">Aung Aung</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>