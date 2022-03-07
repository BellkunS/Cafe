<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterManager implements FilterInterface
{
    public function before(RequestInterface $request,$argument = null)
    {
        if(session()->role == ''){
            return redirect()->to('login');
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response,$argument=null)
    {
        if(session()->role == 'manager'){
            return redirect()->to('/dashboard');
        }
    }
}