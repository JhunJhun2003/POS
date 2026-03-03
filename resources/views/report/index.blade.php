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
            <button class="btn-main-menu" onclick="window.location.href='{{ route('admin.index') }}'">Main Menu</button>
        </header>

        <section class="filters-section">
            <!-- Daily Sales Report Card -->
            <div class="card">
                <h3>Daily Sales Report</h3>
                <form action="{{ route('admin.report') }}" method="GET">
                    <input type="hidden" name="type" value="daily">
                    <div class="form-group">
                        <label>Date :</label>
                        <input type="date" name="date" value="{{ request('date') }}">
                    </div>
                    <div class="form-group">
                        <label>Sales Person :</label>
                        <select name="cashier_id" class="form-control">
                            <option value="">-- All --</option>
                            @foreach($cashiers as $cashier)
                                <option value="{{ $cashier->id }}" {{ request('cashier_id') == $cashier->id ? 'selected' : '' }}>
                                    {{ $cashier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Voucher No. :</label>
                        <input type="text" name="bill_no" value="{{ request('bill_no') }}">
                    </div>
                    <button type="submit" class="btn-search">Search</button>
                </form>
            </div>

            <!-- Monthly Sales Report Card -->
            <div class="card">
                <h3>Monthly Sales Report</h3>
                <form action="{{ route('admin.report') }}" method="GET">
                    <input type="hidden" name="type" value="monthly">
                    <div class="form-group">
                        <label>Months :</label>
                        <input type="month" name="month" value="{{ request('month') }}">
                    </div>
                    <div class="form-group">
                        <label>Sales Person :</label>
                        <select name="cashier_id" class="form-control">
                            <option value="">-- All --</option>
                            @foreach($cashiers as $cashier)
                                <option value="{{ $cashier->id }}" {{ request('cashier_id') == $cashier->id ? 'selected' : '' }}>
                                    {{ $cashier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn-search">Search</button>
                </form>
            </div>

            <!-- Total Stocks Report Card -->
            <div class="card">
                <h3>Total Stocks Report</h3>
                <form action="{{ route('admin.report') }}" method="GET">
                    <input type="hidden" name="type" value="stocks">
                    <div class="form-group">
                        <label>Item Code :</label>
                        <input type="text" name="itemCode" value="{{ request('itemCode') }}">
                    </div>
                    <div class="form-group">
                        <label>Name :</label>
                        <input type="text" name="itemName" value="{{ request('itemName') }}">
                    </div>
                    <div class="btn-group">
                        <button type="submit" class="btn-search">Search</button>
                        <a href="{{ route('admin.report', ['type' => 'stocks']) }}" class="btn-all-items" style="text-decoration: none; text-align: center; display: inline-block; padding-top: 10px;">All Items</a>
                    </div>
                </form>
            </div>
        </section>

        <section class="report-table-section">
            <div class="table-container">
                <table class="report-table">
                    <thead>
                        @if($reportType == 'stocks')
                            <tr>
                                <th>No.</th>
                                <th>Item Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Exp. Date</th>
                                <th class="export-header">
                                    <form action="{{ route('admin.report') }}" method="GET">
                                        <input type="hidden" name="type" value="{{ $reportType }}">
                                        @foreach(request()->except('type', 'export') as $key => $value)
                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                        @endforeach
                                        <button type="submit" name="export" value="1" class="btn-export">Export</button>
                                    </form>
                                </th>
                            </tr>
                        @else
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Voucher No.</th>
                                <th>Total Amount</th>
                                <th>Cashier</th>
                                <th colspan="3"></th>
                                <th class="export-header">
                                    <form action="{{ route('admin.report') }}" method="GET">
                                        <input type="hidden" name="type" value="{{ $reportType }}">
                                        @foreach(request()->except('type', 'export') as $key => $value)
                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                        @endforeach
                                        <button type="submit" name="export" value="1" class="btn-export">Export</button>
                                    </form>
                                </th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @forelse($results as $index => $item)
                            @if($reportType == 'stocks')
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->itemCode }}</td>
                                    <td>{{ $item->itemName }}</td>
                                    <td>{{ $item->category ? $item->category->name : 'N/A' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->cost, 0, '.', ',') }}</td>
                                    <td>{{ number_format($item->price, 0, '.', ',') }}</td>
                                    <td>{{ $item->exp_Date }}</td>
                                    <td></td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->sale_date }}</td>
                                    <td>#{{ $item->bill_no }}</td>
                                    <td>{{ number_format($item->total_amount, 0, '.', ',') }} MMK</td>
                                    <td>{{ $item->user ? $item->user->name : 'N/A' }}</td>
                                    <td colspan="4"></td>
                                </tr>
                            @endif
                        @empty
                            <tr class="empty-row">
                                <td colspan="9" style="text-align: center; padding: 20px;">No data found matching your filters.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
</html>
