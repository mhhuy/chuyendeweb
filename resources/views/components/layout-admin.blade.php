<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    @vite('resources/css/app.css')
    @include("components.alert")
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/ toastr.min.css ') }}" />
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
        }

        /* Header styles */
        header {
            background-color: #1c1f26;
            /* Dark background */
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #ff9800;
            /* Accent color */
        }

        header nav {
            display: flex;
            gap: 20px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: #ff9800;
        }

        header .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        header .user-menu img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #ff9800;
        }

        header .user-menu .dropdown {
            position: relative;
            cursor: pointer;
        }

        header .user-menu .dropdown ul {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background: white;
            color: #333;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            list-style: none;
        }

        header .user-menu .dropdown:hover ul {
            display: block;
        }

        header .user-menu .dropdown ul li {
            padding: 10px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }

        header .user-menu .dropdown ul li:hover {
            background: #f5f5f5;
        }

        /* Footer styles */
        footer {
            background-color: #1c1f26;
            color: white;
            text-align: center;
            padding: 20px 30px;
margin-top: 40px;
        }

        footer .footer-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        footer .footer-links a {
            color: #ff9800;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        footer .footer-links a:hover {
            color: #fff;
        }

        footer p {
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">Elite Admin</div>
        <nav>
            <a href="#dashboard">Dashboard</a>
            <a href="#analytics">Analytics</a>
            <a href="#settings">Settings</a>
        </nav>
        <div class="user-menu">
            <img src="https://via.placeholder.com/40" alt="User Avatar">
            <div class="dropdown">
                <span>John Doe</span>
                <ul>
                    <li>Profile</li>
                    <li>Settings</li>
                    <li>Logout</li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main style="padding: 30px;">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-links">
            <a href="#terms">Terms of Service</a>
            <a href="#privacy">Privacy Policy</a>
            <a href="#support">Support</a>
        </div>
        <p>&copy; 2024 Elite Admin. All rights reserved.</p>
    </footer>

    {{ $footer ?? '' }}
</body>

</html>