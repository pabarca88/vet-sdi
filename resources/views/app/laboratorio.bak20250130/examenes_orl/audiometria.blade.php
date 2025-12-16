<?php
	$cod_con =$_GET["cod_con"];
	$editable =$_GET["editable"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Audiometria Tonal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="codebase/fonts/font_roboto/roboto.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="scripts/Chart.min.js"></script>
	<script src="scripts/utils.js"></script>
    <style>
		canvas{
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
        .subtitOD{text-align:left; font-family: Arial, Helvetica, sans-serif; color: #FF0000;}
        .subtitOD1{text-align:left; font-family: Arial, Helvetica, sans-serif; color: #FF0000;padding-left:10px}
        .subtitOI{font-family: Arial, Helvetica, sans-serif; color: #007EFD}
        .subtitOI1{font-family: Arial, Helvetica, sans-serif; color: #007EFD;padding-left:10px}
        .tit{
            text-align: center;
            color: #666666;
            height: 23px;
        }
        .impWidh{
            width: 33px;color: #FF0000;text-align:center;margin-left:10px
        }
        .impWidhOI{
            width: 33px;color: #007EFD;text-align:center;margin-left:10px
        }
        .pad_caj1 {
            width: 80%;border: 1px solid #999999; margin-left:20px;margin-top:20px
        }
        .pad_caj {
            width: 80%;border: 2px solid #FF0000; margin-left:20px;margin-top:20px
        }
        .td_subtit {
            text-align: center;
            height: 23px;
        }
        .tab_disc1 {border: 2px solid #0066FF; width:80%;margin-left:20px;margin-top:20px}
        .txt_ptp {
            text-align: center;
            height: 26px;
        }
        .ptp {
            width: 20%;
            height: 155px;
        }
        .toned {
            width: 30%;
            height: 155px;
        }
        .disc {
            width: 25%;
        }
        .txt_obs {
            width: 412px;
        }
     
        .button {
            text-align: center;
            color: #666666;  width: 130px;
            height: 99px;padding-right:20px
        }
		.body_aud {
		   border: 1px solid #C0C0C0;width:900px
        }
        .diapa {
         border: 1px solid #666666; width:80%;margin-left:20px;margin-top:20px;margin-right:15px;
        }
         
        </style>
	
	<script>
		editable = '<?php echo($_GET["editable"])?>'
		guardar = function(idcaja) {
			if (editable=="0") {
				return;
			}
			d = idcaja.split("_");
			idcampo = d[1];
			vcod_con = d[2];
			var valor = document.getElementById('campo_'+idcampo+'_'+vcod_con).value;
			var postForm = {
				'valor':valor,
				'cod_con':vcod_con,
				'idcampo':idcampo,
				'tipo':'guardar'
			};
			$.ajax({
				type: "POST",
				url: "examenes_db.php",
				data: postForm,
				cache: false,
				success: function(result){

				}
			});
		}
	</script>
</head>
<body class="body_aud">
	<div style="width:99%;">
		<canvas id="canvas"></canvas>
	</div>
    <div id="chart2" style="width:900px;height:280px;border:1px solid #c0c0c0;padding-bottom:15px">
        <table style="width:100%">
            <tr>
                <td  class="disc">
                    <table class="pad_caj">
            <tr>
                <td class="td_subtit" colspan="6">Discriminación OD</td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="3">Monosilabos</td>
                <td class="dhx_axis_title_x" colspan="3">Disilabos</td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="2">%</td>
                <td class="dhx_axis_title_x" colspan="2">INT</td>
                <td class="dhx_axis_title_x" colspan="2">ENM</td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2111_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2111_<?php echo($cod_con);?>" type="text" value="" placeholder="0"/></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2112_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2112_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2113_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2113_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2114_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2114_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2115_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2115_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2116_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2116_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="3" style="font-size: x-small">P DE MARX</td>
                <td class="dhx_axis_title_x" colspan="3">
                    <input id="campo_2117_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2117_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
            </tr>
        </table>
                </td>
                <td  class="disc">
                    <table class="tab_disc1">
            <tr>
                <td class="td_subtit" colspan="6">Discriminación OI</td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="3">Monosilabos</td>
                <td class="dhx_axis_title_x" colspan="3">Disilabos</td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="2">%</td>
                <td class="dhx_axis_title_x" colspan="2">INT</td>
                <td class="dhx_axis_title_x" colspan="2">ENM</td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2118_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2118_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2119_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2119_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2120_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2120_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2121_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2121_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2122_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2122_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2123_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2123_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="3" style="font-size: x-small">P DE MARX</td>
                <td class="dhx_axis_title_x" colspan="3">
                    <input id="campo_2124_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2124_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
            </tr>
        </table>
                </td>
                  <td class="ptp ">
                    <table class="pad_caj1">
            <tr>
                <td class="td_subtit">&nbsp;</td>
                <td class="td_subtit" colspan="3">PTP </td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x">&nbsp;</td>
                <td class="dhx_axis_title_x" colspan="2">Aerea</td>
                <td class="dhx_axis_title_x">Osea</td>
            </tr>
           
            <tr>
                <td class="dhx_axis_title_x">
                    OD</td>
               
                <td class="dhx_axis_title_x">
                    <input id="campo_2125_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2125_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
               
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2126_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2126_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
            </tr>
            <tr>
                <td class="txt_ptp">
                    OI</td>
               
                <td class="txt_ptp">
                    <input id="campo_2127_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2127_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
               
                <td class="txt_ptp" colspan="2">
                    <input id="campo_2128_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2128_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
            </tr>
            
        </table>
                </td>
                <td class="toned">
                    <table style="border: 1px solid #666666; width:80%;margin-left:20px;margin-top:20px;margin-right:15px">
            <tr>
                <td class="td_subtit" colspan="7">Deterioro Tonal</td>
            </tr>
        
            <tr>
                <td class="dhx_axis_title_x">&nbsp;</td>
                <td class="dhx_axis_title_x" colspan="2">500</td>
                <td class="dhx_axis_title_x">1000</td>
                <td class="dhx_axis_title_x">2000</td>
                <td class="dhx_axis_title_x">3000</td>
                <td class="dhx_axis_title_x">4000</td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x">
                   OD</td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2129_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2129_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2130_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2130_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2131_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2131_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2132_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2132_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2133_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2133_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x">
                    OI</td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2134_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2134_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2135_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2135_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2136_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2136_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2137_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2137_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2138_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2138_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
            </tr>
            
        </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" rowspan="2">
                    <table class="diapa" >
           
        
            <tr>
                <td class="dhx_axis_title_x">&nbsp;</td>
                <td class="dhx_axis_title_x">125</td>
                <td class="dhx_axis_title_x">250</td>
                <td class="dhx_axis_title_x">500</td>
                <td class="dhx_axis_title_x">1000</td>
               
            </tr>
            <tr>
                <td class="dhx_axis_title_x">
                    Weber</td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2139_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2139_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2140_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2140_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2141_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2141_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2142_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2142_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
               
                    
            </tr>
            <tr>
                <td class="dhx_axis_title_x">
                    Rinne</td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2143_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2143_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2144_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2144_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2145_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2145_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2146_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2146_<?php echo($cod_con);?>" type="text" value="" placeholder="0" /></td>
                
            </tr>
            
        </table>
                    </td>
                  <td class="" colspan="2">
                      <table style="width:100%">
                          <tr>
                              <td class="dhx_axis_title_x">Observaciones</td>
                          </tr>
                          <tr>
                              <td>
                    <input id="campo_2147_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="txt_obs" name="campo_2147_<?php echo($cod_con);?>" type="text" value="" placeholder="Ingrese observaciones" /></td>
                          </tr>
                      </table>
                      </td>
            </tr>
            
            <tr>
                  <td colspan="2">
                      <table style="width:100%;margin-bottom:15px">
                          <tr>
                              <td class="dhx_axis_title_x">Examinador</td>
                          </tr>
                          <tr>
                              <td>
                    <input id="campo_2148_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="txt_obs" name="campo_2148_<?php echo($cod_con);?>" type="text" value="" /></td>
                          </tr>
                      </table>
                    
                </td>
            </tr>
        </table>
        
        
    </div>
	<input type="hidden" id="dummy" value=""/>
    <table>
    <tr>
        <td style="width:100%"><table style="width:885px;margin-left:15px;">
        <tr>
            
            <td colspan="2" class="tit">Osea</td> <td colspan="2" class="tit">Aerea</td> 

            <td class="button" rowspan="9" ><input type="button" onclick="actualiza_datos();" value="Graficar" class="button" /></td> 

        </tr>
        <tr>
            
            <td class="subtitOD1" >125<input type="text" onblur="guardar(this.id);" id="campo_2149_<?php echo($cod_con);?>" name="campo_2149_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh" /></td> 
            
            <td class="subtitOI1" >125<input type="text" onblur="guardar(this.id);" id="campo_2150_<?php echo($cod_con);?>" name="campo_2150_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI" /></td> 
            
            <td class="subtitOD1" >125<input type="text" onblur="guardar(this.id);" id="campo_2151_<?php echo($cod_con);?>" name="campo_2151_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh" /></td> 
            
            <td class="subtitOI1" >125<input type="text" onblur="guardar(this.id);" id="campo_2152_<?php echo($cod_con);?>" name="campo_2152_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI" /></td> 
        </tr>
        <tr>
            
            <td class="subtitOD1" >250<input type="text" onblur="guardar(this.id);" id="campo_2153_<?php echo($cod_con);?>" name="campo_2153_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI1" >250<input type="text" onblur="guardar(this.id);" id="campo_2154_<?php echo($cod_con);?>" name="campo_2154_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
            
            <td class="subtitOD1" >250<input type="text" onblur="guardar(this.id);" id="campo_2155_<?php echo($cod_con);?>" name="campo_2155_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI1" >250<input type="text" onblur="guardar(this.id);" id="campo_2156_<?php echo($cod_con);?>" name="campo_2157_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD1">500<input type="text" onblur="guardar(this.id);" id="campo_2157_<?php echo($cod_con);?>" name="campo_2158_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
           
            <td class="subtitOI1">500<input type="text" onblur="guardar(this.id);" id="campo_2158_<?php echo($cod_con);?>" name="campo_2159_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
            
            <td class="subtitOD1">500<input type="text" onblur="guardar(this.id);" id="campo_2159_<?php echo($cod_con);?>" name="campo_2160_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI1">500<input type="text" onblur="guardar(this.id);" id="campo_2160_<?php echo($cod_con);?>" name="campo_2161_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD" >1000<input type="text" onblur="guardar(this.id);" id="campo_2161_<?php echo($cod_con);?>" name="campo_2161_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >1000<input type="text" onblur="guardar(this.id);" id="campo_2162_<?php echo($cod_con);?>" name="campo_2162_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
            
            <td class="subtitOD" >1000<input type="text" onblur="guardar(this.id);" id="campo_2163_<?php echo($cod_con);?>" name="campo_2163_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >1000<input type="text" onblur="guardar(this.id);" id="campo_2164_<?php echo($cod_con);?>" name="campo_2164_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD" >2000<input type="text" onblur="guardar(this.id);" id="campo_2165_<?php echo($cod_con);?>" name="campo_2165_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >2000<input type="text" onblur="guardar(this.id);" id="campo_2166_<?php echo($cod_con);?>" name="campo_2166_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
            
            <td class="subtitOD" >2000<input type="text" onblur="guardar(this.id);" id="campo_2167_<?php echo($cod_con);?>" name="campo_2167_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
           
            <td class="subtitOI" >2000<input type="text" onblur="guardar(this.id);" id="campo_2168_<?php echo($cod_con);?>" name="campo_2168_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD" >3000<input type="text" onblur="guardar(this.id);" id="campo_2169_<?php echo($cod_con);?>" name="campo_2169_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >3000<input type="text" onblur="guardar(this.id);" id="campo_2170_<?php echo($cod_con);?>" name="campo_2170_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td>  
            
            <td class="subtitOD" >3000<input type="text" onblur="guardar(this.id);" id="campo_2171_<?php echo($cod_con);?>" name="campo_2171_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >3000<input type="text" onblur="guardar(this.id);" id="campo_2172_<?php echo($cod_con);?>" name="campo_2172_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD" >4000<input type="text" onblur="guardar(this.id);" id="campo_2173_<?php echo($cod_con);?>" name="campo_2173_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >4000<input type="text" onblur="guardar(this.id);" id="campo_2174_<?php echo($cod_con);?>" name="campo_2174_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td>  
            
            <td class="subtitOD" >4000<input type="text" onblur="guardar(this.id);" id="campo_2175_<?php echo($cod_con);?>" name="campo_2175_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >4000<input type="text" onblur="guardar(this.id);" id="campo_2176_<?php echo($cod_con);?>" name="campo_2176_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD" >6000<input type="text" onblur="guardar(this.id);" id="campo_2177_<?php echo($cod_con);?>" name="campo_2177_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >6000<input type="text" onblur="guardar(this.id);" id="campo_2178_<?php echo($cod_con);?>" name="campo_2178_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td>  
            
            <td class="subtitOD" >6000<input type="text" onblur="guardar(this.id);" id="campo_2179_<?php echo($cod_con);?>" name="campo_2179_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >6000<input type="text" onblur="guardar(this.id);" id="campo_2180_<?php echo($cod_con);?>" name="campo_2180_<?php echo($cod_con);?>" value="" placeholder="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            <td colspan="4" style="text-align:center">&nbsp;</td>
            <td style="text-align:center">&nbsp;</td>
        </tr>
    </table></td>
        
    </tr>
    </table>
    
   
   

    
    <script>
        actualiza_datos = function () {
            multiple_dataset[0]["oseaOD"] = document.getElementById("campo_2149_<?php echo($cod_con);?>").value;
            multiple_dataset[1]["oseaOD"] = document.getElementById("campo_2153_<?php echo($cod_con);?>").value;
            multiple_dataset[2]["oseaOD"] = document.getElementById("campo_2157_<?php echo($cod_con);?>").value;
            multiple_dataset[3]["oseaOD"] = document.getElementById("campo_2161_<?php echo($cod_con);?>").value;
            multiple_dataset[4]["oseaOD"] = document.getElementById("campo_2165_<?php echo($cod_con);?>").value;
            multiple_dataset[5]["oseaOD"] = document.getElementById("campo_2169_<?php echo($cod_con);?>").value;
            multiple_dataset[6]["oseaOD"] = document.getElementById("campo_2173_<?php echo($cod_con);?>").value;
            multiple_dataset[7]["oseaOD"] = document.getElementById("campo_2177_<?php echo($cod_con);?>").value;
            multiple_dataset[0]["oseaOI"] = document.getElementById("campo_2150_<?php echo($cod_con);?>").value;
            multiple_dataset[1]["oseaOI"] = document.getElementById("campo_2154_<?php echo($cod_con);?>").value;
            multiple_dataset[2]["oseaOI"] = document.getElementById("campo_2158_<?php echo($cod_con);?>").value;
            multiple_dataset[3]["oseaOI"] = document.getElementById("campo_2162_<?php echo($cod_con);?>").value;
            multiple_dataset[4]["oseaOI"] = document.getElementById("campo_2166_<?php echo($cod_con);?>").value;
            multiple_dataset[5]["oseaOI"] = document.getElementById("campo_2170_<?php echo($cod_con);?>").value;
            multiple_dataset[6]["oseaOI"] = document.getElementById("campo_2174_<?php echo($cod_con);?>").value;
            multiple_dataset[7]["oseaOI"] = document.getElementById("campo_2178_<?php echo($cod_con);?>").value;
			
            multiple_dataset[0]["aereaOD"] = document.getElementById("campo_2151_<?php echo($cod_con);?>").value;
            multiple_dataset[1]["aereaOD"] = document.getElementById("campo_2155_<?php echo($cod_con);?>").value;
            multiple_dataset[2]["aereaOD"] = document.getElementById("campo_2159_<?php echo($cod_con);?>").value;
            multiple_dataset[3]["aereaOD"] = document.getElementById("campo_2163_<?php echo($cod_con);?>").value;
            multiple_dataset[4]["aereaOD"] = document.getElementById("campo_2167_<?php echo($cod_con);?>").value;
            multiple_dataset[5]["aereaOD"] = document.getElementById("campo_2171_<?php echo($cod_con);?>").value;
            multiple_dataset[6]["aereaOD"] = document.getElementById("campo_2175_<?php echo($cod_con);?>").value;
            multiple_dataset[7]["aereaOD"] = document.getElementById("campo_2179_<?php echo($cod_con);?>").value;
			
            multiple_dataset[0]["aereaOI"] = document.getElementById("campo_2152_<?php echo($cod_con);?>").value;
            multiple_dataset[1]["aereaOI"] = document.getElementById("campo_2156_<?php echo($cod_con);?>").value;
            multiple_dataset[2]["aereaOI"] = document.getElementById("campo_2160_<?php echo($cod_con);?>").value;
            multiple_dataset[3]["aereaOI"] = document.getElementById("campo_2164_<?php echo($cod_con);?>").value;
            multiple_dataset[4]["aereaOI"] = document.getElementById("campo_2168_<?php echo($cod_con);?>").value;
            multiple_dataset[5]["aereaOI"] = document.getElementById("campo_2172_<?php echo($cod_con);?>").value;
            multiple_dataset[6]["aereaOI"] = document.getElementById("campo_2176_<?php echo($cod_con);?>").value;
            multiple_dataset[7]["aereaOI"] = document.getElementById("campo_2180_<?php echo($cod_con);?>").value;
            doChart();
        }


        var multiple_dataset = [
            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "125" },
            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "250" },
            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "500" },
            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "1000" },
            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "2000" },
            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "3000" },
            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "4000" },
            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "6000" }
        ];
