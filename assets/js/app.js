var app = angular.module("ReseminApp", []);
var BASE_URL="http://localhost:8080/resemin/";
app.filter('html', function($sce) {
    return function(val) {
        return $sce.trustAsHtml(val);
    };
});
app.controller("paginaController",["$scope","$http",function(s,h){
    s.nombre="@dsullon";
    s.paginas=[];
    s.nuevaPagina={};
    h.get(BASE_URL + "api/pagina")
        .success(function(data){
            s.paginas=data.response;
        })
        .error(function(err){
            console.log(err);
        });
    s.agregar = function(){
        h.post(BASE_URL + "api/pagina",{
            titulo: s.nuevaPagina.titulo,
            contenido: s.nuevaPagina.contenido
        })
            .success(function(data,status,headers,config) {
                s.paginas.push(s.nuevaPagina);
                s.nuevaPagina = {};             
            })
            .error(function(error){
                console.log(error ); 
            })
    }
}])
app.controller("postController",["$scope","$http", function (s,h) {
    s.posts = [];
    s.urlImage = BASE_URL + "img/resemin.jpg";
    h.get(BASE_URL + "api/post")
        .success(function(data) {
            s.posts=data.response;
        })
        .error(function(err){
            console.log(err);
        });
    s.eliminar=function(u){
        console.log(u);
        s.posts.splice(s.posts.indexOf(u),1);
    }
}])
