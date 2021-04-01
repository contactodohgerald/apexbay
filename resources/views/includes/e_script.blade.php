        <script src="{{asset('front-end/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('front-end/assets/js/popper.min.js')}}"></script>
		<script src="{{asset('front-end/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('front-end/assets/js/select2.min.js')}}"></script>
		<script src="{{asset('front-end/assets/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('front-end/assets/js/ion.rangeSlider.min.js')}}"></script>
		<script src="{{asset('front-end/assets/js/counterup.min.js')}}"></script>
		<script src="{{asset('front-end/assets/js/custom.js')}}"></script>
		
		<script src="{{asset('dropzone/dist/dropzone.js')}}"></script>

		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

		@include('sweetalert::alert')
		
		<script>
			function openRightMenu() {
				document.getElementById("rightMenu").style.display = "block";
			}
			function closeRightMenu() {
				document.getElementById("rightMenu").style.display = "none";
			}

			// In your Javascript (external .js resource or <script> tag)
			$(document).ready(function() {
				$('.states').select2({
					placeholder: 'Select an option'
				});

				$('.categories').select2({
					placeholder: 'Select an option'
				});
			});
		</script>
		
	</body>
</html>