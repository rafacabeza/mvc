# REPASO
antes de nada, ir a entornods y parar docker:
docker-compose down

## Actualizar entornods
alumno@dws:~/entornods$ git fetch 
alumno@dws:~/entornods$ git checkout --track origin/repaso20 


## ACCEDER A MVC
Ir a github:
https://github.com/rafacabeza/mvc/tree/master

Hacer un FORK del repositorio
Asi creais un repositorio propio idéntico  al del profesor
Después lo clonáis dentro de entornods/data:
git clone git@github.com:XXXXXXXX/mvc.git (Vuestra dirección)

Levantar docker-compose
Probar en el navegador mvc.local


## ENRUTAMIENTO MVC:
- No distingue GET/POST
- La ruta sigue este esquema: "/nombre/metodo/argumentos"
- De nombre --> NombreController. Si no existe busca HomeController
- De metodo --> busca el método en "NombreController", si no existe busca index()ç

### EJERCICIO
- Crear el UsuarioController
- Añadir método "crear()". Inicialmente sólo debe "saludar"
- 