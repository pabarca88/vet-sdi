$(document).ready(function(){
    checkToken();
});

function checkToken(){
    let url = "Check_sdi_token";
    var _token = $('input[name=_token]').val();    
    var token = $('#token').val();    

    $.ajax({
        url: url,
        type: "GET",
        data: {
            _token: _token,
            token:token
        },
        success: (resp)=>{
            if(resp.estado==1)
            {
                if(resp.registro.estado==1)
                {
                    top.location.href=$('#url_nueva').val()+'?token='+token;
                }else{
                    setTimeout(checkToken,3000);
                }
            }else{
                setTimeout(checkToken,3000);
            }
        },
        error: (resp)=>{
            console.warn(resp);
        }
    });
    

}