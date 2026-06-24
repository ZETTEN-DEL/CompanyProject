<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>CampusEvent Company</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">



<style>


body {

    background:#f5f6fa;
    font-family: Segoe UI, sans-serif;

}

.hero {

    background:url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f');
    background-size:cover;
    background-position:center;
    height:80vh;
    color:white;
    display:flex;
    align-items:center;

}

.hero-overlay {

    background:rgba(0,0,0,.6);
    width:100%;
    height:100%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;

}

/* NAVBAR */

.nav-link {

    transition:.3s;

}

.nav-link:hover {

    color:#ffc107 !important;
    transform:translateY(-2px);

}

/* LOGIN BUTTON */

.login-btn {

    background:#ffc107 !important;
    color:#212529 !important;
    padding:8px 25px !important;
    border-radius:30px;
    font-weight:bold;
    box-shadow:0 5px 15px rgba(255,193,7,.4);
    transition:.3s;

}

.login-btn:hover {

    background:#dc3545 !important;
    color:white !important;
    transform:translateY(-3px);
    box-shadow:0 10px 20px rgba(220,53,69,.5);

}

/* ARTICLE CARD */

.card {

    border:none;
    transition:all .3s ease;
    overflow:hidden;

}

.card:hover {

    transform:translateY(-10px);
    box-shadow:0 15px 35px rgba(0,0,0,.20) !important;

}

.card-img-top {

    transition:.4s;

}

.card:hover .card-img-top {

    transform:scale(1.05);

}

.service-img {

    height:250px;
    object-fit:cover;

}

.card-body .btn {

    transition:.3s;

}

.card:hover .btn {

    transform:scale(1.05);

}

/* BUTTON */

.btn-primary {

    transition:.3s;

}

.btn-primary:hover {

    transform:translateY(-2px);

}

/* FOOTER */

footer {

    margin-top:70px;

}

</style>


</head>



<body>





<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">


<div class="container">



<a class="navbar-brand fw-bold fs-4" href="/">

🎓 CampusEvent

</a>





<button class="navbar-toggler"
data-bs-toggle="collapse"
data-bs-target="#nav">


<span class="navbar-toggler-icon"></span>


</button>





<div class="collapse navbar-collapse" id="nav">


<ul class="navbar-nav ms-auto gap-3">





<li class="nav-item">

<a class="nav-link
{{ request()->is('/') ? 'active text-warning fw-bold' : '' }}"
href="/">

Home

</a>

</li>





<li class="nav-item">

<a class="nav-link
{{ request()->is('about') ? 'active text-warning fw-bold' : '' }}"
href="/about">

About

</a>

</li>





<li class="nav-item">

<a class="nav-link
{{ request()->is('services') ? 'active text-warning fw-bold' : '' }}"
href="/services">

Services

</a>

</li>





<li class="nav-item">

<a class="nav-link
{{ request()->is('articles') ? 'active text-warning fw-bold' : '' }}"
href="/articles">

Articles

</a>

</li>





<li class="nav-item">

<a class="nav-link
{{ request()->is('contact') ? 'active text-warning fw-bold' : '' }}"
href="/contact">

Contact

</a>

</li>





<!-- LOGIN -->

<li class="nav-item">

<a class="nav-link login-btn"
href="/login">

🔐 Login

</a>

</li>





</ul>


</div>



</div>


</nav>






@yield('hero')




<div class="container mt-5">


@yield('content')


</div>






<footer class="bg-dark text-white text-center p-4">


<h5>

CampusEvent Organizer

</h5>


<p>

Professional Campus Event Organizer

</p>


</footer>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>