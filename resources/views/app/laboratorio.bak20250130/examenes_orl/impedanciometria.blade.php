<?php
	$cod_con =$_GET["cod_con"];
	$editable =$_GET["editable"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Impedanciometria</title>
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
          width:900px;height:380px;border:1px solid #c0c0c0;
        }
              .diapa {
         border: 1px solid #666666; width:80%;margin-left:20px;margin-top:20px;margin-right:15px;
        }
         
        .auto-style1 {
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
            color: #FF0000;
            padding-left: 10px;
            height: 26px;
        }
        .auto-style2 {
            width: 306px;
        }
        .auto-style5 {
            text-align: center;
            width: 37px;
        }
        .auto-style6 {
            text-align: center;
            width: 38px;
        }
         
        .auto-style9 {
            width: 225px;
            height: 155px;
        }
         
        .auto-style11 {
            text-align: left;
            height: 26px;
        }
        .auto-style12 {
            text-align: left;
        }
        .auto-style14 {
            height: 155px;
        }
         
        .auto-style15 {
            width: 85px;
            color: #FF0000;
            text-align: center;
            margin-left: 10px;
        }
         
        .auto-style16 {
            width: 179px;
            color: #FF0000;
            text-align: center;
            margin-left: 10px;
        }
         
        .auto-style17 {
            width: 478px;
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
                <td style="width:20%" > Impedanciometria</td><td style="width:50%" hidden="hidden" ><label>Nombre </label><input id="txtcnom" class="" name="txtcnom" type="text" value="nombre" /></td><td style="width:30%" hidden="hidden" ><label>Edad</label><input id="txtced" class="" name="txtced" type="text" value="Edad" /></td><td style="width:10%" hidden="hidden"> <label>Fecha</label><input id="txtcfec" class="" name="txtcfec" type="text" value="fecha" /></td>
            </tr>
        </table>
        
    </div>
    <div id="chart2" style="width:900px;height:450px;border:1px solid #c0c0c0;padding-bottom:15px">
        <table class="">
            <tr>
                <td  class="auto-style17">
                    
                    <table class="pad_caj1">
                        <tr>
                            <td class="td_subtit" colspan="4">PERMEABILIDAD TUBARICA</td>
                        </tr>
                        <tr>
                            <td class="dhx_axis_title_x">&nbsp;</td>
                            <td class="dhx_axis_title_x" colspan="2">OD</td>
                            <td class="dhx_axis_title_x">OI</td>
                        </tr>
                        <tr>
                            <td class="auto-style12">VALSALVA</td>
                            <td class="dhx_axis_title_x">
                                <input class="impWidh" onblur="guardar(this.id);" id="campo_2181_<?php echo($cod_con);?>" name="campo_2181_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="dhx_axis_title_x" colspan="2">
                                <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2182_<?php echo($cod_con);?>" name="campo_2182_<?php echo($cod_con);?>" type="text" value="0" /></td>
                        </tr>
                        <tr>
                            <td class="auto-style11">DEGLUCION</td>
                            <td class="txt_ptp">
                                <input class="impWidh" onblur="guardar(this.id);" id="campo_2183_<?php echo($cod_con);?>" name="campo_2183_<?php echo($cod_con);?>"  type="text" value="0" /></td>
                            <td class="txt_ptp" colspan="2">
								<input class="impWidhOI" onblur="guardar(this.id);" id="campo_2184_<?php echo($cod_con);?>" name="campo_2184_<?php echo($cod_con);?>"  type="text" value="0" /></td>
                        </tr>
                        <tr>
                            <td class="auto-style11">TPG POST V</td>
                            <td class="txt_ptp">
                                <input class="impWidh" onblur="guardar(this.id);" id="campo_2185_<?php echo($cod_con);?>" name="campo_2186_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="txt_ptp" colspan="2">
                                <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2185_<?php echo($cod_con);?>" name="campo_2186_<?php echo($cod_con);?>" type="text" value="0" /></td>
                        </tr>
                        <tr>
                            <td class="txt_ptp" colspan="4">CONCLUSION</td>
                        </tr>
                        <tr>
                            <td class="auto-style11" colspan="4">
                                <input class="auto-style16" onblur="guardar(this.id);" id="campo_2187_<?php echo($cod_con);?>" name="campo_2187_<?php echo($cod_con);?>" type="text" value="" /></td>
                        </tr>
                    </table>
                    
                </td>
                <td colspan="2" class="auto-style14">
                    
                    <table class="" style="border: 1px solid #666666; margin-left:20px;margin-top:20px;margin-right:15px">
                        <tr>
                            <td class="td_subtit" colspan="3">&nbsp;</td>
                            <td class="td_subtit" colspan="3">REFLEJO</td>
                            <td class="td_subtit" colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="auto-style5">&nbsp;</td>
                            <td class="auto-style5">&nbsp;</td>
                            <td class="dhx_axis_title_x" colspan="2">500</td>
                            <td class="auto-style6">1000</td>
                            <td class="dhx_axis_title_x" colspan="2">2000</td>
                            <td class="auto-style6">4000</td>
                            <td class="auto-style6">WN</td>
                        </tr>
                        <tr>
                            <td class="auto-style5">OD</td>
                            <td class="auto-style5">C/I</td>
                            <td class="dhx_axis_title_x" colspan="2">
                                <input class="impWidh" onblur="guardar(this.id);" id="campo_2188_<?php echo($cod_con);?>" name="campo_2188_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="auto-style6">
                                <input class="impWidh" onblur="guardar(this.id);" id="campo_2189_<?php echo($cod_con);?>" name="campo_2189_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="dhx_axis_title_x" colspan="2">
                                <input class="impWidh" onblur="guardar(this.id);" id="campo_2190_<?php echo($cod_con);?>" name="campo_2190_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="auto-style6">
                                <input class="impWidh" onblur="guardar(this.id);" id="campo_2191_<?php echo($cod_con);?>" name="campo_2191_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="auto-style6">
                                <input class="impWidh" onblur="guardar(this.id);" id="campo_2192_<?php echo($cod_con);?>" name="campo_2192_<?php echo($cod_con);?>" type="text" value="0" /></td>
                        </tr>
                        <tr>
                            <td class="auto-style5">OI</td>
                            <td class="auto-style5">I/C</td>
                            <td class="dhx_axis_title_x" colspan="2">
                                <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2193_<?php echo($cod_con);?>" name="campo_2193_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="auto-style6">
                                <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2194_<?php echo($cod_con);?>" name="campo_2194_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="dhx_axis_title_x" colspan="2">
                                <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2195_<?php echo($cod_con);?>" name="campo_2195_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="auto-style6">
                                <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2196_<?php echo($cod_con);?>" name="campo_2196_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="auto-style6">
                                <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2197_<?php echo($cod_con);?>" name="campo_2197_<?php echo($cod_con);?>" type="text" value="0" /></td>
                        </tr>
                    </table>
                    
                </td>
                <td class="">
                    
                    <table class="diapa">
                        <tr>
                            <td class="dhx_axis_title_x" colspan="3">DETERIORO DEL REFLEJO</td>
                        </tr>
                        <tr>
                          
                            <td class="dhx_axis_title_x">
                                OD</td>
                            <td class="dhx_axis_title_x">
                                &nbsp;</td>
                            <td class="dhx_axis_title_x">
                                OI</td>
                         
                        </tr>
                        <tr>
                          
                            <td class="dhx_axis_title_x">
                                <input class="impWidh" onblur="guardar(this.id);" id="campo_2198_<?php echo($cod_con);?>" name="campo_2198_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="dhx_axis_title_x">
                                500</td>
                            <td class="dhx_axis_title_x">
                                <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2199_<?php echo($cod_con);?>" name="campo_2199_<?php echo($cod_con);?>" type="text" value="0" /></td>
                         
                        </tr>
                        <tr>
                            
                            <td class="dhx_axis_title_x">
                                <input class="impWidh" onblur="guardar(this.id);" id="campo_2200_<?php echo($cod_con);?>" name="campo_2200_<?php echo($cod_con);?>" type="text" value="0" /></td>
                            <td class="dhx_axis_title_x">
                                1000</td>
                            <td class="dhx_axis_title_x">
                                <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2201_<?php echo($cod_con);?>" name="campo_2201_<?php echo($cod_con);?>" type="text" value="0" /></td>
                           
                        </tr>
                        <tr>
                            
                            <td class="dhx_axis_title_x">
                                OTROS</td>
                            <td class="dhx_axis_title_x" colspan="2">
                                <input class="auto-style15" onblur="guardar(this.id);" id="campo_2202_<?php echo($cod_con);?>" name="campo_2202_<?php echo($cod_con);?>" type="text" value="" /></td>
                           
                        </tr>
                    </table>
                    
                </td>
            </tr>
            
            
           
        </table>
        
    <table>
    <tr>
        <td style="width:100%"><table style="width:885px;margin-left:15px;">
        <tr>
            
            <td colspan="3" class="tit">Valores del Timpanograma</td>  

            <td class="button" rowspan="6" ><input type="button" onclick="actualiza_datos();" value="Graficar" class="button" /></td> 

        </tr>
        <tr>
            
            <td class="subtitOD1" >Volumen</td> 
            
            <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2203_<?php echo($cod_con);?>" name="campo_2203_<?php echo($cod_con);?>" value="0" class="impWidh" /></td> 
            
            <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2204_<?php echo($cod_con);?>" name="campo_2204_<?php echo($cod_con);?>" value="0" class="impWidhOI" /></td> 
            
        </tr>
        <tr>
            
            <td class="auto-style1" >Presion</td> 
            
            <td class="auto-style1" ><input type="text" onblur="guardar(this.id);" id="campo_2205_<?php echo($cod_con);?>" name="campo_2205_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="auto-style1" ><input type="text" onblur="guardar(this.id);" id="campo_2206_<?php echo($cod_con);?>" name="campo_2206_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
            
        </tr>
        <tr>
            
            <td class="subtitOD1">Gr</td> 
            
            <td class="subtitOD1"><input type="text" onblur="guardar(this.id);" id="campo_2207_<?php echo($cod_con);?>" name="campo_2207_<?php echo($cod_con);?>" value="0" class="impWidh" /></td>  
            
            <td class="subtitOD1"><input type="text" onblur="guardar(this.id);" id="campo_2208_<?php echo($cod_con);?>" name="campo_2208_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
            
        </tr>
        <tr>
            
            <td class="subtitOD1" >C.E.</td> 
            
            <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2209_<?php echo($cod_con);?>" name="campo_2209_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2210_<?php echo($cod_con);?>" name="campo_2210_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
            
        </tr>
        <tr>
            
            <td class="subtitOD1" >R</td> 
            
            <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2211_<?php echo($cod_con);?>" name="campo_2211_<?php echo($cod_con);?>" value="0" class="impWidh"/></td> 
            
            <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2212_<?php echo($cod_con);?>" name="campo_2212_<?php echo($cod_con);?>" value="0" class="impWidhOI"/></td> 
            
        </tr>
        <tr>
            <td colspan="4" style="text-align:center">
           <table Style="width:100%">
                        <tr>
                            <td class="td_subtit">Observaciones</td><td class="td_subtit">Examinador</td>
                        </tr>
                        <tr>
                            <td>
								<input class="txt_obs" onblur="guardar(this.id);" id="campo_2213_<?php echo($cod_con);?>" name="campo_2213_<?php echo($cod_con);?>" type="text" value="Ingrese observaciones" />
							</td>
                            <td>
								<input class="txt_obs" onblur="guardar(this.id);" id="campo_2214_<?php echo($cod_con);?>" name="campo_2214_<?php echo($cod_con);?>" name="txtcoex" type="text" value="Autocomplete" />
							</td>
                        </tr>
                    </table></td> 
        </tr>
    </table></td>
        
    </tr>
    </table>
        
    </div>
    
   
   

    
    <script>
        actualiza_datos = function () {
            
           
            multiple_dataset[3]["ceOD"] = document.getElementById("txtCeOD").value;
            multiple_dataset[3]["ceOI"] = document.getElementById("txtCeOI").value;
  
            document.getElementById("chart1").innerHTML = "";
            doOnLoad();
        }


        var multiple_dataset = [
            { ceOD: "0", ceOI: "0", Gr: "-400" },
            { ceOD: "0", ceOI: "0", Gr: "-200" },
            { ceOD: "0", ceOI: "0", Gr: "-100" },
            { ceOD: "0", ceOI: "0", Gr: "0" },
            { ceOD: "0", ceOI: "0", Gr: "100" },
            { ceOD: "0", ceOI: "0", Gr: "200" },
        
           
        ];
        var myLineChart;

        function doOnLoad() {
            myLineChart = new dhtmlXChart({
                view: "line",
                container: "chart1",
                value: "#ceOD#",
                item: {
                    borderColor: "#FF0000",
                    color: "#FF0000",
                },
                line: {
                    color: "#FF0000",
                    width: 2
                },
                tooltip: {
                    template: "#ceOD#"
                },
                offset: 0,
                xAxis: {
                    template: "#Gr#"
                },
                yAxis: {
                    start: -0.0,
                    step: 0.5,
                    end: 2
                },
                padding: {
                    left: 35,
                    bottom: 50
                },
                origin: 0,
                legend: {
                    values: [{ text: " OD" }, { text: "OI" }],
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
                value: "#ceOI#",
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
                    template: "#ceOI#"
                }
            });
         
            myLineChart.parse(multiple_dataset, "json");
        }
<?php
	require_once('../../scripts/conexion.php');
	$sql = "Select campodatos.idcampo, valor from campodatos 
			inner join campo on campodatos.idcampo = campo.idcampo
			WHERE idseccion = 1027 and cod_con=".$cod_con;
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
