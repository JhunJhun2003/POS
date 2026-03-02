<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK Mini Mart - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="assets/index.css" rel="stylesheet" />
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
                <a href="{{ route('admin.item') }}" style="text-decoration: none; color: white;"
                    class="nav-item">Items</a>
                <a href="{{ route('admin.bill') }}" style="text-decoration: none; color: white;"
                    class="nav-item">Bill</a>
                <a href="{{ route('admin.user') }}" style="text-decoration: none; color: white;"
                    class="nav-item">Account</a>
                {{-- <a href="{{ route('admin.inventory') }}" style="text-decoration: none; color: white;" class="nav-item">Inventory</a> --}}
                <a href="{{ route('admin.userMenu') }}" style="text-decoration: none; color: white;"
                    class="nav-item">User Manual</a>
                <a href="{{ route('admin.report') }}" style="text-decoration: none; color: white;"
                    class="nav-item">Report</a>
                
                    <form method="POST" action="{{ route('logout') }}" >
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            style="text-decoration: none; color: white;" class="nav-item exit">

                            {{ __('Log Out') }}
                        </x-dropdown-link>
                       
                    </form>
                
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
