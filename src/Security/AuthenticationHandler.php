<?php
/**
 * Created by PhpStorm.
 * User: Vanessa
 * Date: 26/07/2018
 * Time: 17:34
 */

namespace App\Security;

use App\Entity\FuncaoColaborador;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class AuthenticationHandler implements  AuthenticationSuccessHandlerInterface {
    protected $container;

    public function __construct( $container ) {
        $this->container = $container;
    }

    public function onAuthenticationSuccess( Request $request, TokenInterface $token ) {
        $url = '/';
        $usuario = $token->getUser();

        if( $usuario && $usuario->getColaborador() &&
            $usuario->getColaborador()->getFuncao() == FuncaoColaborador::PROFESSOR)
        {
            $url = $this->container->get('router')->generate('diarioClasse_list');

        }

        return new RedirectResponse( $url );
    }
}