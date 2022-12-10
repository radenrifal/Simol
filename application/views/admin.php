<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Admin | Pusat Inovasi LIPI | Monitoring Inatek</title>
        <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-black">
    	<?PHP
			if(!empty($status)){
				if($status == "error"){
		?>
    	<div class="box box-danger gagal"></br>
        	<div class="box-body">
            	<div class="alert alert-danger alert-dismissable">
                	<i class="fa fa-ban"></i>
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       	<b>Anda gagal masuk, Silahkan coba kembali</b>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
        <?PHP
				}
			}
		?>
        
        <div class="form-box" id="login-box">
            <div class="header"><b>Administrator</b><br />Sistem informasi <i>Monitoring</i> Laporan Bidang Inatek</div>
            <div class="brand"></div>
            <form action="<?php echo base_url();?>admin/login" method="post">
                <div class="body bg-gray">
                    <center>
                        <span>
                            <img src="<?php echo base_url();?>assets/images/logo-lipi1.png" />
                        </span>
                        <span>
                            <img src="<?php echo base_url();?>assets/images/Lampu Pusinov1.png" />
                        </span>
                    </center>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Nama Pengguna"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Kata Sandi"/>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>  
                    <p><a href="<?php echo site_url(); ?>admin">Kembalikan Seperti Semula</a></p>
                </div>
            </form>
			<!--
            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
            -->
        </div>


        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url();?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $('.gagal').fadeOut(5000);
          });
        </script>        

    </body>
</html>