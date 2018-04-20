<!DOCTYPE html>
<html>
<head>
<style>
.main{width:500px; margin:0 auto;border: 1px solid #f39a9a;padding: 10px; border-radius:10px;
position:absolute; left:35%; top:25%;
}
label{font-weight:bold}
.main [type=text]{padding:5px; text-indent:5px; color:blue; font-weight:bold;}
</style>
<script>

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




</script>
</head>
<body>


<div class="main">
<label>Oil</label>
<input class="form-control" type="text" name="oil" id="oil" onBlur="this.value=converCurrencyAndTotal(this.value);" value="" placeholder="5.00"> <br>
<br>

<label>Gas</label>
<input class="form-control" type="text" name="gas" id="gas" onBlur="this.value=converCurrencyAndTotal(this.value);" value="" placeholder="5.00">
<br>
<br>

<label>Electricity</label>
<input class="form-control" type="text" name="electricity" id="electricity" onBlur="this.value=converCurrencyAndTotal(this.value);" value="" placeholder="5.00">  <br>
<br><br>



<label>Shipping</label><br>
<input type="radio" name="via" id="via_post" value="5.00" onClick="converCurrencyAndTotal(this.value);"> POST <strong>$5.00</strong> <br>
<input type="radio" name="via" id="via_dhl" value="60.00" onClick="converCurrencyAndTotal(this.value);"> DHL <strong>$60.00</strong>

<div id="tot" style="background-color:#F00; padding:10px; font-size:24px; color:white; font-weight:bold;">$0.00</div>

</div>
</body>
</html>
