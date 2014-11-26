<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>

<script type="text/javascript" src="tablesort/tablesort.js"></script>
<script type="text/javascript" src="tablesort/paginate.js"></script>
<script type="text/javascript" src="tablesort/JsHttpRequest.js"></script>

<link rel="stylesheet" href="tablesort/demo.css" type=text/css rel=stylesheet>


<STYLE type=text/css>P {
	MARGIN: 0px auto 1.6em; WIDTH: 800px
}
UL.fdtablePaginater {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px auto 2em; WIDTH: auto; PADDING-TOP: 0px; LIST-STYLE-TYPE: none; HEIGHT: 2em; TEXT-ALIGN: center;
}
UL.fdtablePaginater LI {
	PADDING-RIGHT: 4px; COLOR: #666; LIST-STYLE-TYPE: none; moz-user-select: none; khtml-user-select: none; FLOAT: center; DISPLAY: inline-block
}
UL.fdtablePaginater LI A.currentPage {
	BORDER-LEFT-COLOR: #a84444! important; BORDER-BOTTOM-COLOR: #a84444! important; COLOR: #000; BORDER-TOP-COLOR: #a84444! important; BORDER-RIGHT-COLOR: #a84444! important
}
UL.fdtablePaginater LI A:active {
	BORDER-LEFT-COLOR: #222! important; BORDER-BOTTOM-COLOR: #222! important; COLOR: #222; BORDER-TOP-COLOR: #222! important; BORDER-RIGHT-COLOR: #222! important
}
UL.fdtablePaginater LI A {
	BORDER-RIGHT: #ccc 1px solid; PADDING-RIGHT: 0px; BORDER-TOP: #ccc 1px solid; DISPLAY: block; PADDING-LEFT: 0px; FONT-SIZE: 1em; PADDING-BOTTOM: 0px; MARGIN: 0px; BORDER-LEFT: #ccc 1px solid; WIDTH: 2em; COLOR: #666; PADDING-TOP: 0px; BORDER-BOTTOM: #ccc 1px solid; FONT-FAMILY: georgia, serif; TEXT-DECORATION: none; outline: none
}
UL.fdtablePaginater LI DIV {
	BORDER-RIGHT: #ccc 1px solid; PADDING-RIGHT: 0px; BORDER-TOP: #ccc 1px solid; DISPLAY: block; PADDING-LEFT: 0px; FONT-SIZE: 1em; PADDING-BOTTOM: 0px; MARGIN: 0px; BORDER-LEFT: #ccc 1px solid; WIDTH: 2em; COLOR: #666; PADDING-TOP: 0px; BORDER-BOTTOM: #ccc 1px solid; FONT-FAMILY: georgia, serif; TEXT-DECORATION: none; outline: none
}
UL.fdtablePaginater LI DIV {
	FILTER: alpha(opacity=50); opacity: .5
}
UL.fdtablePaginater LI A SPAN {
	BORDER-RIGHT: #fff 1px solid; BORDER-TOP: #fff 1px solid; DISPLAY: block; BACKGROUND: url(../media/gradient.gif) #fff repeat-x 0px -20px; BORDER-LEFT: #fff 1px solid; LINE-HEIGHT: 2em; BORDER-BOTTOM: #fff 1px solid
}
UL.fdtablePaginater LI DIV SPAN {
	BORDER-RIGHT: #fff 1px solid; BORDER-TOP: #fff 1px solid; DISPLAY: block; BACKGROUND: url(../media/gradient.gif) #fff repeat-x 0px -20px; BORDER-LEFT: #fff 1px solid; LINE-HEIGHT: 2em; BORDER-BOTTOM: #fff 1px solid
}
UL.fdtablePaginater LI A {
	CURSOR: pointer
}
UL.fdtablePaginater LI A:unknown {
	BORDER-LEFT-COLOR: #aaa; BORDER-BOTTOM-COLOR: #aaa; COLOR: #333; BORDER-TOP-COLOR: #aaa; TEXT-DECORATION: none; BORDER-RIGHT-COLOR: #aaa
}
.fdtablePaginaterWrap {
	CLEAR: both; TEXT-ALIGN: center; TEXT-DECORATION: none
}
UL.fdtablePaginater LI .next-page SPAN {
	FONT-WEIGHT: bold! important
}
UL.fdtablePaginater LI .previous-page SPAN {
	FONT-WEIGHT: bold! important
}
UL.fdtablePaginater LI .first-page SPAN {
	FONT-WEIGHT: bold! important
}
UL.fdtablePaginater LI .last-page SPAN {
	FONT-WEIGHT: bold! important
}
TD.sized1 {
	WIDTH: 16em; TEXT-ALIGN: left
}
TD.sized2 {
	WIDTH: 10em; TEXT-ALIGN: left
}
TD.sized3 {
	WIDTH: 7em; TEXT-ALIGN: left
}
TFOOT TD {
	FONT-WEIGHT: bold; TEXT-TRANSFORM: uppercase; LETTER-SPACING: 1px; TEXT-ALIGN: right
}
#visibleTotal {
	TEXT-ALIGN: center
}
 HTML UL.fdtablePaginater LI DIV SPAN {
	BACKGROUND: #eee
}
 HTML UL.fdtablePaginater LI DIV SPAN {
	BACKGROUND: #eee
}
TR.invisibleRow {
	DISPLAY: none
}
</STYLE>
<!--[if IE]>
<STYLE type=text/css>UL.fdtablePaginater {
	DISPLAY: inline-block
}
UL.fdtablePaginater {
	DISPLAY: inline
}
UL.fdtablePaginater LI {
	FLOAT: left
}
UL.fdtablePaginater {
	TEXT-ALIGN: center
}
TABLE {
	BORDER-BOTTOM: #c1dad7 1px solid
}
</STYLE>
<![endif]-->

