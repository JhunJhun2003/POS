<!DOCTYPE html>
<html lang="my">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABK MINI MART</title>
    <link rel="stylesheet" href="{{asset('assets/user/style.css')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Noto+Sans+Myanmar:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="header-left">
                <span>Account</span>
            </div>
            <div class="header-center">
                <h1>ABK MINI MART</h1>
            </div>
            <div class="header-right">
                <button class="btn btn-main">Main Menu</button>
            </div>
        </header>

        <section class="top-section">
            <div class="card action-card">
                <button id="admin-btn" class="btn btn-primary">Admin and Manager</button>
                <button id="user-btn" class="btn btn-primary">User and Cashier</button>
            </div>
            <div class="card terms-card">
                <h3>Terms and Conditions</h3>
                <ol>
                    <li>Admin နှင့် Manager Account တို့မှာ Application အား Full Control ရရှိမည်ဖြစ်သည်။</li>
                    <li>User နှင့် Cashier Account တို့မှာ ဈေးရောင်းခြင်းနှင့် Stock ကြည့်ခွင့်သာရှိမည်။</li>
                </ol>
            </div>
        </section>

        <section class="table-section">
            <table class="user-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No.</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Role</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th style="width: 100px;"><button id="add-row-btn" class="btn-add">Add Row</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-red">1</td>
                        <td class="text-red">Kyaw Zin</td>
                        <td class="text-red">Cashier</td>
                        <td class="text-red">Cashier</td>
                        <td class="text-red">kyawzin</td>
                        <td class="text-red">********</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit">Edit</button>
                                <button class="btn-delete">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

    <!-- Registration Modal (Admin/Manager/User/Cashier) -->
    <div id="modal-overlay" class="modal-overlay">
        <div class="modal-content">
            <div class="form-group">
                <label>Username</label>
                <input type="text" placeholder="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" placeholder="">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" placeholder="">
            </div>
            <div class="form-group">
                <label>Role</label>
                <select>
                    <option value="" disabled selected>&lt;Dropdown Box&gt;</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                </select>
            </div>
            <button class="btn btn-register">Register</button>
        </div>
    </div>

    <!-- Add Row Modal -->
    <div id="add-row-overlay" class="modal-overlay">
        <div class="modal-content">
            <div class="form-group">
                <label>Name</label>
                <input type="text" placeholder="">
            </div>
            <div class="form-group">
                <label>Position</label>
                <input type="text" placeholder="">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" placeholder="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" placeholder="">
            </div>
            <div class="form-group">
                <label>Role</label>
                <select>
                    <option value="" disabled selected>&lt;Dropdown Box&gt;</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="user">User</option>
                    <option value="cashier">Cashier</option>
                </select>
            </div>
            <button class="btn btn-register">Add</button>
        </div>
    </div>

    <script src="{{asset('assets/user/script.js')}}"></script>
</body>

</html>