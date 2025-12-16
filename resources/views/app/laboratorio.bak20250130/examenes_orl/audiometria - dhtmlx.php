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
    <link href="codebase/dhtmlxchart.css" rel="stylesheet" />
    <script src="codebase/dhtmlxchart.js"></script>
    <style >
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
            .chart1 {
          width:900px;height:400px;border:1px solid #c0c0c0;
        }
              .diapa {
         border: 1px solid #666666; width:80%;margin-left:20px;margin-top:20px;margin-right:15px;
        }
         
        </style>
	<script src='../../scripts/chosen/prototype.js' type='text/javascript'></script>
	<script>
		editable = '<?php echo("editable")?>'
		guardar = function(idcaja) {
			if (editable=="0") {
				return;
			}
			d = idcaja.split("_");
			idcampo = d[1];
			vcod_con = d[2];
			var valor = $('campo_'+idcampo+'_'+vcod_con).value;
			var param = 'tipo=guardar&idcampo='+idcampo+'&cod_con='+vcod_con+'&valor='+valor;
			//alert(param);
			console.log(param);
			var myAjax = new Ajax.Request(
				'examenes_db.php',
				{
					method: 'post',
					parameters: param,
					onComplete: function(pedido_datos) {
						$('dummy').focus();
						//console.log(pedido_datos.responseText);
						//alert(pedido_datos.responseText);
					}
				}
			);
		}
	</script>
