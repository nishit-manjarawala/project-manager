$=jQuery;
$(document).ready(function() {
	var sPath=window.location.pathname;
	var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
	$(".pmd-sidebar-nav").each(function(){
		$(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
		$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
		$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
		$(this).find("a[href='"+sPage+"']").addClass("active");
	});
	$(".auto-update-year").html(new Date().getFullYear());
	
	/*Login Page*/
	$('.app-list-icon li a').addClass("active");
	$(".login-for").click(function(){
		$('.login-card').hide()
		$('.forgot-password-card').show();
	});
	$(".signin").click(function(){
		$('.login-card').show()
		$('.forgot-password-card').hide();
	});
	
	$(".login-register").click(function(){
		$('.login-card').hide()
		$('.forgot-password-card').hide();
		$('.register-card').show();
	});
	
	$(".register-login").click(function(){
		$('.register-card').hide()
		$('.forgot-password-card').hide();
		$('.login-card').show();
	});
	$(".forgot-password").click(function(){
		$('.login-card').hide()
		$('.register-card').hide()
		$('.forgot-password-card').show();
	});
	/*end Login Page*/
});