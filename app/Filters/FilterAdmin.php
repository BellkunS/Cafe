<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request,$argument = null)
    {
        if(session()->role == 'admin'){
            return redirect()->to('/dashboard');
        }

       // if(session()->role == ''){
         //   return redirect()->to('login');
       // }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response,$argument=null)
    {
       
    }
}