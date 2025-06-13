
     <style>
        body {
            font-family: 'Inter', sans-serif;
            /* Using Inter font as per guidelines */
            overflow-x: hidden;
            /* Prevent horizontal scroll due to animations */
        }

        .login-container {
            min-height: 100vh;
            /* Subtle gradient background */
            background: linear-gradient(135deg, #e0f2f7 0%, #c1e4f4 100%);
            /* Light blue gradient */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            /* Increased padding */
        }

        .login-card {
            max-width: 32rem;
            /* Slightly wider card */
            width: 100%;
            background-color: #ffffff;
            border-radius: 1rem;
            /* More rounded corners */
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.08);
            /* More pronounced shadow */
            padding: 2.5rem;
            /* Increased padding */
            margin-top: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.6);
            /* Subtle light border */
            backdrop-filter: blur(5px);
            /* Subtle blur effect on card */
            animation: fadeIn 0.8s ease-out forwards;
            /* Fade in animation for the card itself */
            opacity: 0;
            /* Start invisible for the fade-in animation */
        }

        /* Keyframes for card fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Keyframes for staggered element animation */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Apply staggered animation to child elements */
        .animated-item {
            opacity: 0;
            /* Start invisible */
            animation: slideInUp 0.6s ease-out forwards;
        }

        .login-card>.animated-item:nth-child(1) {
            animation-delay: 0.1s;
        }

        /* Welcome Back! */
        .login-card>.animated-item:nth-child(2) {
            animation-delay: 0.2s;
        }

        /* Sign in to your account */
        .login-card>form {
            animation: slideInUp 0.6s ease-out forwards;
            animation-delay: 0.3s;
            opacity: 0;
            /* Start invisible */
        }

        .login-card>.text-center.text-muted.mt-4 {
            animation: slideInUp 0.6s ease-out forwards;
            animation-delay: 1.0s;
            /* Delay for the sign-up link */
            opacity: 0;
            /* Start invisible */
        }


        h2 {
            color: #2c3e50;
            /* Darker, more prominent heading */
            margin-bottom: 0.5rem;
            /* Reduce space after heading */
        }

        .text-secondary-subtitle {
            color: #7f8c8d;
            /* Muted subtitle color */
            margin-bottom: 2rem;
            /* More space after subtitle */
        }

        .form-group {
            margin-bottom: 1.75rem;
            /* Increased space between form groups */
        }

        .form-label {
            color: #34495e;
            /* Darker label color */
            font-weight: 600;
            /* Slightly bolder labels */
            margin-bottom: 0.5rem;
            display: block;
            /* Ensure labels are block elements for proper spacing */
        }

        .form-control-custom {
            display: block;
            width: 100%;
            padding: 0.75rem 1.25rem;
            /* More generous padding */
            font-size: 1rem;
            /* Slightly larger font size */
            line-height: 1.5;
            color: #2c3e50;
            background-color: #f8f9fa;
            /* Lighter background for inputs */
            background-clip: padding-box;
            border: 1px solid #ced4da;
            /* Default border color */
            border-radius: 0.5rem;
            /* More rounded input fields */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.06);
            /* Subtle inner shadow */
            transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            /* Smooth transitions */
        }

        .form-control-custom::placeholder {
            color: #a0a7ad;
            /* Slightly darker placeholder */
        }

        .form-control-custom:focus {
            border-color: #6a8cd6;
            /* A more vibrant blue on focus */
            box-shadow: 0 0 0 0.25rem rgba(106, 140, 214, 0.25), inset 0 1px 3px rgba(0, 0, 0, 0.08);
            /* More visible focus ring */
            outline: none;
            background-color: #ffffff;
            /* White background on focus */
        }

        .btn-indigo-custom {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            /* Larger button padding */
            border: none;
            /* No border */
            border-radius: 0.5rem;
            /* Rounded button */
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            /* Lifted shadow */
            font-size: 1.1rem;
            /* Larger font for button */
            font-weight: 700;
            /* Bolder text */
            color: #ffffff;
            background: linear-gradient(45deg, #6a8cd6 0%, #4f46e5 100%);
            /* Gradient background */
            cursor: pointer;
            transition: all 0.3s ease;
            /* Smooth transitions for hover/focus */
            letter-spacing: 0.025em;
            /* Slightly spaced out letters */
        }

        .btn-indigo-custom:hover {
            background: linear-gradient(45deg, #4f46e5 0%, #3f35c7 100%);
            /* Darker gradient on hover */
            transform: translateY(-2px);
            /* Slight lift on hover */
            box-shadow: 0 6px 12px rgba(50, 50, 93, 0.15), 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-indigo-custom:focus {
            outline: none;
            box-shadow: 0 0 0 0.25rem rgba(106, 140, 214, 0.5), 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .btn-indigo-custom:active {
            transform: translateY(0);
            /* Press down effect */
            box-shadow: 0 2px 4px rgba(50, 50, 93, 0.1), 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .text-indigo-link {
            color: #4f46e5;
            font-weight: 600;
            /* Bolder link text */
            text-decoration: none;
            transition: color 0.2s ease, transform 0.2s ease;
            /* Add transform transition */
        }

        .text-indigo-link:hover {
            color: #6a8cd6;
            /* Lighter blue on hover */
            text-decoration: underline;
            transform: translateY(-1px);
            /* Subtle lift on hover */
        }

        /* Checkbox styling */
        .form-check-input-custom {
            height: 1.15rem;
            /* Slightly larger checkbox */
            width: 1.15rem;
            /* Slightly larger checkbox */
            color: #4f46e5;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 0.35rem;
            /* More rounded checkbox */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            vertical-align: middle;
            cursor: pointer;
            transition: background-color 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-check-input-custom:checked {
            background-color: #4f46e5;
            border-color: #4f46e5;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-check-input-custom:focus {
            outline: none;
            box-shadow: 0 0 0 0.25rem rgba(106, 140, 214, 0.25);
            /* Focus ring for checkbox */
        }

        .form-check-label {
            font-weight: 500;
            /* Slightly bolder label */
            color: #34495e;
            /* Darker label color */
        }

        .d-flex.justify-content-between.align-items-center.mb-4 {
            margin-bottom: 2rem !important;
            /* Adjust spacing for this row */
        }
    </style>

    <div class="login-container">
        <div class="login-card">
            <h2 class="text-3xl font-weight-bold text-center animated-item">
                Welcome Back!
            </h2>
            <p class="text-center text-secondary-subtitle animated-item">Sign in to your account</p>

            <!-- Login Form -->
            <form class="space-y-4" method="POST" action="{{route('login.submit')}}">
                @csrf <!-- CSRF token for Laravel forms -->

                <!-- Email Input -->
                <div class="form-group animated-item" style="animation-delay: 0.4s;">
                    <label for="email" class="form-label">
                        Email Address
                    </label>
                    <div>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="form-control-custom" placeholder="you@example.com">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="form-group animated-item" style="animation-delay: 0.6s;">
                    <label for="password" class="form-label">
                        Password
                    </label>
                    <div>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="form-control-custom" placeholder="********">
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-4 animated-item"
                    style="animation-delay: 0.8s;">
                    <div class="form-check">
                        <input id="rememberMe" name="rememberMe" type="checkbox" class="form-check-input-custom">
                        <label for="remember_me" class="form-check-label ml-2">
                            Remember me
                        </label>
                    </div>
                </div>

                <!-- Login Button -->
                <div class="form-group animated-item" style="animation-delay: 1.0s;">
                    <button type="submit" class="btn-indigo-custom"  onclick="lsRememberMe()">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div> 

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
<script>
const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && emailInput.value !== "") {
    localStorage.username = emailInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}
</script>