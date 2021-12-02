</main>
</body>
<script type="text/javascript">
				//<![CDATA[
	$(document).ready(function()
	{
					$("#tagihan").on('keypress',function(e){
						$('#tagihan').autocomplete({
							serviceUrl: 'cari/cariauto/',
							minChars:2,
							onSelect: function (s) {
				//				$('#harga').val(s.harga);
							}
						});
					});
			$('.dttable').DataTable();
			
	$(".xpmodal").on('click',function(e){
		e.preventDefault();
		$("#divpopup").load($(this).attr('href'));
	}); 
	$('.uang').autoNumeric('init');
			$('.xdttable').DataTable();
			$('.tgl').datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				//startView: 2,
				todayBtn: true,
				todayHighlight: true,
				clearBtn: true,
				language: 'id',
			});
});
				//]]>
			</script>
</html>
