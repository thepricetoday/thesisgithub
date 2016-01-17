         <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                        <p class="error"><?php echo @$err; ?></p>
                            <fieldset>
                                <div class="form-group">
                             <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
                                </div>
                                <div class="form-group">
                                   <input type="password" name="password" class="form-control" placeholder="Password" />
                                </div>
   
                                <!-- Change this to a button or input when using this as a form -->
                               <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-fw"></i>Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>