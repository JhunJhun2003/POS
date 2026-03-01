<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>ABK Login - Responsive</title>
     <link href="assets/signup/style.css" rel="stylesheet" />
</head>
<body>
    <div class="login-container">
        <div class="form-rectangle">
            <div class="abk-login">ABK Login</div>
            
            <form id="loginForm" onsubmit="handleLogin(event)">
                <div class="form-grid">
                    <!-- Username field -->
                    <div class="form-row">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-container">
                            <input 
                                type="text" 
                                id="username" 
                                name="username" 
                                class="form-input" 
                                {{-- placeholder="Enter your username" --}}
                                required
                                autocomplete="off"
                            >
                        </div>
                    </div>

                    <!-- Password field -->
                    <div class="form-row">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-container">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="form-input" 
                                {{-- placeholder="Enter your password" --}}
                                required
                            >
                        </div>
                    </div>

                    <!-- Login button -->
                    <div class="button-container">
                        <button type="submit" class="login-button">
                            <span>Login</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>