</head>
<body onload="doOnLoad();" class="body_aud">
    <div id="chart1" class="chart1">
        <table style="width:100%";>
            <tr>
                <td style="width:20%" > Audiometria Tonal </td><td style="width:50%" hidden="hidden" ><label>Nombre </label><input id="txtcnom" class="" name="txtcnom" type="text" value="nombre" /></td><td style="width:30%" hidden="hidden" ><label>Edad</label><input id="txtced" class="" name="txtced" type="text" value="Edad" /></td><td style="width:10%" hidden="hidden"> <label>Fecha</label><input id="txtcfec" class="" name="txtcfec" type="text" value="fecha" /></td>
            </tr>
        </table>
        
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
                    <input id="campo_2111_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2111_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2112_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2112_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2113_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2113_<?php echo($cod_con);?>" type="text" value="0" /></td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2114_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2114_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2115_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2115_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2116_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2116_<?php echo($cod_con);?>" type="text" value="0" /></td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="3" style="font-size: x-small">P DE MARX</td>
                <td class="dhx_axis_title_x" colspan="3">
                    <input id="campo_2117_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2117_<?php echo($cod_con);?>" type="text" value="0" /></td>
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
                    <input id="campo_2118_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2118_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2119_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2119_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2120_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2120_<?php echo($cod_con);?>" type="text" value="0" /></td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2121_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2121_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2122_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2122_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2123_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2123_<?php echo($cod_con);?>" type="text" value="0" /></td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x" colspan="3" style="font-size: x-small">P DE MARX</td>
                <td class="dhx_axis_title_x" colspan="3">
                    <input id="campo_2124_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2124_<?php echo($cod_con);?>" type="text" value="0" /></td>
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
                    <input id="campo_2125_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2125_<?php echo($cod_con);?>" type="text" value="0" /></td>
               
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2126_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2126_<?php echo($cod_con);?>" type="text" value="0" /></td>
            </tr>
            <tr>
                <td class="txt_ptp">
                    OI</td>
               
                <td class="txt_ptp">
                    <input id="campo_2127_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2127_<?php echo($cod_con);?>" type="text" value="0" /></td>
               
                <td class="txt_ptp" colspan="2">
                    <input id="campo_2128_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2128_<?php echo($cod_con);?>" type="text" value="0" /></td>
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
                    <input id="campo_2129_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2129_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2130_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2130_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2131_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2131_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2132_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2132_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2133_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2133_<?php echo($cod_con);?>" type="text" value="0" /></td>
            </tr>
            <tr>
                <td class="dhx_axis_title_x">
                    OI</td>
                <td class="dhx_axis_title_x" colspan="2">
                    <input id="campo_2134_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2134_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2135_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2135_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2136_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2136_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2137_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2137_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2138_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2138_<?php echo($cod_con);?>" type="text" value="0" /></td>
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
                    <input id="campo_2139_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2139_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2140_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2140_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2141_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2141_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2142_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidh" name="campo_2142_<?php echo($cod_con);?>" type="text" value="0" /></td>
               
                    
            </tr>
            <tr>
                <td class="dhx_axis_title_x">
                    Rinne</td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2143_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2143_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2144_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2144_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2145_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2145_<?php echo($cod_con);?>" type="text" value="0" /></td>
                <td class="dhx_axis_title_x">
                    <input id="campo_2146_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="impWidhOI" name="campo_2146_<?php echo($cod_con);?>" type="text" value="0" /></td>
                
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
                    <input id="campo_2147_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="txt_obs" name="campo_2147_<?php echo($cod_con);?>" type="text" value="Ingrese observaciones" /></td>
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
                    <input id="campo_2148_<?php echo($cod_con);?>" onblur="guardar(this.id);" class="txt_obs" name="campo_2148_<?php echo($cod_con);?>" type="text" value="Autocomplete" /></td>
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
            
            <td class="subtitOD1" >125<input type="text" onblur="guardar(this.id);" id="campo_2149_<?php echo($cod_con);?>" name="campo_2149_<?php echo($cod_con);?>" value="0" class="impWidh" /></td> 
            
            <td class="subtitOI1" >125<input type="text" onblur="guardar(this.id);" id="campo_2150_<?php echo($cod_con);?>" name="campo_2150_<?php echo($cod_con);?>" value="0" class="impWidhOI" /></td> 
            
            <td class="subtitOD1" >125<input type="text" onblur="guardar(this.id);" id="campo_2151_<?php echo($cod_con);?>" name="campo_2151_<?php echo($cod_con);?>" value="0" class="impWidh" /></td> 
            
            <td class="subtitOI1" >125<input type="text" onblur="guardar(this.id);" id="campo_2152_<?php echo($cod_con);?>" name="campo_2152_<?php echo($cod_con);?>" value="0" class="impWidhOI" /></td> 
        </tr>
        <tr>
            
            <td class="subtitOD1" >250<input type="text" onblur="guardar(this.id);" id="campo_2153_<?php echo($cod_con);?>" name="campo_2153_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI1" >250<input type="text" onblur="guardar(this.id);" id="campo_2154_<?php echo($cod_con);?>" name="campo_2154_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
            
            <td class="subtitOD1" >250<input type="text" onblur="guardar(this.id);" id="campo_2155_<?php echo($cod_con);?>" name="campo_2155_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI1" >250<input type="text" onblur="guardar(this.id);" id="campo_2156_<?php echo($cod_con);?>" name="campo_2157_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD1">500<input type="text" onblur="guardar(this.id);" id="campo_2157_<?php echo($cod_con);?>" name="campo_2158_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
           
            <td class="subtitOI1">500<input type="text" onblur="guardar(this.id);" id="campo_2158_<?php echo($cod_con);?>" name="campo_2159_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
            
            <td class="subtitOD1">500<input type="text" onblur="guardar(this.id);" id="campo_2159_<?php echo($cod_con);?>" name="campo_2160_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI1">500<input type="text" onblur="guardar(this.id);" id="campo_2160_<?php echo($cod_con);?>" name="campo_2161_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD" >1000<input type="text" onblur="guardar(this.id);" id="campo_2161_<?php echo($cod_con);?>" name="campo_2161_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >1000<input type="text" onblur="guardar(this.id);" id="campo_2162_<?php echo($cod_con);?>" name="campo_2162_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
            
            <td class="subtitOD" >1000<input type="text" onblur="guardar(this.id);" id="campo_2163_<?php echo($cod_con);?>" name="campo_2163_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >1000<input type="text" onblur="guardar(this.id);" id="campo_2164_<?php echo($cod_con);?>" name="campo_2164_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD" >2000<input type="text" onblur="guardar(this.id);" id="campo_2165_<?php echo($cod_con);?>" name="campo_2165_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >2000<input type="text" onblur="guardar(this.id);" id="campo_2166_<?php echo($cod_con);?>" name="campo_2166_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
            
            <td class="subtitOD" >2000<input type="text" onblur="guardar(this.id);" id="campo_2167_<?php echo($cod_con);?>" name="campo_2167_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
           
            <td class="subtitOI" >2000<input type="text" onblur="guardar(this.id);" id="campo_2168_<?php echo($cod_con);?>" name="campo_2168_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD" >3000<input type="text" onblur="guardar(this.id);" id="campo_2169_<?php echo($cod_con);?>" name="campo_2169_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >3000<input type="text" onblur="guardar(this.id);" id="campo_2170_<?php echo($cod_con);?>" name="campo_2170_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td>  
            
            <td class="subtitOD" >3000<input type="text" onblur="guardar(this.id);" id="campo_2171_<?php echo($cod_con);?>" name="campo_2171_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >3000<input type="text" onblur="guardar(this.id);" id="campo_2172_<?php echo($cod_con);?>" name="campo_2172_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD" >4000<input type="text" onblur="guardar(this.id);" id="campo_2173_<?php echo($cod_con);?>" name="campo_2173_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >4000<input type="text" onblur="guardar(this.id);" id="campo_2174_<?php echo($cod_con);?>" name="campo_2174_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td>  
            
            <td class="subtitOD" >4000<input type="text" onblur="guardar(this.id);" id="campo_2175_<?php echo($cod_con);?>" name="campo_2175_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >4000<input type="text" onblur="guardar(this.id);" id="campo_2176_<?php echo($cod_con);?>" name="campo_2176_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
        </tr>
        <tr>
            
            <td class="subtitOD" >6000<input type="text" onblur="guardar(this.id);" id="campo_2177_<?php echo($cod_con);?>" name="campo_2177_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >6000<input type="text" onblur="guardar(this.id);" id="campo_2178_<?php echo($cod_con);?>" name="campo_2178_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td>  
            
            <td class="subtitOD" >6000<input type="text" onblur="guardar(this.id);" id="campo_2179_<?php echo($cod_con);?>" name="campo_2179_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOI" >6000<input type="text" onblur="guardar(this.id);" id="campo_2180_<?php echo($cod_con);?>" name="campo_2180_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
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
            document.getElementById("chart1").innerHTML = "";
            doOnLoad();
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
        var myLineChart;

        function doOnLoad() {
            myLineChart = new dhtmlXChart({
                view: "line",
                container: "chart1",
                value: "#oseaOD#",
                item: {
                    borderColor: "#FF0000",
                    color: "#FF0000",
                },
                line: {
                    color: "#FF0000",
                    width: 2
                },
                tooltip: {
                    template: "#oseaOD#"
                },
                offset: 0,
                xAxis: {
                    template: "#frecuencia#"
                },
                yAxis: {
                    start: 0,
                    step: 10,
                    end: 100
                },
                padding: {
                    left: 35,
                    bottom: 50
                },
                origin: 0,
                legend: {
                    values: [{ text: "Osea OD" }, { text: "Aerea OD" }, { text: "Osea OI" }, { text: "Aerea OI" }],
                    align: "right",
                    valign: "middle",
                    layout: "y",
                    width: 100,
                    margin: 8,
                    marker: {
                        type: "item"
                    }
                }
            });
            myLineChart.addSeries({
                value: "#aereaOD#",
                item: {
                     borderColor: "#FF0000",
                    color: "#FF0000",
                    type: "s",
                    radius: 4
                },

                line: {

                    color: "#FF0000",
                    width: 2
                },
                tooltip: {
                    template: "#aereaOD#"
                }
            });
            myLineChart.addSeries({
                value: "#oseaOI#",
                item: {
                    borderColor: "#007EFD",
                    color: "#007EFD",
                    type: "t",
                    radius: 4
                },
                line: {
                    color: "#007EFD",
                    width: 2,
                },
                tooltip: {
                    template: "#oseaOI#"
                }
            });
            myLineChart.addSeries({
                value: "#aereaOI#",
                item: {
                    borderColor: "#007EFD",
                    color: "#007EFD",
                    type: "s",
                    radius: 4
                },
                line: {
                    color: "#007EFD",
                    width: 2
                },
                tooltip: {
                    template: "#aereaOI#"
                }
            });
            myLineChart.parse(multiple_dataset, "json");
        }
<?php
	require_once('../../scripts/conexion.php');
	$sql = "Select campodatos.idcampo, valor from campodatos 
			inner join campo on campodatos.idcampo = campo.idcampo
			WHERE idseccion = 1026 and cod_con=".$cod_con;
	$rs = $dba->prepare($sql);
	$rs->execute();
	while ($rst = $rs->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
		print("$('campo_".$rst[0]."_".$cod_con."').value='".$rst[1]."';");
	}
?>
		actualiza_datos();
    </script>
</body>
</html>
<!--
https://docs.dhtmlx.com/chart__dhxgraphic.html
-->
