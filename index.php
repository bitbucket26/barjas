<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script> -->
</head>

<body style="background: url('img/bg.png'); no-repeat center fixed; background-size: cover;">

    <div class="container">
    <!-- <img src="img/bgbg.jpg"> -->
    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
      echo '<h4 class="alert alert-danger text-center" role="alert">Ussername Atau Password yang Anda Masukkan Salah !</h4>';
		}
	}
	?>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block">
                                <!-- <div class="p-1">
                                    <img src="img/logorsud.jpg" class="col-7 rounded mx-auto d-block">
                                </div> -->
                            </div>
                            <div class="col-lg-12">
                            <div class="p-5">
                                
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hello !</h1>
                                    </div>
                                        <form action="ceklogin.php" method="POST" class="user">
                                            <div class="form-group">
                                                <!-- <label>Username</label> -->
                                                <input class="form-control form-control-user" type="text" name="username" placeholder="Username" required/>
                                            </div>

                                            <div class="form-group">
                                                <!-- <label>Password</label> -->
                                                <input class="form-control form-control-user" type="password" name="password" placeholder="Password" required/>
                                            </div>

                                            <input type="submit" class="btn btn-info btn-user btn-block" name="login" value="login">
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>