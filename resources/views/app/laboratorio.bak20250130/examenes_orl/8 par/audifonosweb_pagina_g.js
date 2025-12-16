/*--- Avanquest WebEasy Document Script ---*/

IE=(navigator.appName.indexOf('Microsoft') >= 0);
NS=(navigator.appName.indexOf('Netscape') >= 0);
SF=(navigator.appName.indexOf('Safari') >= 0);
FF=(navigator.userAgent.indexOf('Firefox') >= 0);
OP=(navigator.userAgent.indexOf('Opera') >= 0);
GK=(navigator.userAgent.indexOf('Gecko') >= 0);
V4=(parseInt(navigator.appVersion) >= 4);
if((V5=navigator.appVersion.indexOf('MSIE '))<0) V5=-5;
V5=(parseInt(navigator.appVersion.charAt(V5+5))>=5);
MAC=(navigator.userAgent.indexOf('Mac')!=-1);


IDP={}; IDP[0]=0;

function DoAlpha(obj,val,max,step,sunk,rise,hold,fall,loop)
{	var tm;
	if(val >= max)
	{	eval(obj+'='+max);
		if(fall < 0) return;
		tm=(sunk)?loop:hold;
		if(tm < 0) return;
		val=max;
		step=-step;
	}else
	if(val <= 0)
	{	eval(obj+'=0');
		if(rise < 0) return;
		tm=(sunk)?hold:loop;
		if(tm < 0) return;
		val=0;
		step=-step;
	}else
	{	tm=(step > 0)?rise:fall;
		if(tm <= 0 ) val=(step > 0)?max:0;
		eval(obj+'='+val);
	}
	window.setTimeout('DoAlpha("'+obj+'",'+(val+step)+','+max+','+step+','+sunk+','+rise+','+hold+','+fall+','+loop+')',tm);
}

function weCheckForm( frm )
{
	for(var k=0; k<frm.elements.length; ++k)
	{	var obj=frm.elements[k];
		if(obj.type && ('text,textarea,password,file'.indexOf(obj.type.toLowerCase()) >= 0))
		{
			if( obj.value == '')
			{	alert('Por favor escriba la información requerida en el campo.');
				obj.focus();
				return false;
			}
		}
	}
	return true;
}


/*--- EndOfFile ---*/
