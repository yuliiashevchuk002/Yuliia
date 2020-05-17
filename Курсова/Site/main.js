$(function() {

$(".sub-menu-1 a").on('click', function(){
 $("html, body").animate({
 	scrollTop: $($.attr(this, 'href')).offset().scrollTop
 }, 500);
 });

});
$(window).on("scroll", function(){
	if($(window).scrollTop()){
	$('menu-bar').addClass('black');
}
		else{
			$('menu-bar').removeClass('black');
		
}
});
$documen