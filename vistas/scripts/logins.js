$("#frmAcceso").on('submit',function(e){
    e.preventDefault();
    logina = $("#logina").val();
    clavea = $("#clavea").val();
    if(logina != '' && clavea !=''){

        $.post("../ajax/usuario.php?op=verificar",
            {
                logina:logina,
                clavea:clavea
            },
         
            function login(data)
            {
                if(data != 'null')
                {
                    $(location).attr("href","escritorio.php");
                } else
                {
                    bootbox.alert("Usuario o contraseña incorrecta");
                }
               
            }
        
        );
        } else
        {
            bootbox.alert({
                message: "INGRESE LOS DATOS",
                size: 'small'
               
            });
        }
})