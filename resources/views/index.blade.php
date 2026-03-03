<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK Mini Mart - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/index.css') }}" rel="stylesheet" />
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
                <a href="{{ route('admin.order') }}" style="text-decoration: none; color: white;" class="nav-item">Order</a>
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
                                <th class="col-price">Total Amount</th>
                                <th class="col-cashier">Cashier</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($saleReports as $index => $report)
                                <tr>
                                    <td class="col-no">{{ $index + 1 }}</td>
                                    <td class="col-date">{{ $report->sale_date }}</td>
                                    <td class="col-bill">#{{ $report->bill_no }}</td>
                                    <td class="col-price">{{ number_format($report->total_amount, 0, '.', ',') }} MMK</td>
                                    <td class="col-cashier">{{ $report->user ? $report->user->name : 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
