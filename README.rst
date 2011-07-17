Notas
========================

Entidades
========================

Necesitaremos una tabla que relacione amigos, para nuestras búsquedas internas:

Amigos
----------- 
* id
* user1_id
* user2_id

Se crea mediante annotations.

Se ha creado una tabla para las imágenes del perfil. Es mejor tenerlas en 
aparte del perfil, no sabemos si en un futuro se permitirán más imágenes 
por perfil. 
No es la imagen para el avatar, ésta se descarga junto a la conexión con FB, 
por lo que si en FB cambias la foto, en profiles también se cambia. Esta imagen 
es la que puedes subir junto a un perfil que estás creando.

Imágenes
-------------
* id
* ruta a la imagen


Para los comentarios hay un bundle: http://symfony2bundles.org/FriendsOfSymfony/FOSCommentBundle


