$(document).ready(function() {
	// hide first form in modal
    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
     });
});

// $.growl({ title: "Growl", message: "The kitten is awake!" });
// $.growl.error({ message: "The kitten is attacking!" });
// $.growl.notice({ message: "The kitten is cute!" });
// $.growl.warning({ message: "The kitten is ugly!" });