<div class="logincard">
  	<div class="pmd-card card-default pmd-z-depth">
		<div class="login-card">
		<?php ob_start();?>
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
			<?php wp_nonce_field('theme_login_form'); ?>
				<div class="pmd-card-title card-header-border text-center">
					<div class="loginlogo">
						<a href="javascript:void(0);"><img src="<?= get_template_directory_uri() ?>/themes/images/logo-icon.png" alt="Logo"></a>
					</div>
					<h3>Sign In <span>with <strong>PROPELLER</strong></span></h3>
					<?php
						if(isset($_SESSION['error'])){							
							echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
							unset($_SESSION['error']);
						}
					?>
				</div>
				<div class="pmd-card-body">
					
                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="inputError1" class="control-label pmd-input-group-label">Username / Em@il</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                    </div>
                    
                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="inputError1" class="control-label pmd-input-group-label">Password</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                </div>
				<div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
					<div class="form-group clearfix">
						<div class="checkbox pull-left">
							<label class="pmd-checkbox checkbox-pmd-ripple-effect">
								<input type="checkbox" checked="checked" name="remember" >
								<span class="pmd-checkbox"> Remember me</span>
							</label>
						</div>
						<span class="pull-right forgot-password">
							<a href="javascript:void(0);">Forgot password?</a>
						</span>
					</div>
					<button  type="submit" class="btn pmd-ripple-effect btn-primary btn-block" name="theme_login_button">Login</button>
                    <?php do_action ( 'login_form' ) ?>
					<p class="redirection-link">
					<?php if ( get_option( 'users_can_register' ) ) { ?>
					Don't have an account? <a href="javascript:void(0);" class="login-register">Sign Up</a>.
					<?php } ?>
					</p>
                    <?php do_action ( 'login_footer' ) ?>
				</div>
				
			</form>
		</div>
		<?php if ( get_option( 'users_can_register' ) ) { ?>
		<div class="register-card">
			<div class="pmd-card-title card-header-border text-center">
				<div class="loginlogo">
					<a href="javascript:void(0);"><img src="<?= get_template_directory_uri() ?>/themes/images/logo-icon.png" alt="Logo"></a>
				</div>
				<h3>Sign Up <span>with <strong>PROPELLER</strong></span></h3>
			</div>
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
			<?php wp_nonce_field('theme_register_form'); ?>
			  <div class="pmd-card-body">
              
              	<div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="inputError1" class="control-label pmd-input-group-label">Username</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                    </div>
                    
                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="inputError1" class="control-label pmd-input-group-label">Email address</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">email</i></div>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                    
                    <!--<div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="inputError1" class="control-label pmd-input-group-label">Password</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                            <input type="text" class="form-control" id="exampleInputAmount">
                        </div>
                    </div>-->
              </div>
			  
			  <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
				<button type="submit" class="btn pmd-ripple-effect btn-primary btn-block" name="theme_signup_button">Sign Up</button>
			  	<p class="redirection-link">Already have an account? <a href="javascript:void(0);" class="register-login">Sign In</a>. </p>
			  </div>
			</form>
		</div>
		<?php } ?>
		<div class="forgot-password-card">
			<form>	
			  <div class="pmd-card-title card-header-border text-center">
				<div class="loginlogo">
					<a href="javascript:void(0);"><img src="<?= get_template_directory_uri() ?>/themes/images/logo-icon.png" alt="Logo"></a>
				</div>
				<h3>Forgot password?<br><span>Submit your email address and we'll send you a link to reset your password.</span></h3>
			</div>
			  <div class="pmd-card-body">
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="inputError1" class="control-label pmd-input-group-label">Email address</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">email</i></div>
                            <input type="text" class="form-control" id="exampleInputAmount">
                        </div>
                    </div>
				</div>
			  <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
			  	<a href="index.html" type="button" class="btn pmd-ripple-effect btn-primary btn-block">Submit</a>
			  	<p class="redirection-link">Already registered? <a href="javascript:void(0);" class="register-login">Sign In</a></p>
			  </div>
			</form>
		</div>
	</div>
</div>