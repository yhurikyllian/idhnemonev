<div class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<!-- Logo -->
				<div class="logo">

					<h1><a href="index" style=" font-size: 75% "><img src="<?php echo base_url()."/assets/"?>images/LOGO.png"  weight ="40" height="35" id="Image1" alt="">
						Sistem Informasi Arsip Persuratan - Surat Masuk dan Surat Keluar (SIAP-SMSK)
					</a>
				</h1>
			</div>
		</div>
		<!-- <div class="col-md-5">
			<div class="row">
				<div class="col-lg-12">
					<div class="input-group form">

					</div>
				</div>
			</div>
		</div> -->
		<div class="col-md-2">
			<div class="navbar navbar-inverse" role="banner">
				<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<?php 

							if($this->session->userdata('isLogin')==FALSE)	{
								$this->load->view('index_head_login');
							}
							else {
								$this->load->model('m_login');
								$user = $this->session->userdata('username');

								$data = array (
									'level' => $this->session->userdata('level'),
									'user' => $this->m_login->userData($user),
									'data4' => $this->m_upload->show('surat')
									);

				//$data['level'] = $this->session->userdata('level');
				//$data['user'] = $this->m_login->userData($user);

								$this->load->view('index_head_user', $data);
							}
							?>

	         					<!-- <ul class="dropdown-menu animated fadeInUp">
	         						<li><a href="home">Dashboard</a></li>
	         						<li><a href="login/logout">Logout</a></li>
	         					</ul> -->
	         				</li>
	         			</ul>
	         		</nav>
	         	</div>
	         </div>
	     </div>
	 </div>
	</div>