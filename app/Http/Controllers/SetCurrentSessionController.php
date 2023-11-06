<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SetCurrentSessionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Session $session)
    {
        if(!$session->is_current){
            $session->is_current = now();
        }
    }
}
