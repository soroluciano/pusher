<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>JV Software | Tutorial 11</title>
    <script src="http://js.pusherapp.com/1.9/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.js"></script>
    <script src="js/jquery.infinitescroll.js"></script>
    <script>
     
       function getMensajesFromBase(){
            // $('#comentarios').append('<li>' + respuesta.mensaje  + '</li>');
                $.ajax({
                    //url: "mensajes.php",
                    url: "muroAlumno.php",
                    type: 'post',
                    data: {},
                    success:function(response){
                        $('#comentarios').html(response);
                    },
                    error: function(e){
                    $('#logger').html(e.responseText);
                    }
                });
       }
        
        
        $(function(){

            var pusher = new Pusher('c48d59c4cb61c7183954');
            var canal  = pusher.subscribe('canalo');

            canal.bind('nuevo_comentario', function(){
                getMensajesFromBase();
               
            });

            $('form').submit(function(){
                $.post('ajax.php', { msj : $('#input_mensaje').val(), socket_id : pusher.connection.socket_id }, function(respuesta){
                    $('#comentarios').append('<li>' + respuesta.mensaje  + '</li>');
                }, 'json');

                return false;
            });
        });
        
    </script>
</head>
<body>
    <div>
        <h1>Soy alumno</h1>
    </div>
    <ul id="comentarios">
        <!-- Comentarios aqui! -->
    </ul>
    <div id="more"><span>Mas comentarios</span></div>
</body>
</html>
