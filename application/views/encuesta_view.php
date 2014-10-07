<script>
$(document).ready(function(){
    $.ajaxSetup({ cache:false });
    
    var cve_cct='<?php echo $cve_cct;?>';
    var num_aulas=<?php echo $num_aulas;?>;
    var id_cct=<?php echo $id_cct;?>;
    var aulas=['N','A','B','C'];
    var aulaVerificacion=0;
    var id_verificacion=0;
    var id_seccion_reactivo=1;
    var encuesta=1;
    var alcance=1;
    var defaultObject={
        seccion:id_seccion_reactivo,
        encuesta:encuesta,
        alcance:alcance
    };
    
    generaEncusta(defaultObject);
    
    $('#enviaEncuesta').click(function () {
        setEncuestaData();
    });
    
    function generaEncusta(paramEncuesta){
        $.ajax({
            url : "<?php echo base_url('/index.php/VisualizaEncuesta/getEncuestaData') ?>",
            type: "POST",
            dataType : 'json',
            cache : false,
            data :paramEncuesta ,
            success: function(data, textStatus, jqXHR){
//            alert( "Data Loaded: " + JSON.stringify( data ));
                alcance=data[0].alcance;
                if(alcance==1){
                    $('#cCCT').html(cve_cct+' / ');
                    //$('#titleCnt').html(cve_cct+' / '+data[0].nom_seccion);
                    $('#titleCnt').html(data[0].nom_seccion);
                }else if(alcance==2){
                    if(aulaVerificacion==0){
                        aulaVerificacion++;
                    }
                    $('#cCCT').html(cve_cct+' / 5 '+aulas[aulaVerificacion]+' / ');
                    //$('#titleCnt').html(cve_cct+' / 5 '+aulas[aulaVerificacion]+' / '+data[0].nom_seccion);
                    $('#titleCnt').html(data[0].nom_seccion);
                }
                id_seccion_reactivo=data[0].id_seccion_reactivo;
//                alert( "Data Loaded: " + JSON.stringify( data ));
                var strPreguntas='';
                
                
                for (var i in data){
                   if(data[i].tpo_reactivo==1){
                       strPreguntas=strPreguntas+
                           '<div class="col-lg-12"><h4 class="title_gray_quiz">'+
                           data[i].reactivo+'</h4></div>'+
                           '<div class="col-lg-12" style="padding-left:24px;">'+
                           '<label class="radio-inline"><input type="radio" name="'+data[i].id_reactivos+'" id="inlineRadio1" value="1"><h4 class="title_red_radiob">SI</H4></label>'+
                           '<label class="radio-inline"><input type="radio" name="'+data[i].id_reactivos+'" id="inlineRadio2" value="0"><h4 class="title_red_radiob">NO</H4></label><hr></div>';
                   }
                   if(data[i].tpo_reactivo.length>1){
                       strPreguntas=strPreguntas+
                           '<div class="col-lg-12"><h4 class="title_gray_quiz">'+
                           data[i].reactivo+'</h4></div>'+
                           '<div class="col-lg-12" style="padding-left:24px;">';
                        for(var j in data[i].tpo_reactivo){
                           strPreguntas=strPreguntas+
                            '<label class="radio-inline">'+
                            '<h4 class="title_red_radiob">'+
                            '<input type="checkbox" name="'+data[i].id_reactivos+
                            '_'+data[i].tpo_reactivo[j].id_opciones+
                            '" id="'+data[i].id_reactivos+
                            '_'+data[i].tpo_reactivo[j].id_opciones+
                            '" value="'+data[i].tpo_reactivo[j].inciso+'">&nbsp;&nbsp;&nbsp;'+
                            data[i].tpo_reactivo[j].respuesta+'</H4></label><BR/>';
                        }
                        strPreguntas=strPreguntas+'<hr></div>';
                   }
                   if(data[i].tpo_reactivo==3){
                       strPreguntas=strPreguntas+
                           '<div class="col-lg-12"><h4 class="title_gray_quiz">'+
                           data[i].reactivo+'</h4></div> <div class="col-lg-12">'+
                            '<textarea name="'+data[i].id_reactivos+'" id="'+data[i].id_reactivos+'"class="form-control"></textarea></div>';
                   }
                }
                $('#preguntasCnt').html(strPreguntas);
                $('html, body').animate({ scrollTop: 0 }, 'fast');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert(errorThrown);
            }
        });
    }
    
    function setEncuestaData(){
        var paramObj = {};
        $.each($('#formVerificacion').serializeArray(), function(_, kv) {
            if (paramObj.hasOwnProperty(kv.name)) {
                paramObj[kv.name] = $.makeArray(paramObj[kv.name]);
                paramObj[kv.name].push(kv.value);
            }else {paramObj[kv.name] = kv.value;}
        });
        var respArray= [];
        for(var i in paramObj){
            var n = i.indexOf("_");
            if(n == -1){
                respArray.push({id_reactivo:i,observaciones:paramObj[i]}); 
            }else{
                respArray.push({id_reactivo:i.substring(n,0),observaciones:paramObj[i]});
            }
        }
        var dataToSet={
            lstRespuesta:respArray,
            id_cct:id_cct,
            id_verificacion:id_verificacion,
            aula:aulas[aulaVerificacion],
            alcance:alcance,
            num_encuesta:encuesta,
            id_seccion_reactivo:id_seccion_reactivo
        };
        $.ajax({
            url : "<?php echo base_url('/index.php/VisualizaEncuesta/setResultados') ?>",
            type: "POST",
            dataType : 'json',
            cache : false,
            data :dataToSet ,
            success: function(data, textStatus, jqXHR){
//                alert( "Data Loaded: " + JSON.stringify( data ));
                id_verificacion= data.id_verificacion;
                if(data.cambioAula){
                    aulaVerificacion++;
                }
                if(aulaVerificacion<=num_aulas){
                    var paramEncuesta={
                        seccion:data.seccionData[0].id_seccion_reactivo,
                        encuesta:data.seccionData[0].num_encuesta,
                        alcance:data.seccionData[0].alcance
                    };
                    generaEncusta(paramEncuesta);
                    
                }else{
                    alert('Fin de la verificaci\u00F3n');
                    window.location.href="<?php echo base_url('/index.php/Home') ?>";
                }
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert(errorThrown);
            }
        });
    }
});
</script>
<div class="container">
    <div class="box_center">
        <div class="box_br">
            <form id="formVerificacion" >
                <div class="row">
                    <div class="col-lg-12">
                        <p class="title_grey" align="center">
                            LISTA DE VERIFICACIÓN DE LA CALIDAD DE LA INSTALACIÓN DE LA SOLUCIÓN <br>
                            DE AULA DEL PROGRAMA DE INCLUSIÓN Y ALFABETIZACIÓN DIGITAL
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <br />
                        <label class="title_grey_02" id="cCCT"></label><label class="title_grey_22" id="titleCnt"></label><!--contenedor de titulo de seccion-->
                        <hr/>
                    </div>
                </div>	
                <div class="row">
                    <br />    
                    <div class="col-md-12">
                        <div class="row" id="preguntasCnt"/><!--contenedor de Preguntas-->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="title_grey_tx">
                                La presente Lista de Verificación con fundamento en 
                                el articulo 108 del Reglamento de la Ley de Adquisiciones, 
                                Arrendamientos y Servicios del Sector Público, con la finalidad de 
                                verificar la calidad de la prestación del servicio de instalación 
                                de los bienes que componen ala solución de aulas en las escuelas.
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <p style="text-align:center;">
                                <button class="btn btn-lg btn-primary btn-block" type="button" id="enviaEncuesta">
                                    Continuar
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
    </div>
</div>
