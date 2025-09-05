
<div class="modal fade campaigns_modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">

</div>
<div class="filtering-result d-flex justify-content-between align-items-center mb-2">
	<span>Showing {{ $careers->firstItem() }} - {{ $careers->lastItem() }} of {{$careers->total()}} jobs</span>
	<select id="sortby" >
        <option>Sort by</option>
        <option>ASC</option>
        <option>DSC</option>
        <option>1</option>
    </select>
</div><div class="row" >
@forelse($careers as $career)


	<div class="col-lg-4 col-md-6 mb-4">
		<div class="career-box">
			<h3>	{!! $langg->rtl == 1 ? $career->name : $career->name_ar !!}</h3>
			@if($career->job_type)<p class='parg-icon'><i class="fas fa-calendar"></i> {{$career->job_type}}</p> @endif
			@if($career->job_location)<p class='parg-icon'><i class="fas fa-map-marker-alt"></i> {{$career->job_location}}</p> @endif
			@if($career->job_salary)<p class='parg-icon'><i class="fas fa-dollar-sign"></i> {{$career->job_salary}}</p>@endif
			@if($career->job_date)<p class='parg-icon'><i class="fas fa-clock"></i> {{$career->job_date}}</p>@endif
			<div class="show-career-details">Show All Details...</div>
			<div class="hidden-career-info">
				{!! $langg->rtl == 1 ? $career->details : $career->details_ar !!}
				{{--<h6>ِJob Summary</h6>
				<p class="details">Coordinate the daily stock transfer in /out between the warehouses and stores and Opt...</p>
				<h6>Responsibilities</h6>
				<p class="details">Studying the turnover rates of the items and classification of spare parts based...</p>
				<h6>Jop Requirement</h6>
				<p class="details">Experience: at least 2 year in Automotive industry. - males only...</p>
				<h6>Jop Benefits</h6>
				<p class="details">Social Insurance - one days off “Frida...</p>--}}
				<div class="hide-career-details">See Less</div>
			</div>
			<button  data-href="{{action('Front\FrontendController@apply_job', [$career->id])}}" class="alert more w-100 edit_campaigns_button" data-toggle="modal"  >Apply Now</button>
		</div>
	</div>


@empty
	<div class="col-lg-12">
		<div class="page-center">
			<h4 class="text-center">No Career Found.</h4>
		</div>
	</div>
@endforelse
</div>
@if (count($careers) > 0)
		<div class="col-lg-12">
			<div class="page-center mt-5">
				{!! $careers->appends(['search' => request()->input('search')])->links() !!}
			</div>
		</div>

		@endif
@if(isset($ajax_check))


<script type="text/javascript">


// Tooltip Section


    $('[data-toggle="tooltip"]').tooltip({
      });
      $('[data-toggle="tooltip"]').on('click',function(){
          $(this).tooltip('hide');
      });




      $('[rel-toggle="tooltip"]').tooltip();

      $('[rel-toggle="tooltip"]').on('click',function(){
          $(this).tooltip('hide');
      });


// Tooltip Section Ends

</script>

@endif
<script src="assets/js/main.js"></script>


<script>

	$(document).on('click', 'button.edit_campaigns_button', function() {
		$('div #exampleModal').load($(this).data('href'), function() {
			$(this).modal('show');

			$('form#campaigns_edit_form').submit(function(e) {
				e.preventDefault();
				$(this)
						.find('button[type="submit"]')
						.attr('disabled', true);
				var data = $(this).serialize();

				$.ajax({
					method: 'POST',
					url: $(this).attr('action'),
					dataType: 'json',
					data: data,
					success: function(result) {
						if (result.success == true) {
							$('div.campaigns_modal').modal('hide');
							toastr.success(result.msg);
							// window.location.reload();

						} else {
							toastr.error(result.msg);
						}
					},
				});
			});
		});
	});

</script>