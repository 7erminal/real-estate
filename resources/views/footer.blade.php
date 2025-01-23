<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="row"><div class="col">Urban Leaf Properties</div></div>
				<div class="row"><div class="col"><img src="/images/UrbanLeaf.jpg" height="50px"></div></div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12"></div>
			<div class="col-lg-3 col-md-3 col-sm-12"></div>
			<div class="col-lg-3 col-md-3 col-sm-12"></div>
		</div>
		<div class="row" style="padding-top: 30px;">
			<div class="col" style="justify-content: center; display: flex; align-items: center; flex-direction: row">
				Copyright
			</div>
		</div>
	</div>
</footer>
<script src="/assets/jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="/assets/assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

	<script src="/assets/bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="/assets/assets/js/gsdk-checkbox.js"></script>
	<script src="/assets/assets/js/gsdk-radio.js"></script>
	<script src="/assets/assets/js/gsdk-bootstrapswitch.js"></script>
	<script src="/assets/assets/js/get-shit-done.js"></script>
    <script src="/assets/assets/js/custom.js"></script>

<script type="text/javascript">
         
    $('.btn-tooltip').tooltip();
    $('.label-tooltip').tooltip();
    $('.pick-class-label').click(function(){
        var new_class = $(this).attr('new-class');  
        var old_class = $('#display-buttons').attr('data-class');
        var display_div = $('#display-buttons');
        if(display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
        }
    });
    $( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
	});
	$( "#slider-default" ).slider({
			value: 70,
			orientation: "horizontal",
			range: "min",
			animate: true
	});
	$('.carousel').carousel({
      interval: 4000
    });
</script>
</html>