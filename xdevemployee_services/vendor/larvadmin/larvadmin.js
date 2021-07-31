function FinishLoader() {
	
	setTimeout(function(){

		$('.content-loader').removeClass('content-loader');

		$('.page-loader').remove();

	}, 200);

}

function larvNotif( option ) {

	var html = `<div class="toast" aria-live="assertive" data-autohide="true">
		<div class="toast-header">
			<svg style="width: 16px; margin-right: 8px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M439.652,347.915v-97.48c0-85.797-59.14-158.031-138.794-178.101c3.34-6.707,5.229-14.258,5.229-22.246C306.087,22.469,283.618,0,256,0c-27.618,0-50.087,22.469-50.087,50.087c0,7.988,1.889,15.539,5.229,22.246c-79.654,20.07-138.794,92.305-138.794,178.101v97.48c-19.433,6.892-33.391,25.45-33.391,47.215c0,27.618,22.469,50.087,50.087,50.087h85.158C181.957,483.275,215.686,512,256,512s74.042-28.725,81.799-66.783h85.158c27.618,0,50.087-22.469,50.087-50.087C473.043,373.365,459.085,354.807,439.652,347.915z M256,33.391c9.206,0,16.696,7.49,16.696,16.696S265.206,66.783,256,66.783c-9.206,0-16.696-7.49-16.696-16.696S246.794,33.391,256,33.391z M256,478.609c-21.766,0-40.323-14.07-47.215-33.503h94.431C296.323,464.539,277.766,478.609,256,478.609z M422.957,411.826H89.044c-9.206,0-16.696-7.49-16.696-16.696s7.49-16.696,16.696-16.696h33.392c9.22,0,16.696-7.475,16.696-16.696s-7.475-16.696-16.696-16.696h-16.697v-94.609c0-82.854,67.407-150.261,150.261-150.261s150.261,67.407,150.261,150.261v94.609h-16.71c-9.22,0-16.696,7.475-16.696,16.696s7.475,16.696,16.696,16.696h33.406c9.206,0,16.696,7.49,16.696,16.696S432.162,411.826,422.957,411.826z"/></g></g><g><g><path d="M256,133.565c-64.442,0-116.87,52.428-116.87,116.87c0,9.22,7.475,16.696,16.696,16.696s16.696-7.475,16.696-16.696c0-46.03,37.448-83.478,83.478-83.478c9.22,0,16.696-7.475,16.696-16.696S265.22,133.565,256,133.565z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
			<strong class="mr-auto">Notification</strong>
			<small part="date"> 1 mins ago</small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div part="body" class="toast-body" style="font-size: 14px; padding-top: 8px;">`+option.text+`</div>
	</div>`;

	var html = $(html);

	$('.notif-wrap').append(html);

	html.toast({
		delay: 3000
	});

	return html;

}