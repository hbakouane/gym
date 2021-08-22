<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Main Css -->
    <link rel="stylesheet" href="{{ url('/css/landingpage.css') }}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Fonts (Mulish) -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Gymeo CRM - GYM management made easy</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-main border-bottom justify-content-between sticky-top py-3">
        <div class="container">
            <a class="navbar-brandtext-light" href="/">
                <span class="text-light h1 bold">GYMEO CRM</span>
            </a>
            <div class="form-inline">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-light text-main my-2 my-sm-0 mx-1">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light text-main my-2 my-sm-0 mx-1">Register</a>
                    <a href="{{ route('staff.login.get') }}" class="btn btn-light text-main my-2 my-sm-0 mx-1">Staff Portal</a>
                @endguest
                @auth
                    <a href="{{ route('projects.manage') }}" class="btn btn-main-outline">Go to Dashboard</a>
                @endauth
            </div>
        </div>
    </nav>
    <!-- / Navbar -->

    <!-- Hero -->
    <div class="container-fluid hero px-0 border-bottom">
        <svg id="visual" viewBox="0 0 900 600" width="100%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><path d="M0 302L75 305.3C150 308.7 300 315.3 450 289.7C600 264 750 206 825 177L900 148L900 0L825 0C750 0 600 0 450 0C300 0 150 0 75 0L0 0Z" fill="#1B1F53" stroke-linecap="round" stroke-linejoin="miter"></path></svg>
        <div class="container text-center py-5 hero-content" data-aos="fade-up">
            <h1 class="text-light">GYMEO CRM</h1>
            <p class="h4 text-light">
                A Gym management system which allows to manage members, payments, vendors, memberships, staves and more ...
            </p>
            <p class="h4 text-light bold mt-3">
                Available in 2 Languages
                <img class="img-fluid flag rounded" src="{{ url('images/usa-flag.png') }}" alt="Gymeo CRM is available in English & Frensh">
                <img class="img-fluid flag rounded" src="{{ url('images/fr-flag.png') }}" alt="Gymeo CRM est disponible en français et englais">
            </p>
            <img class="img-fluid rounded shadow mt-4 screenshot" onclick="redirectToImage(this.src)" src="{{ url('/images/screenshots/dashboard.png') }}" alt="Gymeo CRM - Gym management system">
        </div>
    </div>
    <!-- / Hero -->

    <!-- Features -->
    <div class="container-fluid py-5 border-bottom wow" data-aos="fade-up">
        <div class="container">
            <p class="h1 mb-5 text-center text-main">Features</p>
            <div class="row">
                <div class="col-md-4 my-2">
                    <div class="feature-box bg-white rounded p-4 border">
                        <i class="fa fa-tools text-main h1"></i>
                        <h3 class="text-main">All-in-one CRM</h3>
                        <p class="text-muted">
                            By using this CRM, you won't need to use any external tool, website or application 
                            because it has all the features you will need.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="feature-box bg-white rounded p-4 border">
                        <i class="fa fa-tablet-alt text-main h1"></i>
                        <h3 class="text-main">Responsive</h3>
                        <p class="text-muted">
                            The system is responsive on all devices, which means it can be used on computers, 
                            tablets, phones and all the other devices.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="feature-box bg-white rounded p-4 border">
                        <i class="fa fa-project-diagram text-main h1"></i>
                        <h3 class="text-main">Create multiple projects</h3>
                        <p class="text-muted">
                            By using this CRM, you have the ability to create new fresh projects anytime you want to.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Features -->

    <!-- Memberships -->
    <div class="container-fluid bg-white py-5 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4 my-auto" data-aos="fade-left">
                    <h1 class="text-main bold">Easily control the memberships.</h1>
                    <p class="text-muted">
                        Gymeo allows you to control the memberships and gives you the ability to know whether
                        it is you or a staff who has proceeded it!
                    </p>
                </div>
                <div class="col-md-8" data-aos="fade-right">
                    <img class="img-fluid rounded shadow screenshot" onclick="redirectToImage(this.src)" src="{{ url('/images/screenshots/memberships.png') }}" alt="Gymeo CRM - Manage your members plans">
                </div>
            </div>
        </div>
    </div>
    <!-- / Memberships -->

    <!-- Plans -->
    <div class="container-fluid bg-light py-5 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8" data-aos="fade-left">
                    <img class="img-fluid rounded border shadow screenshot mb-4" onclick="redirectToImage(this.src)" src="{{ url('/images/screenshots/plans.png') }}" alt="Gymeo CRM - Manage your members plans">
                </div>
                <div class="col-md-4 my-auto" data-aos="fade-right">
                    <h1 class="text-main bold">Create plans for your members.</h1>
                    <p class="text-muted">
                        You can create plans with specific features and assign them to your members.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- / Plans -->

    <!-- Staves -->
    <div class="container-fluid bg-white py-5 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4 my-auto" data-aos="fade-left">
                    <h1 class="text-main bold">Let the team handle the work.</h1>
                    <p class="text-muted">
                        You can add roles with specific previliges, assign them to staves and give them
                        access to only what they allowed to do.
                    </p>
                </div>
                <div class="col-md-8" data-aos="fade-right">
                    <img class="img-fluid rounded shadow screenshot" onclick="redirectToImage(this.src)" src="{{ url('/images/screenshots/roles.png') }}" alt="Gymeo CRM - Manage your members plans">
                </div>
            </div>
        </div>
    </div>
    <!-- / Staves -->

    <!-- Footer -->
    <div class="container-fluid bg-light text-center py-1 pt-3 text-main">
        <p>Copyright &copy; | All rights reserved.</p>
    </div>
    <!-- / Footer -->

    <!-- Bootstrap JS -->
    <script src="{{ url('/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            delay: 200,
            duration: 400,
            debounceDelay: 50
        });
        // Direct the users directly to the image so they can see it in a bigger performance
        let redirectToImage = url => {
            window.open(url, '_blank');
        }
    </script>
</body>
</html>