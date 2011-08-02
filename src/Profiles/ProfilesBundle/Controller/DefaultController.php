<?php

namespace Profiles\ProfilesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProfilesBundle:Default:index.html.twig');
    }
    
    public function friendsAction()
    {
        $facebook = $this->get("facebook");
        
        $me = $facebook->api("/me");
        
        $friends = $facebook->api(array(
            "query" => "SELECT uid, name, pic_square FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())",
            "method" => "fql.query"
        ));
        
        return $this->render('ProfilesBundle:Default:friends.html.twig', array('me' => $me, 'friends' => $friends));
    }
}
