<html>

<head>
    <title>Recette Title Here</title>
    <script src="https://accounts.google.com/gsi/client?hl=en" async></script>
</head>
<style>
    body {
        margin: 0;
        background: #f6f7fc;
    }
    
    .grid-wpr {
        display: inline-flex;
        width: 100%;
        min-height: 100vh;
    }
    
    .grid-cell {
        width: 100%;
    }
    
    .login-bg {
        background: url('<?= base_url('assets/main/img/recette-login-img.jpg') ?>');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        animation: sideImage .8s ease-in-out;
    }
    
    .login-content {
        align-self: center;
    }
    
    .login-content .floating-callout {
        max-width: 400px;
        width: 100%;
        padding: 15px;
        margin: auto;
        box-sizing: border-box;
        text-align: center;
        animation: floatingCallout 3s ease-in-out;
    }
    
    .login-content .floating-callout h1 {
        margin-top: 0;
        font-family: 'Courier New', Courier, monospace;
        font-weight: 100;
        margin-bottom: 15px;
    }
    
    .login-content .floating-callout p {
        font-family: 'Courier New', Courier, monospace;
        font-weight: 100;
        color: #999;
    }
    
    .mobile-only {
        display: none;
    }
    
    .official-logo {
        width: 50px;
        margin: 0 auto 20px;
        display: block;
    }
    
    .g_id_signin {
        margin-top: 30px;
    }
    
    .g_id_signin iframe {
        margin: auto!important;
    }
    
    @media screen and (min-width: 640px) {
        @keyframes sideImage {
            0% {
                opacity: 0;
                background-position: 3vw;
            }
            100% {
                opacity: 1;
                background-position: 0vw;
            }
        }
        @keyframes floatingCallout {
            0% {
                opacity: 0;
                /* position: relative;
                left: -5vw; */
            }
            100% {
                opacity: 1;
                /* position: relative;
                left: -0vw; */
            }
        }
    }
    
    @media screen and (max-width: 639px) {
        .mobile-only {
            display: block;
            width: 100%;
            max-height: 30vh;
            object-fit: cover;
            object-position: center;
            animation: sideImage .8s ease-in-out;
        }
        .login-bg {
            display: none;
        }
        .grid-wpr {
            display: block;
        }
        .login-content {
            display: inline-flex;
            height: 70vh;
        }
        .floating-callout {
            text-align: center;
            animation: floatingCallout 3s ease-in-out!important;
        }
        @keyframes sideImage {
            0% {
                opacity: 0;
                position: relative;
                top: -3vh;
            }
            100% {
                opacity: 1;
                position: relative;
                top: 0vh;
            }
        }
        @keyframes floatingCallout {
            0% {
                opacity: 0;
                /* position: relative;
                bottom: -5vw; */
            }
            100% {
                opacity: 1;
                /* position: relative;
                bottom: -0vw; */
            }
        }
    }

    .login-with-google-btn {
        transition: background-color .3s, box-shadow .3s;
            
        padding: 12px 16px 12px 42px;
        border: none;
        border-radius: 3px;
        box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
        
        color: #757575;
        font-size: 14px;
        font-weight: 500;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;
        
        background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
        background-color: white;
        background-repeat: no-repeat;
        background-position: 12px 11px;
        
        &:hover {
            box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 2px 4px rgba(0, 0, 0, .25);
        }
        
        &:active {
            background-color: #eeeeee;
        }
        
        &:focus {
            outline: none;
            box-shadow: 
            0 -1px 0 rgba(0, 0, 0, .04),
            0 2px 4px rgba(0, 0, 0, .25),
            0 0 0 3px #c8dafc;
        }
        
        &:disabled {
            filter: grayscale(100%);
            background-color: #ebebeb;
            box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
            cursor: not-allowed;
        }
        }

</style>

<body>
    <main>
        <div class="grid-wpr">
            <img src="<?= base_url('assets/main/images/recette-login-img.jpg') ?>" class="mobile-only" />
            <div class="grid-cell login-content">
                <div class="floating-callout">
                    <img src="<?= base_url('assets/admin/img/aikeone-logo.svg') ?>" class="official-logo" />
                    <h1>Welcome to <b>AikeOne</b></h1>
                    <p>Please Login using your GMAIL account to access our Recipe Page.</p>
                    <!-- <div id="g_id_onload" data-client_id="590697666074-lpreef5a3570n17o8ng6grieifrmf50l.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-callback="onSignIn" data-auto_prompt="false">
                    </div>

                    <div class="g_id_signin" data-type="standard" data-shape="pill" data-theme="outline" data-text="signin_with" data-size="large" data-logo_alignment="center" data-locale="en">
                    </div> -->
                    <a href="<?= base_url('/auth/google-auth') ?>">
                    <button type="button" class="login-with-google-btn" >
                        Sign in with Google
                    </button>
                    </a>    
                </div>
            </div>
            <div class="grid-cell login-bg"></div>
        </div>
    </main>
</body>

<!-- <script>
    function decodeJwtResponse(token) {
        var base64Url = token.split('.')[1];
        var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));

        return JSON.parse(jsonPayload);
    }

    function onSignIn(response) {
        const responsePayload = decodeJwtResponse(response.credential);

        console.log("ID: " + responsePayload.sub);
        console.log('Full Name: ' + responsePayload.name);
        console.log('Given Name: ' + responsePayload.given_name);
        console.log('Family Name: ' + responsePayload.family_name);
        console.log("Image URL: " + responsePayload.picture);
        console.log("Email: " + responsePayload.email);
    }
</script> -->

</html>