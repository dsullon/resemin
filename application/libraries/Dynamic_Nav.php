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
        echo '<nav>';
            echo '<div class="nav-wrapper container">';
                echo '<a href="#" class="brand-logo">Logo</a>';
                echo '<ul id="nav-mobile" class="right hide-on-med-and-down">';
                if($content){
                    $result = json_decode(file_get_contents($url_service),true);
                    foreach ($result['response'] as $opcion) {
                        if($opcion['visible']){
                            echo "<li><a href=".base_url()."pagina/view/" . $opcion['pageId'] . ">" . $opcion['name'] . "</a></li>";   
                        }
                    }
                }
                if(!$this->ci->session->userdata('usuario')){
                    echo "<li><a href='#modalLogin' class='modal-trigger'><i class='material-icons'>perm_identity</i></a></li>";
                }
                
                echo '</ul>';                              
            echo '</div>';
        echo '</nav>';
    }


    public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->ci->session->set_userdata('token',$token);
		return $token;
	}
}