<?php

namespace App\Traits;

trait CompanyControllerMethods 
{
    public function checkIfLoggedIn() 
    {
        // Implementation of the method, similar to CompanyController
        if (!session()->has('isAdmin')) {
            return redirect()->route('login.form')->send();
        }
    }
}
