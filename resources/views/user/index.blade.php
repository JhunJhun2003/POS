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
                <button class="btn btn-main-menu" onclick="window.location.href='{{ route('admin.index') }}'">Main Menu</button>
            </div>
        </header>

        <section class="top-section">
            <div class="card action-card">
                <button id="admin-btn" class="btn btn-primary">Add Manager</button>
                <button id="user-btn" class="btn btn-primary">Add Cashier</button>
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
                        <th style="width: 100px;">
                            <!--<button id="add-row-btn" class="btn-add">Add Row</button>-->
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $count = 1;
                    @endphp
                    @foreach($users as $user)
                    <tr>
                        <td class="text-red">{{$count++}}</td>
                        <td class="text-red">{{$user->name}}</td>
                        <td class="text-red">{{$user->usertype}}</td>
                        <td class="text-red">{{$user->usertype}}</td>
                        <td class="text-red">{{$user->name}}</td>
                        <td class="text-red">********</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit">Edit</button>
                                <form action="{{route('admin.deleteUser',$user->id)}}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="confirm('Are you sure delete')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <!-- Registration Modal (Admin/Manager/) -->
    <div id="modal-overlay" class="modal-overlay">
        <form action="{{ route('admin.addUser') }}" method="post">
            @csrf 
            <div class="modal-content">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="name"  placeholder="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="usertype">
                        <option value="" disabled selected></option>
                        <!--<option value="admin">Admin</option>-->
                        <option value="manager">Manager</option>
                        <!--<option value="user">User</option>-->
                    </select>
                </div>
            
                <button type="submit" class="btn btn-register">Register</button>
            </div>
        </form>
    </div>

    <!-- Registration Modal (User/Cashier) -->
    <div id="user-modal-overlay" class="modal-overlay">
        <form action="{{ route('admin.addUser') }}" method="post">
            @csrf 
            <div class="modal-content">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="name"  placeholder="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="usertype">
                        <option value="" disabled selected>Select</option>
                        <!--<option value="admin">Admin</option>
                        <option value="manager">Manager</option>-->
                        <option value="user">User</option>
                    </select>
                </div>
            
                <button type="submit" class="btn btn-register">Register</button>
            </div>
        </form>
    </div>

    

    <script src="{{asset('assets/user/script.js')}}"></script>
</body>

</html>