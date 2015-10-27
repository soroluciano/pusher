<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>JV Software | Tutorial 11</title>
    <script src="http://js.pusherapp.com/1.9/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script>
        $(function(){

            var pusher = new Pusher('c48d59c4cb61c7183954');
            var canal  = pusher.subscribe('canalo');
            
            canal.bind('nuevo_comentario', function(respuesta){
                $('#comentarios').append('<li>' + respuesta.mensaje  + '</li>');
            });

            $('form').submit(function(){
            
                $.ajax({
                    url: "insertar.php",
                    type: 'post',
                    data: { input_mensaje: $('#input_mensaje').val() },
                    success:function(response){
                        alert( "Data Saved: " + response );
                    },
                    error: function(e){
                    $('#logger').html(e.responseText);
                    }
                });
                
                
                
                $.post('ajax.php', {
                    msj : $('#input_mensaje').val(),
                    socket_id : pusher.connection.socket_id
                }
                , function(respuesta){
                        $('#comentarios').append('<li>' + respuesta.mensaje  + '</li>');
                }, 'json');

                return false;
            });
        });
    </script>
</head>
<body>
    <form action="" method="post">
        <input type="text" id="input_mensaje" />
        <input type="submit" class="submit" value="Enviar" />
    </form>
    
    <ul id="comentarios">
        <!-- Comentarios aqui! -->
    </ul>
</body>
</html>