<?php
	require_once('../../scripts/conexion.php');
	$sql = "Select campodatos.idcampo, valor from campodatos 
			inner join campo on campodatos.idcampo = campo.idcampo
			WHERE idseccion = 1026 and cod_con=".$cod_con;
	$rs = $dba->prepare($sql);
	$rs->execute();
	while ($rst = $rs->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
		print("document.getElementById('campo_".$rst[0]."_".$cod_con."').value='".$rst[1]."';");
	}
	
	$sql = "select cod_emp from control where cod_con=".$cod_con;
	$rsemp = $dba->prepare($sql);
	$rsemp->execute();
	$arr_em = $rsemp->fetch();
	$cod_emp = $arr_em[0];
	
	$sql = "select rut, lastname1, lastname2, name, nro_certificado, dv_certificado, email, cod_spe2, cod_spe1  from employee where cod_emp = ".$cod_emp;
	$rsemp = $dba->prepare($sql);
	$rsemp->execute();
	$arr_emp = $rsemp->fetch();
	$nam_emp = $arr_emp[3]." ".$arr_emp[1]." ".$arr_emp[2];
	print("document.getElementById('campo_2148_".$cod_con."').value='".$nam_emp."';");
	
?>
		doChart = function() {
var config = {
			type: 'line',
			data: {
				labels: ['125', '250', '500', '1000', '2000', '3000', '4000', '6000'],
				datasets: [
					{
						label: 'Normal',
						fill: false,
						borderColor:'#9D9F9C',
						data: [
							20,
							20,
							20,
							20,
							20,
							20,
							20,
							20
						],
						pointRadius: 0,
					},
					{
						label: 'Osea OI',
						fill: false,
						borderColor: window.chartColors.blue,
						borderDash: [15, 15],
						data: [
							multiple_dataset[0]["oseaOI"],
							multiple_dataset[1]["oseaOI"],
							multiple_dataset[2]["oseaOI"],
							multiple_dataset[3]["oseaOI"],
							multiple_dataset[4]["oseaOI"],
							multiple_dataset[5]["oseaOI"],
							multiple_dataset[6]["oseaOI"],
							multiple_dataset[7]["oseaOI"]
						],
					},
					{
						label: 'Osea OD',
						fill: false,
						borderColor: window.chartColors.red,
						borderDash: [15, 15],
						data: [
							multiple_dataset[0]["oseaOD"],
							multiple_dataset[1]["oseaOD"],
							multiple_dataset[2]["oseaOD"],
							multiple_dataset[3]["oseaOD"],
							multiple_dataset[4]["oseaOD"],
							multiple_dataset[5]["oseaOD"],
							multiple_dataset[6]["oseaOD"],
							multiple_dataset[7]["oseaOD"]
						],
					},
					{
						label: 'Aerea OI',
						fill: false,
						backgroundColor: window.chartColors.blue,
						borderColor: window.chartColors.blue,
					data: [
							multiple_dataset[0]["aereaOI"],
							multiple_dataset[1]["aereaOI"],
							multiple_dataset[2]["aereaOI"],
							multiple_dataset[3]["aereaOI"],
							multiple_dataset[4]["aereaOI"],
							multiple_dataset[5]["aereaOI"],
							multiple_dataset[6]["aereaOI"],
							multiple_dataset[7]["aereaOI"]
						],
					},
					{
						label: 'Aerea OD',
						fill: false,
						backgroundColor: window.chartColors.red,
						borderColor: window.chartColors.red,
						data: [
							multiple_dataset[0]["aereaOD"],
							multiple_dataset[1]["aereaOD"],
							multiple_dataset[2]["aereaOD"],
							multiple_dataset[3]["aereaOD"],
							multiple_dataset[4]["aereaOD"],
							multiple_dataset[5]["aereaOD"],
							multiple_dataset[6]["aereaOD"],
							multiple_dataset[7]["aereaOD"]
						],
					}
				]
			},
			options: {
				responsive: true,
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Hz'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: '%'
						},
						ticks: {
							reverse: true,
							min: 0,
							max: 100
						}
					}]
				}
			}
		};
			var ctx = document.getElementById('canvas').getContext('2d');
			chart = new Chart(ctx, config);
		};
		
		actualiza_datos();
	</script>
</body>
</html>