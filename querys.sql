
/*Buscar posteos de los profesores de las actividades a las que me encuentro inscripto*/


select pmp.id_posteo,ps.foto1,fu.nombre,fu.apellido
from Perfil_Muro_Profesor pmp 
inner join Actividad ac 
on pmp.id_actividad=ac.id_actividad
inner JOIN Perfil_Social ps
on ps.id_usuario = ac.id_usuario
inner join Usuario usu 
on usu.id_usuario = ac.id_usuario
inner join Ficha_Usuario fu 
on fu.id_usuario= usu.id_usuario
where usu.id_usuario = 5

/*Buscar respuestas de usuarios a partir de cada posteo (usa un for a partir de la busqueda de la query anterior)*/
select res.respuesta from Respuesta res
left join Perfil_Muro_Profesor pm
on res.id_posteo = pm.id_posteo
where pm.id_posteo = ?
