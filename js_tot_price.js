//main Functions
function mul(a,b){return a*b;}
function add(a,b){return a+b;}
function sub(a,b){return a-b;}
function div(a,b){return a/b;}

function callculate_this(a,b,callback){
	var bb=parseFloat(b) || 0;
	var aa=parseFloat(a) || 0;
	return callback(aa,bb).toFixed(2);
}

function converCurrency(a){
	var aa=parseFloat(a) || 0;
	return aa.toFixed(2);
}

function converCurrencyAndTotal(a){
	var aa=converCurrency(a);
	totalme();
	return aa;
}


function totalme(){
	var totsum= 0.00;
	var totIdArr=['oil','gas','electricity'];
	var totIdCheckBoxArr=['via_post','via_dhl'];
	
	for(var i=0;i<totIdArr.length;i++){
		var mytot=converCurrency(document.getElementById(totIdArr[i]).value);
		totsum=callculate_this(totsum,mytot,add);
	}
	for(var j=0;j<totIdCheckBoxArr.length;j++){
		if(document.getElementById(totIdCheckBoxArr[j]).checked){
			var mytot=converCurrency(document.getElementById(totIdCheckBoxArr[j]).value);
			totsum=callculate_this(totsum,mytot,add);
		}
	}
	
	
	document.getElementById('tot').innerHTML="Total=$"+ totsum;
	return true;
}
