<script>
$(document).ready(function(){
    $.ajaxSetup({ cache:false });
    $('#busca').click(function() { 
//      alert($('#cct').val());
      
    $.ajax({
        url : "DatosGenerales/mostrar_DatosGenerales",
        type: "POST",
        dataType : 'json',
        cache : false,
        data : {cct: $('#cct').val()},
        success: function(data, textStatus, jqXHR){
//          alert( "Data Loaded: " + JSON.stringify( data ));
            if(data){
                for (var i in data){
                    if($('#'+i)){
                        $('#'+i).val(data[i]);  
                    }
                }
                $('#inlineRadio'+data.num_aulas).prop('checked', true);
            }else{
                alert('¡Acceso denegado!\nVerifique su CCT')
            }
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert(errorThrown);
        }
    });

    }); 

});
</script>

<div class="container">
    <div class="box_center">
        <div class="box_br">
              
    <div class="row">
       <div class="col-lg-12"><p class="title_grey" align="center">LISTA DE VERIFICACIÓN DE LA CALIDAD DE LA INSTALACIÓN DE LA SOLUCIÓN <br>
         DE AULA DEL PROGRAMA DE INCLUSIÓN Y ALFABETIZACIÓN DIGITAL</p></div>
       <div class="col-lg-12"><br /><p class="title_grey_02">VERIFICACIÓN DE CALIDAD EN SITIO <br>
         DE LA INSTALACIÓN DE LA SOLUCIÓN DE AULA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha:01/10/2014</b></p></div> 
    </div>  
   

         <!--<form action="DatosGenerales/mostrar_DatosGenerales" method="post" class="form-horizontal">-->
         <form id="signinform">
         <br /><br />
        <div class="row">
           <div class="col-lg-4"> <input type="text" class="form-control" id="cct" name="cct" placeholder="Escrib el CCT" required maxlength="10" size="10"/></div>
          <div class="col-lg-8"><button type="button" name="submit" id="busca" class="btn btn-success">Buscar CCT</button></div>
          </div>
        </form>
   <form action="DatosGenerales/actualiza_cCCT" method="post" class="form-horizontal">
    <div class="row">
      <div class="col-md-6 col-md-push-6">
        <br />
          <div class="box_center_school">
            <div class="box_br_es_valora">
              <p>Escuela sin observaciones<br />
              </p></div>
          </div>
      </div>
      <br />    
      <div class="col-md-6 col-md-pull-6">
            <div class="row">
             
             <div class="col-lg-12"><h4 class="title_red_datos">Entidad Federativa:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="nom_entidad" name="nom_entidad" disabled></div>
             <div class="col-lg-12"><h4 class="title_red_datos">Nombre Escuela:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="nom_cct" name="nom_cct" disabled></div>
             <div class="col-lg-12"><h4 class="title_red_datos">Nombre del Director:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="nom_diretor" name="nom_diretor" disabled> </div> 
             <div class="col-lg-12"><h4 class="title_red_datos">Domicilio:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="dir_cct" name="dir_cct" disabled></div>
             <div class="col-lg-12"><h4 class="title_red_datos">Municipio:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="nom_municipio" name="nom_municipio" disabled></div>
             <div class="col-lg-12"><h4 class="title_red_datos">Localidad:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="nom_localidad" name="nom_localidad" disabled></div>
<!--             <div class="col-lg-12"><h4 class="title_red_datos">Clave CCT:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="cve_cct" name="cve_cct" disabled></div>-->
             <div class="col-lg-12"><h4 class="title_red_datos">Teléfono:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="tel_cct" name="tel_cct" required></div>
             <div class="col-lg-12"><h4 class="title_red_datos">Matricula Alumnos:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="matricula" name="matricula" required></div>
             <div class="col-lg-12"><h4 class="title_red_datos">No. de Docentes:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="no_docente" name="no_docente" required></div>
             <div class="col-lg-12"><h4 class="title_red_datos">Correo Electronico:</h4></div>
             <div class="col-lg-12"><input type="text" class="form-control" id="e_mail" name="e_mail" placeholder="Correo Electronico" required/></div>
             <div class="col-lg-12"><h4 class="title_red_datos02">Seleccionar el número de aulas</h4></div>
             <div class="col-lg-12">
                   <label class="radio-inline"><input type="radio" name="num_aulas" id="inlineRadio1" value="1" required> 1</label>
                   <label class="radio-inline"><input type="radio" name="num_aulas" id="inlineRadio2" value="2" required> 2</label>
                   <label class="radio-inline"><input type="radio" name="num_aulas" id="inlineRadio3" value="3" required> 3</label>
             </div>
          </div>
           
        </div>

        </div>
    <div class="row">
         <div class="col-lg-12"><p class="title_grey_tx">La presente Lista de Verificación con fundamento en el articulo 108 del Reglamento de la Ley de Adquisiciones, Arrendamientos y Servicios del Sector Público, con la finalidad de verificar la calidad de la prestación del servicio de instalación de los bienes que componen ala solución de aulas en las escuelas.</p></div>
         <div class="col-lg-12"><p style="text-align:center;">
           <!--<input type="hidden" name="id_cct" value="<?php //echo $id_cct; ?>">-->
           <input type="hidden" id="cve_cct" name="cve_cct">
           <input type="hidden" id="seccion" name="seccion" value="1">
           <button class="btn btn-lg btn-primary btn-block" type="submit">Comenzar Encuesta</button>
          </p>
         </div>
   </div>
      
      </form>
       
        </div>
    </div>   
</div>