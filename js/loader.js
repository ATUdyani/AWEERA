/*
$(document).ready(function(){
	$("#content").load("profile.php");
});
*/



$("li a").filter(".my-sidebar-menu-item").click(function(){
	var page = $(this).attr('href');
	$("#content").load(page);

	// to disable the default functionality of href in html, which ignores the href and  let jquery to do its thing
	return false;
});

$("ul li ul li a").filter(".my-sidebar-submenu-item").click(function(){
	var page = $(this).attr('href');
	$("#content").load(page);

	// to disable the default functionality of href in html, which ignores the href and  let jquery to do its thing
	return false;
});


$("a").filter(".add-link").click(function(){
    var page = $(this).attr('href');
    $("#content").load(page);

    // to disable the default functionality of href in html, which ignores the href and  let jquery to do its thing
    return false;
});

$("ul li a").filter(".add-link").click(function(){
    var page = $(this).attr('href');
    $("#my-tab-content").load(page);

    // to disable the default functionality of href in html, which ignores the href and  let jquery to do its thing
    return false;
});


// load modal to select a customer before making an appointment by receptionist
function loadSelectCustomerModal(){
    $('#msg_Modal').modal('show');
}