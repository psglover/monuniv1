<?php
namespace App\Filters;
use \CodeIgniter\Filters\FilterInterface;
use \CodeIgniter\HTTP\RequestInterface;
use \CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface{
    public function before(RequestInterface $request, $arguments= null){
        if(!session()->has('est_connecter')){
            return redirect()->to(base_url('public/connexion')); 
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
;
    }

}