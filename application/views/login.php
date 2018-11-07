<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>
<!--Title of page-->
<h1>Scout Shop Crewe</h1>
<h2>Please Login to access the site</h2>
</div>
<div class="jumbotron">
    <!--Login Form-->
    <div id="login">
        <form action="" class="login" role="form" name="login" method="post">
            <div class="form-group">
                <label>Username or Email</label>
                <input type="text" name="username1" class="form-control" placeholder="Username"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password1" class="form-control" placeholder="Password"/>
            </div>
            <input type="hidden" name="loginForm" value="true"/>
            <br><button id="loginButton" class="btn btn-primary" type="submit">Login</button>
            <input type="reset" value="Reset" class="btn btn-danger"/>
        </form>
        <!--End of form and error boxes-->
        <div id="well" style="display:none;"><p class="bg-success">Welcome, Logging you in now</p></div>
        <div id="error" style="display:none"><p class="bg-danger">Sorry username or password is wrong, Please try again</p></div>
        <div id="fullerror" style="display:none"><p class="bg-danger">Sorry there has been an error</p></div>

    </div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>

