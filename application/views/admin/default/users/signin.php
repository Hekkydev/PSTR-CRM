<!DOCTYPE html>
<html class="bg-purple">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $page_title?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo $base_assets_url;?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo $base_assets_url;?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo $base_assets_url;?>css/AdminLTE.css" rel="stylesheet" type="text/css" />


    </head>
    <body class="bg-purple">

        <div class="form-box" id="login-box">
            <div class="header"><img src="<?php echo base_url().'assets/themes/pasteurtrans/images/logo-min-new.png'?>" alt="" style="width:200px;"></div>
            <?php echo form_open("users/signin");?>
                <div class="body bg-gray">
                    <?php echo message_box(validation_errors(),'danger'); ?>
                    <?php echo $this->session->flashdata('message');?>
                    <div class="form-group">
                        <input type="text" name="identity" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember" value="1" /> Remember me
                    </div>
                </div>
                <div class="footer">
                    <button type="submit" class="btn btn-primary text-white btn-block">Login</button>

                    <p style="text-align:center;"><a href="<?php echo site_url('forgot_password')?>">I forgot my password</a></p>

                    <!--<a href="<?php echo site_url('signup')?>" class="text-center">Create new account</a>-->
                </div>
            <?php echo form_close();?>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo $base_assets_url;?>js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>
