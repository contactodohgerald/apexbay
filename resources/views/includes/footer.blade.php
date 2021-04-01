<!-- =========================== Footer Start ========================================= -->
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<footer class="dark-footer skin-dark-footer">						
			<div class="footer-bottom">
				<div class="container">
					<div class="row align-items-center">
						
						<div class="col-lg-12 col-md-12 text-center">
							<p class="mb-0">© <?php $d = date('Y'); print @$d; ?> {{env('APP_NAME')}} Online. <br>  All Rights Reserved</p>
						</div>
						
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>
<!-- =========================== Footer End ========================================= -->

<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
		<div class="modal-content" id="registermodal">
			<div class="modal-header">
				<h4>Close Window</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
			</div>
			<div class="modal-body">
				<h4 class="modal-header-title">Sign <span class="theme-cl">In</span></h4>
				
				<div class="login-form">
					<form>
					
						<div class="form-group">
							<label>User Name</label>
							<div class="input-with-gray light">
								<input type="text" class="form-control" placeholder="Username">
							</div>
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<div class="input-with-gray light">
								<input type="password" class="form-control" placeholder="*******">
							</div>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn theme-bg btn-md full-width pop-login">Login</button>
						</div>
					
					</form>
				</div>
				
				<div class="form-group text-center">
					<span>Or Signup with</span>
				</div>
				
				<div class="social_logs mb-4">
					<ul>
						<li class="fb-login"><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li class="gp-login"><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li class="ln-login"><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="mf-link"><i class="ti-user"></i>Haven't An Account?<a href="javascript:void(0)" class="theme-cl"> Sign Up</a></div>
				<div class="mf-forget"><a href="#"><i class="ti-help"></i>Forget Password</a></div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->	