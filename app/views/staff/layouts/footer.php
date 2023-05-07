                </div>
			</main>
            <?php include_once 'components/footer.php' ?>
		</div>
	</div>

	 <script src="<?= asset('js/app.js') ?>"></script>
	 <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	 <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script>
		// DataTables with Column Search by Text Inputs
		document.addEventListener("DOMContentLoaded", function() {
			// DataTables
			var table = $('#datatables-column-search-text-inputs').DataTable({
				"responsive": true,
				"scrollX": true,
				"processing": true,
				"language": {
					url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
				},
				"columnDefs": [
				{
					searchable: false,
					orderable: false,
					targets: 0,
				},
				],
				"order": [[1, 'asc']],
			});

			table.on('order.dt search.dt', function () {
				let i = 1;
		
				table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
					this.data(i++);
				});
			}).draw();
		});
	</script>
	<?php if (isset($_SESSION['custom-js'])) { ?>
	    <script src="<?= route($_SESSION['custom-js']) ?>"></script>
	<?php } ?>
	<script>
		$(document).ready(function () {
			$("select").each(function() {
				$(this)
					.wrap("<div class=\"position-relative\"></div>")
					.select2({
						dropdownParent: $(this).parent(),
						theme: 'bootstrap4',
						allowClear: true,
						placeholder: "Silahkan pilih"
				});
			})
		})
	</script>

	<script>
		function checkNotifications() {
			$.ajax({
				url: "<?= routeDivision($_SESSION['division'], 'checkNotifications') ?>",
				dataType: 'json',
				success: function(data) {
					if (data.count > 0) {
						$('#notification_counter').text(data.count);
						$('#counter').text(data.count);
					} else {
						$('#notification_counter').remove();
						$('#counter').remove();
					}
				}
			
			})
		}

		checkNotifications();
		setInterval(checkNotifications, 30000);

		$('#messagesDropdown').on('hide.bs.dropdown', function() {
			$.ajax({
				url: "<?= routeDivision($_SESSION['division'], 'markNotifications') ?>",
				type: "POST",
				dataType: 'json',
				data: {is_read: true},
				success: function (data) {
					if (data.success) {
						$('#notification').remove();
						checkNotifications();
					}
				}
			})
		});
	</script>

	

</body>

</html>