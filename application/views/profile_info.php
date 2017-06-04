			<div class="profile clearfix">
				<div class="profile_pic">
					<img src="<?php echo base_url()."".$this->session->userdata('userphoto'); ?>" alt="..." class="img-circle profile_img">
				</div>
				<div class="profile_info">
					<span>Welcome,</span>
					<h2><?php echo $this->session->userdata('username');  ?></h2>
				</div>
			</div>