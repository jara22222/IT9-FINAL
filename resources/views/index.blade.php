<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Log In</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body {
                background-color: #f5f9f4;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                overflow: hidden;
                position: relative;
            }

            .floating-container {
                position: relative;
                width: 400px;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
                padding: 40px;
                z-index: 10;
                animation: float 6s ease-in-out infinite;
                border: 1px solid rgba(255, 255, 255, 0.2);
                overflow: hidden;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-20px);
                }
            }

            .floating-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: -40%;
                width: 100%;
                height: 100%;
                background: linear-gradient(45deg,
                        rgba(151, 207, 138, 0.1),
                        rgba(177, 221, 158, 0.1),
                        rgba(49, 94, 38, 0.1),
                        rgba(122, 159, 121, 0.1));
                transform: skewX(-15deg);
                pointer-events: none;
                z-index: -1;
            }

            h2 {
                color: #315e26;
                text-align: center;
                margin-bottom: 30px;
                font-weight: 600;
                font-size: 28px;
            }

            .input-group:nth-child(2) {
                position: relative;
                margin-bottom: 25px;
            }

            .input-group:nth-child(3) {
                position: relative;
                margin-bottom: 15px;
            }

            .input-group input {
                width: 100%;
                padding: 15px 20px;
                background: rgba(255, 255, 255, 0.8);
                border: 2px solid rgba(177, 221, 158, 0.5);
                border-radius: 10px;
                font-size: 16px;
                color: #315a39;
                transition: all 0.3s;
            }

            .input-group input:focus {
                border-color: #acd1af;
                box-shadow: 0 0 10px rgba(172, 209, 175, 0.3);
                outline: none;
                background: white;
            }

            .input-group label {
                position: absolute;
                top: 15px;
                left: 20px;
                color: #7a9f79;
                font-size: 16px;
                pointer-events: none;
                transition: all 0.3s;
            }

            .input-group input:not(:placeholder-shown)+label,
            .input-group input:focus+label {
                top: -20px;
                left: 15px;
                font-size: 12px;
                background: transparent;
                padding: 0 5px;
                color: #315e26;
            }

            .btn {
                width: 100%;
                padding: 15px;
                background: #315e26;
                border: none;
                border-radius: 10px;
                color: white;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s;
                box-shadow: 0 5px 15px rgba(149, 194, 138, 0.4);
            }

            .btn:hover {
                background: linear-gradient(45deg, #64a46a);
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(149, 194, 138, 0.6);
            }

            .bottom-text {
                text-align: center;
                margin-top: 20px;
                color: #315a39;
                font-size: 14px;
            }

            .bottom-text a {
                color: #315e26;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s;
            }

            .bottom-text a:hover {
                text-decoration: underline;
                color: #b1dd9e;
            }

            .floating-bubbles {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                z-index: 1;
                pointer-events: none;
                overflow: hidden;
            }

            .bubble {
                position: absolute;
                border-radius: 50%;
                opacity: 0.7;
                animation: floatBubble linear infinite;
            }

            .floating-bubbles .bubble:nth-child(1) {
                width: 80px;
                height: 80px;
                top: 10%;
                left: 20%;
                animation-duration: 12s;
                animation-delay: 0s;
                background: linear-gradient(45deg, rgba(151, 207, 138, 0.6), rgba(49, 94, 38, 0.4));
            }

            .floating-bubbles .bubble:nth-child(2) {
                width: 120px;
                height: 120px;
                top: 60%;
                left: 80%;
                animation-duration: 18s;
                animation-delay: 2s;
                background: linear-gradient(45deg, rgba(4, 115, 140, 0.4), rgba(41, 222, 242, 0.6));
            }

            .floating-bubbles .bubble:nth-child(3) {
                width: 60px;
                height: 60px;
                top: 30%;
                left: 50%;
                animation-duration: 15s;
                animation-delay: 4s;
                background: linear-gradient(45deg, rgba(122, 159, 121, 0.5), rgba(177, 221, 158, 0.5));
            }

            .floating-bubbles .bubble:nth-child(4) {
                width: 100px;
                height: 100px;
                top: 75%;
                left: 30%;
                animation-duration: 20s;
                animation-delay: 1s;
                background: linear-gradient(45deg, rgba(49, 94, 38, 0.5), rgba(151, 207, 138, 0.5));
            }

            .floating-bubbles .bubble:nth-child(5) {
                width: 50px;
                height: 50px;
                top: 25%;
                left: 10%;
                animation-duration: 17s;
                animation-delay: 1.5s;
                background: linear-gradient(45deg, rgba(177, 221, 158, 0.6), rgba(122, 159, 121, 0.4));
            }

            .floating-bubbles .bubble:nth-child(6) {
                width: 90px;
                height: 90px;
                top: 50%;
                left: 50%;
                animation-duration: 14s;
                animation-delay: 3s;
                background: linear-gradient(45deg, rgba(41, 222, 242, 0.5), rgba(4, 115, 140, 0.5));
            }

            .floating-bubbles .bubble:nth-child(7) {
                width: 70px;
                height: 70px;
                top: 40%;
                left: 70%;
                animation-duration: 16s;
                animation-delay: 2.5s;
                background: linear-gradient(45deg, rgba(122, 159, 121, 0.5), rgba(177, 221, 158, 0.5));
            }

            .floating-bubbles .bubble:nth-child(8) {
                width: 110px;
                height: 110px;
                top: 20%;
                left: 80%;
                animation-duration: 19s;
                animation-delay: 0.5s;
                background: linear-gradient(45deg, rgba(49, 94, 38, 0.6), rgba(151, 207, 138, 0.6));
            }

            .floating-bubbles .bubble:nth-child(9) {
                width: 40px;
                height: 40px;
                top: 65%;
                left: 15%;
                animation-duration: 13s;
                animation-delay: 4.5s;
                background: linear-gradient(45deg, rgba(41, 222, 242, 0.4), rgba(4, 115, 140, 0.4));
            }

            .floating-bubbles .bubble:nth-child(10) {
                width: 100px;
                height: 100px;
                top: 80%;
                left: 60%;
                animation-duration: 21s;
                animation-delay: 3.5s;
                background: linear-gradient(45deg, rgba(177, 221, 158, 0.5), rgba(122, 159, 121, 0.5));
            }

            @keyframes floatBubble {
                0% {
                    transform: translateY(0) rotate(0deg);
                }

                50% {
                    transform: translateY(-100px) rotate(180deg);
                }

                100% {
                    transform: translateY(0) rotate(360deg);
                }
            }
        </style>
    </head>

    <body>
        <div class="floating-bubbles">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
        </div>

        <div class="floating-container">
            <h2>PCTOPAY</h2>

            <form method="POST" action="{{ route('login.user') }}">
                @csrf
                <div class="input-group">
                    <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <label for="username">Username</label>
                    @if ($errors->has('name'))
                        <audio src="{{ asset('audio/error.mp3') }}" autoplay></audio>
                        <span class="text-danger" style="color: red">{{ $errors->first('name') }}</span>
                    @endif

                </div>

                <div class="input-group">

                    <input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <label for="password">Password</label>
                    @if ($errors->has('password'))
                        <audio src="{{ asset('audio/error.mp3') }}" autoplay></audio>
                        <span class="text-danger z-40" style="color: red">{{ $errors->first('password') }}</span>
                    @endif
                    {{-- add show password --}}



                </div>
                <div class=" d-flex gap-2">
                    <input type="checkbox" id="pass" onclick="showPass()" class="form-control">
                    <label for="pass"><small>Show password</small></label>
                </div>

                <button type="submit" class="btn mt-2">Sign In</button>

            </form>
        </div>
    </body>
    <script>
        function showPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</html>
