<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>JV Software | Tutorial 11</title>
    <script src="http://js.pusherapp.com/1.9/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" href="js/bootstrap.min.js"></script>
    <script>
     
       function getMensajesFromBase(){
            // $('#comentarios').append('<li>' + respuesta.mensaje  + '</li>');
                $.ajax({
                    //url: "mensajes.php",
                    url: "muroProfesor.php",
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
        
         $(function(){
      
          var $container = $('#container');
      
          $container.imagesLoaded(function(){
            $container.masonry({
              itemSelector: '.box',
              columnWidth: 100
            });
          });
      
          $container.infinitescroll({
            navSelector  : '#page-nav',    // selector for the paged navigation
            nextSelector : '#page-nav a',  // selector for the NEXT link (to page 2)
            itemSelector : '.box',     // selector for all items you'll retrieve
            loading: {
                finishedMsg: 'No more pages to load.',
                img: 'http://i.imgur.com/6RMhx.gif'
              }
            },
            // trigger Masonry as a callback
            function( newElements ) {
              // hide new items while they are loading
              var $newElems = $( newElements ).css({ opacity: 0 });
              // ensure that images load before adding to masonry layout
              $newElems.imagesLoaded(function(){
                // show elems now they're ready
                $newElems.animate({ opacity: 1 });
                $container.masonry( 'appended', $newElems, true );
              });
            }
          );
        });
  
     function load() {
       var loadedWindow = 0;
          debugger;
          if (loadedWindow == 0) {
            getMensajesFromBase();
            loadedWindow = 1;
          }
                  
      }
      window.onload = load;  
        
    </script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="muro.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
</head>
<body>
  <div id="container">
    <div>
        <h1>Soy Profesor</h1>
    </div>
    <ul id="comentarios">
        <!-- Comentarios aqui! -->
    </ul>
    
</body>
</html>
