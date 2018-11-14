<?php

namespace App\Modules\Company\Http\Controllers;

use App\Http\Controllers\BaiscController;
use App\Model\Employ;
use App\Model\Menus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LoginController extends BaiscController
{
    public function companyLogin(Request $request)
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3QiLCJpYXQiOjE1NDIxNjU3ODUsImV4cCI6MTU0MjE2OTM4NSwibmJmIjoxNTQyMTY1Nzg1LCJqdGkiOiJFVHE1QlVNNjFCVGxLU25TIiwic3ViIjo1LCJwcnYiOiJiYzllODM3OWViMjI1OTQ3NjA1MDNjYTIyYmNhZjI3YzNhMWE4NjY5IiwiMCI6eyJjb21wYW55X2lkIjoxMn19.9XfkVWtyvEpmokNVy3wwxahjgyY-svwigUwa_Tdcjd8';
        $payload = auth('employ')->payload();
        dd($payload->get('sub'));

       // base64_decode($token);
    }

}
