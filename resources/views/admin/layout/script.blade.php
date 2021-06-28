 <script src="{{static_asset('admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{static_asset('admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{static_asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{static_asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{static_asset('admin/assets/js/app.js')}}"></script>
	<script>
		$(function()
		{
			let att = $('.{{$active}} a').attr('class');
			if(att == 'dropdown-toggle')
			{
				$('.{{$active}} a').attr('data-active', 'true');
				$('.{{$active}} a').attr('aria-expanded', 'true');
				$('.{{$active}} ul').addClass('show');
			}
			else
			{
				$('.{{$active}} a').attr('data-active', 'true');
				$('.{{$active}} a').attr('aria-expanded', 'true');
			}
			
			
		});
	</script>
    <script>
        $(function()
		{
            App.init();
        });
    </script>
    <script src="{{static_asset('admin/assets/js/custom.js')}}"></script>
	
    <!-- END GLOBAL MANDATORY SCRIPTS -->
	 <script src="{{static_asset('admin/plugins/table/datatable/datatables.js')}}"></script>
	 <script>
		$(function()
		{
			$('table').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
		$('select').select2();
		@if(Session::has('msg'))
			$.notify("{{Session::get('msg')}}", "info");
		@endif
		});
	 </script>
	  <script src="{{static_asset('admin/plugins/select2/select2.min.js')}}"></script>
	  <script src="{{static_asset('notify.js')}}"></script>
	  

   