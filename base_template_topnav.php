<div id="navbar" class="navbar navbar-default          ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="<?php echo $baseURL ; ?>home" class="navbar-brand">
				<small>
					<img src="<?php echo $baseURL; ?>images/pulau.png" height="50px" style="margin-top:-25px;margin-bottom:-20px; margin-left:-20px;" alt="">
					<?php //echo $this->config->item('nama_aplikasi')." ".$this->config->item('versi'); ?>
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation" >
			<ul class="nav ace-nav" >
				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						
							<img class="nav-user-photo" width="40" height="40" src="<?php echo $baseURL; ?>images/user.jpg" alt="" />
						<span class="user-info" >
							<small>Selamat datang,</small> Kelompok 4
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="#" onclick="return rubah_password();"><i class="ace-icon fa fa-user"></i>Ubah Password</a>
						</li>
						<li class="divider"></li>
						<li><a href="<?php echo $baseURL; ?>login/login" onclick="return confirm('keluar..?');"><i class="ace-icon fa fa-power-off"></i>Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>

</script>
