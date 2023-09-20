<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Country;
use App\Traits\CompanyControllerMethods; // traits for checkIfLoggedIn method to include in all controllers 


class SearchController extends Controller
{
    use CompanyControllerMethods; // must include this for traits 

 

    public function search(Request $request)
    {
        // пристап до методот checkIfLoggedIn
        $this->checkIfLoggedIn();


        $search = $request->input('search');

        $companies = Company::where('companies.name', 'like', '%' . $search . '%')
        ->join('countries', 'companies.country_id', '=', 'countries.id')
        ->select('companies.*', 'countries.name as countryname')
        ->get(); // mora vaka bidejki ne mi go listase country, poso imam relacija megu niv 

        $countries = Country::all(); // za da mi go lista country 

        return view('company.index', compact('companies', 'search', 'countries'));
    }

}
