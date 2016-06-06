app.controller("loginController",["$scope","$http", function (s,h) {
    s.user=[];
    s.login = function(){
        h.post(BASE_URL + "api/user/login",{
            nick: s.user.nick,
            password: s.user.password
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