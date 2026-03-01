<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>ABK Login - Responsive</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inder', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #4988c4;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Main container - responsive version */
        .login-container {
            position: relative;
            width: 100%;
            max-width: 1200px;
            min-height: 600px;
            background: #4988c4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Form container - responsive rectangle */
        .form-rectangle {
            position: relative;
            width: 100%;
            max-width: 776px;
            background: #9CD5FF;
            border: 1px solid #3A6482;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
            padding: clamp(30px, 5vw, 60px);
            margin: 20px auto;
        }

        /* ABK Login Title - responsive */
        .abk-login {
            font-family: 'Inder', sans-serif;
            font-size: clamp(40px, 10vw, 90px);
            line-height: 1.2;
            font-weight: 400;
            text-align: center;
            color: #FFFFFF;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            margin-bottom: clamp(20px, 5vh, 50px);
            width: 100%;
            word-break: break-word;
        }

        /* Form grid for responsive layout */
        .form-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }

        /* Form row - makes label and input responsive */
        .form-row {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px;
            width: 100%;
            flex-wrap: wrap;
        }

        /* Label styling - responsive */
        .form-label {
            font-family: 'Inder', sans-serif;
            font-size: clamp(24px, 4vw, 40px);
            line-height: 1.2;
            color: #000000;
            min-width: 120px;
            flex: 0 0 auto;
        }

        /* Input container - takes remaining space */
        .input-container {
            flex: 1;
            min-width: 200px;
        }

        /* Input fields - responsive */
        .form-input {
            width: 100%;
            height: clamp(45px, 6vw, 54px);
            background: #D9D9D9;
            border: none;
            padding: 0 15px;
            font-size: clamp(16px, 2vw, 20px);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: 2px solid #3A6482;
            background: #ffffff;
        }

        .form-input::placeholder {
            color: #666;
            font-size: clamp(14px, 1.8vw, 16px);
        }

        /* Button container - responsive */
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            width: 100%;
        }

        /* Login button - responsive */
        .login-button {
            width: 100%;
            max-width: 235px;
            height: clamp(50px, 6vw, 60px);
            background: #F4F0E4;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .login-button:hover {
            background: #e5dbc9;
            transform: translateY(-2px);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-button span {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: clamp(24px, 4vw, 40px);
            line-height: 1.2;
            color: #000000;
            display: block;
            text-align: center;
        }

        /* Mobile layout - stack vertically */
        @media screen and (max-width: 768px) {
            .form-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .form-label {
                min-width: auto;
            }

            .input-container {
                width: 100%;
            }

            .form-rectangle {
                padding: 25px;
            }
        }

        /* Small mobile devices */
        @media screen and (max-width: 480px) {
            body {
                padding: 10px;
            }

            .form-rectangle {
                padding: 20px;
            }

            .login-button {
                max-width: 100%;
            }
        }

        /* Landscape mode on mobile */
        @media screen and (max-height: 600px) and (orientation: landscape) {
            .login-container {
                min-height: auto;
            }

            .form-rectangle {
                padding: 20px;
            }

            .abk-login {
                margin-bottom: 15px;
            }
        }

        /* Tablet layout */
        @media screen and (min-width: 769px) and (max-width: 1024px) {
            .form-rectangle {
                max-width: 700px;
            }
        }

        /* Large desktop screens */
        @media screen and (min-width: 1400px) {
            .login-container {
                max-width: 1400px;
            }
        }

        /* Add smooth transitions */
        .form-rectangle, .form-label, .form-input, .login-button {
            transition: all 0.3s ease;
        }

        /* High-resolution screens */
        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .abk-login {
                text-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
            }
        }

        /* Optional: Add background pattern for visual interest */
        .login-container::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }
    </style>
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
                                placeholder="Enter your username"
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
                                placeholder="Enter your password"
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