<?php
 $curr = isset($_REQUEST ['currency_cr'])?$_REQUEST ['currency_cr']:'USD';
 $term = isset($_REQUEST ['period_cr'])?$_REQUEST ['period_cr']:'12';
 $summ = isset($_REQUEST ['summa_cr'])?$_REQUEST ['summa_cr']:'2000';
?>

<script>
    function request(summ, curr, period, use, poruch) {
        var req = new JsHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                if (req.responseJS) {
					res = '<table class="rowstyle-alt colstyle-alt no-arrow paginate-6 max-pages-3" cellSpacing=0 id=cr_table>';
					// header
					res += '<thead><tr>';
					res += req.responseJS.h;
					res += '</tr></thead>';
					// body
					res += '<tbody>';
					for (j=0; j<req.responseJS.c.length; j++) {
						value = '<a href="' + req.responseJS.c[j]["http"] + '" target="_blank">'+req.responseJS.c[j][1]+'</a>';
						res += '<tr><td>'+value+'</td>';
						for (k=2; k<=req.responseJS.k; k++)
						res += '<td>'+req.responseJS.c[j][k]+'</td>';
						res += '</tr>';
					}
					res += '</tbody> </table>';
					document.getElementById('result').innerHTML = res;
                }
				// sort table
				tablePaginater.init('cr_table');
				fdTableSort.init('cr_table');
				fdTableSort.jsWrapper('cr_table', req.responseJS.s);
            }
        }
		// Prepare request object
        req.caching = true;
        req.loader = 'script';
		//req.open('', 'http://localhost/joomla/load_calc.php', true);
        var data = { 
            s: summ,
			c: curr,
			p: period,
			u: use,
			pr: poruch
        }
		// send
        req.send(data);
    }
</script>

<form>
<br><br>
<table border="0" cellspacing="0" cellpadding="0" class="cr_form">
	<tr>
		<td> 
			<label for="currency_sel">
				Валюта кредита:
			</label>
			<br>
			<select name = "currency_cr" id="currency_sel" style = "width: 120px">   
				<option value='BYR'<?if($curr=='BYR')echo'selected'?>>BYR</option> 
				<option value='USD'<?if($curr=='USD')echo'selected'?>>USD</option>  
				<option value='EUR'<?if($curr=='EUR')echo'selected'?>>EUR</option>          
			</select> 
		</td>
		<td>
            <label for="use_sel">
				Использование:
			</label>		 
			<br>
			<select name = "use_cr" id="use_sel" style = "width: 120px">   
				<option value='1'>нал. и безнал.</option> 
				<option value='2'>наличными</option>  
				<option value='3'>безналичными</option>          
			</select> 		
		</td>
	</tr>
	<tr>
		<td>
			<label for="period_sel">
				Срок кредита:
			</label>
			<br>
			<select name = "period_cr" id="period_sel" style = "width: 120px">
				<option value='1'<?if($term=='1')echo'selected'?>>1 мес.</option>				
				<option value='2'<?if($term=='2')echo'selected'?>>2 мес.</option>				
				<option value='3'<?if($term=='3')echo'selected'?>>3 мес.</option>				
				<option value='4'<?if($term=='4')echo'selected'?>>4 мес.</option>				
				<option value='5'<?if($term=='5')echo'selected'?>>5 мес.</option>				
				<option value='6'<?if($term=='6')echo'selected'?>>6 мес.</option>				
				<option value='9'<?if($term=='9')echo'selected'?>>9 мес.</option>				
				<option value='12'<?if($term=='12')echo'selected'?>>1 год</option>			
				<option value='18'<?if($term=='18')echo'selected'?>>1,5 года</option>			
				<option value='24'<?if($term=='24')echo'selected'?>>2 года</option>
				<option value='36'<?if($term=='36')echo'selected'?>>3 года</option>
				<option value='48'<?if($term=='48')echo'selected'?>>4 года</option>
				<option value='60'<?if($term=='60')echo'selected'?>>5 лет</option>
			</select>
		</td>
		<td>
		    <br>Без поручителей
			<input type="checkbox" id="poruch_sel" name="poruch_cr"> 
		</td>
	</tr>
	<tr>	
		<td>
			<label for="period_sel">
				Сумма кредита: 
			</label>
			<br>
			<input id="sum_inp" name="summa_cr" class="inputbox" style = "width: 114px" value = "<?=$summ?>">				
		</td>
	</tr>
	<tr>	
		<td>
			<input type="button" name="Submit" class="button" value="Рассчитать" onClick="request(this.form.summa_cr.value, 
																								  this.form.currency_cr.value,
																								  this.form.period_cr.value,																								  this.form.use_cr.value,
																								  this.form.poruch_cr.checked)">
		</td>
	</tr>
	</table>
</form>

<script>
 request('<?=$summ?>', '<?=$curr?>', '<?=$term?>', 1, false);
</script>

<div id="result" style="margin-left: 70px; margin-right: 70px">
    
</div>
	
</body>
</html>

