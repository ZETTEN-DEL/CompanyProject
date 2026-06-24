<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .login-card {
            width: 380px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            animation: muncul .5s ease;
        }

        @keyframes muncul {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }


        .input-box {
            margin-bottom: 15px;
        }


        label {
            color: #555;
            font-size: 14px;
        }


        input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 10px;
            border: 1px solid #ddd;
            outline: none;
        }


        input:focus {
            border-color: #667eea;
        }


        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #667eea;
            color:white;
            font-size: 16px;
            cursor:pointer;
            margin-top:15px;
        }


        button:hover {
            background:#5563c1;
        }


        .back {
            display:block;
            text-align:center;
            margin-top:20px;
            text-decoration:none;
            color:#667eea;
        }


        .error {
            background:#ffdddd;
            color:red;
            padding:10px;
            border-radius:10px;
            margin-bottom:15px;
        }

    </style>

</head>


<body>


<div class="login-card">

    <h2>🔐 Login Admin</h2>


    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif



    <form action="/login" method="POST">

        @csrf


        <div class="input-box">

            <label>Email</label>

            <input 
            type="email" 
            name="email"
            placeholder="Masukkan email"
            required>

        </div>



        <div class="input-box">

            <label>Password</label>

            <input 
            type="password"
            name="password"
            placeholder="Masukkan password"
            required>

        </div>



        <button type="submit">
            Login
        </button>


    </form>



    <a href="{{ route('home') }}" class="back">
        ← Kembali ke Home
    </a>


</div>



</body>
</html>