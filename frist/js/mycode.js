$(document).ready(function(){
	var w = $(window).width();
	if(w>550){ $(".left_dh").show();}
	$(document).scroll(function(){
		var w = $(document).width();
		if(w>550){ $(".left_dh").show();}
		if(w<550){ $(".left_dh").hide();}
	});
	$(document).resize(function(){
		var w = $(document).width();
		if(w>550){ $(".left_dh").show();}
		if(w<550){ $(".left_dh").hide();}
	});
	$(".mobdh").click(function(){
		$(window).scrollTop(0);
		$(".left_dh").toggle();
		$(".right_zw").toggleClass("mohu");
	});
	$(".right_zw").click(function(){
		var w = $(document).width();
		if(w<551){
			$(".left_dh").hide();
			$(".right_zw").removeClass("mohu");
		}
	});
	
	//search
	$(".se_dh").click(function(){
		var w = $(document).width();
		if(w<551){
			$(".left_dh").hide();
			$(".right_zw").removeClass("mohu");
		}
		$(".win_a").show();
	});
	$(".box_a .icon-remove-sign").click(function(){
		$(".win_a").hide();
	});
});