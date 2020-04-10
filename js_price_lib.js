//main Functions
var JsPriceArr={};
(function ($){
	$.fn.JsPrice =function (options){

		// This is the easiest way to have default options.
        var priceElement=$(this);
		var totcount=0.00;
		var tot=0.00;

        var settings = $.extend({
            floatDigit: 2,
            totalElement:$(".jsprice_tot"),

        }, options );

        $(priceElement).each(function(k,vv){

        	if(
        		$(this).prop('type')=='text' || $(this).prop('type')=='number'
        		|| $(this).prop('type')=='select-one'
        		|| ($(this).prop('type')=='checkbox' && $(this).prop('checked')==true)
        		|| ($(this).prop('type')=='radio' && $(this).prop('checked')==true)
        	)
        	{
        		var cval=parseFloat($(this).val()) || 0;
	        	var cvalp=cval.toFixed(settings.floatDigit);

                if($(this).prop('type')!='select-one'){
    	        	$(this).val(cvalp)
                }
	        	
	        	totcount=parseFloat(totcount) + parseFloat(cvalp);
                if(
                    settings.totalElement.prop('type')=='text' ||
                    settings.totalElement.prop('type')=='number'

                    )
                {
                    settings.totalElement.val(totcount.toFixed(settings.floatDigit));
                }else
                {
                    settings.totalElement.html(totcount.toFixed(settings.floatDigit));

                }
        	}
        	
        }
        );        


	}
}( jQuery ));


