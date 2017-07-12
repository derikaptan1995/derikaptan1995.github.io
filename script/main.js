$(document).ready(function () {
    /* form */
    $("form").submit(function() {
        var error = $(this).find('input').hasClass('empty_field');
        if( !error ) {
            var th = $(this);
            $.ajax({
                type: "POST",
                url: "mail.php",
                data: th.serialize(),
            }).done(function() {
                $('.modal-thanks').fadeIn();

                setTimeout(function() {
                    th.trigger("reset");
                }, 1000);
                setTimeout(function() {
                    $('.modal-thanks').fadeOut();
                }, 3000);
            });
            return false;
        }
	});
    try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};
});