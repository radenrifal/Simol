<div class="container">
                <?PHP
					if(!empty($status)){
						if($status == "error"){
				?>
                		<div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Masuk Gagal
                                </div>
                            </div>
                       	</div>
                <?PHP
						}
					}
				?>

		<div class="row">
		<div class="col-md-8 pull-right">	
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<center><h2 class="panel-title"><b>Selamat Datang</b></h2></center>
				</div>
				<div class="panel-body">
					<form method="post" id="form_login" action="<?php echo base_url()?>index.php/login/sign_in">
						<div class="form-group">
							<label for="username">Nomor Induk Pegawai (NIP)</label>
							<input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai"/>
							
						</div>
					</form>
				</div>
				<div class="panel-footer">
					<button type="submit" form="form_login" class="btn btn-block btn-primary">
						<span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Masuk
					</button>
				</div>
			</div>
		</div><!--md4-->
		</div><!--md8-->
	</div>    
    </div>