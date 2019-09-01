	<footer class="mt-4">
	</footer>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?= base_url();?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- dataTables core Javascript-->
  <script src="<?= base_url();?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
    		$('#table').DataTable();
  		});
	</script>
  </body>
</html>