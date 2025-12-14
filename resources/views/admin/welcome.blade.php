<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Welcome Page</title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <style>
    .spacer {
      margin-top: 20px;
      height: 10px;
    }

     a{
      text-decoration: none;
     }
  </style>
</head>

<body class="welcome-body">
  <div class="overlay"></div> <!-- Transparent layer -->

  <div class="container">
    <div class="top-left">
      <img src="{{asset('assets/logo.png')}}" alt="logo" class="logo">
      <h3 class="motto">For nations greater heights</h3>
    </div>

    <div class="text-section">
      <h1 class="welcome-text">WELCOME TO SNSU<br>CAMPUS SPACE!</h1>
      <p class="sub-text">ACCESS, BOOK, MANAGE</p>

      <div class="spacer"><a class="manage-btn" href="{{ route('dashboard') }}">MANAGE</a></div>
    </div>
  </div>

  <script src="{{asset('js/script.js')}}"></script>
</body>

</html>