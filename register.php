<?php
@include 'connection.php';

if (isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);


    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']); 


    $select = "select * from registration where email = '$name' && password = '$pass' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0 ){

        $error[] = 'user alredy exits! ';
     }else{ 
        if($pass != $cpass){
            $error[]  ='password not matched!';  
            }else{
                $insert ="insert into registration(name, password, email) values ('$name','$pass','$email')"; 
                mysqli_query($conn, $insert);
                header('location:login.php');
            }
        }
};
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Foody - Organic Food </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'/>
<style>


    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins',sans-serif;
    }


    body{
    background: #ffffff;
    }

    .background{
    width: 100%;
    height: 100vh;
    background: url('img/about.jpg')no-repeat;
    background-size: cover;
    background-position: center;
    filter: blur(10px);
    }

    .container{
    position: absolute;
    top: 60%;
    left: 50%;
    width: 40%;
    transform: translate(-50%, -50%);
   
    height: 550px;
 
    background-size: cover;
    background-position: center;
    border-radius: 10px;
    margin-top: 20px;
    }




    .container .log-box {
  
    height: 100%;
    } 


    .log-box .from-box {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    background: transparent;
    backdrop-filter: Blur(20px);
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    color: #ffffff;
    }

    .from-box h2 {
    font-size: 32px;
    text-align: center;
    }
    .from-box .input-box{
    position: relative;
    width: 300px;
    height: 50px;
    border-bottom: 2px solid #e4e4e4;
    margin: 30px 0;
    
    }
    .input-box input {

    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 16px;
    color: #e4e4e4;
    font-weight: 500;
    padding-right: 28px;
    }
    .input-box label {
    position: absolute;
    top: 50%;
    left:0;
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: 500;
    pointer-events: none;
    transition: .5s ease;
    } 
    .input-box input:focus~label,
    .input-box input:valid~label{
    top: -5px;
    }


    .input-box .icon {
    position: absolute;
    top: 13px;
    right: 0;
    font-size: 19px;
    }

    .from-box .remember{
    font-size: 14.5px;
    font-weight: 500;
    margin: -15px 0 15px;
    display: flex;
    justify-content: space-between;
    }

    .remember label input{
    accent-color: #e4e4e4;
    margin-right: 3px;

    } 
    .remember a {
    color: #e4e4e4;
    text-decoration: none;
    }

    .remember a:hover {
    text-decoration: underline;
    }
    
    .btn{
    width: 100%;
    height: 45px;
    background: #646161b6;
    border: none;
    outline: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    color: #e2e2e2;
    font-weight: 500;
    box-shadow: 0 0 10px  rgba(0, 0, 0, 5);
    }

    .from-box .login-register {
    font-size: 14.5px;
    font-weight: 500;
    text-align: center;
    margin-top: 25px;


    }
    .login-register p a {
    color: #e4e4e4;
    font-weight: 600;
    text-decoration: none;

    }
    .login-register p a:hover{
    text-decoration: underline;
    }

    .container form  .error-msg{
        margin: 10px 0;
        display: block;
        background: crimson;
        color: #ffffff;
        border-radius: 5px;
        font-size: 20px;
        padding: 10px;
    }







</style>


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="about.html" class="nav-item nav-link">About Us</a>
                    <a href="product.html" class="nav-item nav-link">Products</a>
                    <a href="blog.html" class="nav-item nav-link">Blog</a>
                    <a href="contactus.html" class="nav-item nav-link">Contact Us</a>
                    <a href="login.php" class="nav-item nav-link">Log in
                    </a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->




      
    <div class="background">

    </div>

    <div class="container">
      
        <div class="log-box">
                <div class="from-box login">
                        <form action="" method ="post">
                                <h2>Registr</h2>
    <?php
    
    if (isset($error) ){
        foreach($error as $error){
       echo '<span class="error-msg">'.$error.'</span>';     
        };
    };
    
    ?>
                                <div class="input-box">
                                        <span class="icon"><i class='bx bx-envelope'></i></span>
                                        <input type="email" name="email" required>
                                        <label>email</label>
                                </div>

                                <div class="input-box">
                                        <span class="icon"><i class='bx bx-envelope'></i></span>
                                        <input type="text" name="name" required>
                                        <label>name</label>
                                </div>

                                <div class="input-box">
                                        <span class="icon"><i class='bx bx-lock-alt' ></i></span>
                                        <input type="password" name="password" required>
                                        <label>password</label>
                                </div>

                                <div class="input-box">
                                        <span class="icon"><i class='bx bx-lock-alt' ></i></span>
                                        <input type="password"  name="cpassword"required>
                                        <label>conform password</label>
                                </div>
                                <div class="remember">
                                        <label><input type="checkbox">Remember me</label>
                                        <a href="">Forgot password</a>
                                </div>
                                <button type="submit" name="submit" class="btn">Log in</button>

                                <div class="login-register">
                                        <P> have an account?<a href="login.php" class="register-link">Sign in</a></P>

                                </div>
                        </form>
                </div>

        </div>

    </div>














    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>