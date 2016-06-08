<?php

class Dynamic_Nav {
    
    function __construct()
    {
        $this->ci =& get_instance(); 
    }
    
    function build_nav()
    {
        $url_service = base_url().'api/nav';
        $content = @file_get_contents($url_service);

        echo "<div class='navbar navbar-default'>";
            echo "<div class='container'>";
                echo "<div class='navbar-header'>";
                echo "<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-responsive-collapse'>";
                    echo "<span class='icon-bar'></span>";
                    echo "<span class='icon-bar'></span>";
                    echo "<span class='icon-bar'></span>";
                echo "</button>";
                echo "<a class='navbar-brand' href='".base_url()."'><img src='".base_url()."img/logo-resemin.png' alt='Resemin S.A.'></a>";
                echo "</div>";
                echo "<div class='navbar-collapse collapse navbar-responsive-collapse'>";
                    echo "<ul class='nav navbar-nav'>";
                        if($content){
                            $result = json_decode(file_get_contents($url_service),true);
                            foreach ($result['response'] as $opcion) {
                                if($opcion['visible']){
                                    echo "<li><a href=".base_url()."pagina/view/" . $opcion['pageId'] . ">" . $opcion['name'] . "</a></li>";   
                                }
                            }
                        }
                    echo "</ul>";
                    echo "<ul class='nav navbar-nav navbar-right'>";
                        $this->ci->db->where('id',$this->ci->session->userdata('usuario'));
                        $query = $this->ci->db->get('user');
                        if($query->result())
                        {
                            $usuario = $query->result()[0];                        
                            echo "<li class='dropdown'>";
                                echo "<a class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>";
                                    echo "<img src='".$usuario->urlAvatar."' class='img-circle profile-img'>";
                                    echo ($usuario->nombres.' '.$usuario->apellidoPaterno.' '.$usuario->apellidoMaterno);
                                    echo "<span class='caret'></span>";
                                echo "</a>";
                                echo "<ul class='dropdown-menu'>";
                                    echo "<li>";
                                        echo "<a href='#'>Editar perfil</a>";
                                    echo "</li>";
                                    if($this->ci->session->userdata('nivel')==1)
                                    {
                                        echo "<li>";
                                            echo "<a href='".base_url()."admin/home'>Administrar datos</a>";
                                        echo "</li>";
                                    }
                                    echo "<li role='separator' class='divider'></li>";
                                    echo "<li>";
                                        echo "<a href='".base_url()."login/logout'>Cerrar sesión</a>";
                                    echo "</li>";
                                echo "</ul>";
                            echo "</li>";
                        }else{
                            $token = $this->token();
                            echo '<ul class="nav navbar-nav navbar-right">';
                                echo '<li class="dropdown">';
                                    echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>';
                                    echo '<ul id="login-dp" class="dropdown-menu">';
                                        echo '<li>';
                                            echo '<div class="row">';
                                                echo '<div class="col-md-12">';
                                                    echo '<form class="form" role="form" method="post" action="'.base_url().'login/new_user" accept-charset="UTF-8" id="login-nav">';
                                                        echo '<input type="hidden" name="token" value="'.$token.'">';
                                                        echo '<div class="form-group">';
                                                                echo '<label class="sr-only" for="usuario">Email address</label>';
                                                                echo '<input type="text" class="form-control" name="usuario" placeholder="Usuario" required>';
                                                        echo '</div>';
                                                        echo '<div class="form-group">';
                                                                echo '<label class="sr-only" for="password">Password</label>';
                                                                echo '<input type="password" class="form-control" name="password" placeholder="Password" required>';
                                                        echo '</div>';
                                                        echo '<div class="form-group">';
                                                                echo '<button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>';
                                                        echo '</div>';
                                                    echo '</form>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</li>';
                                    echo '</ul>';
                                echo '</li>';
                            echo '</ul>';
                        }
                        
                    echo "</ul>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }


    public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->ci->session->set_userdata('token',$token);
		return $token;
	}
}