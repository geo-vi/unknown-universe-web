<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    /** instantiates the controller, defines required middlewares  **/
    public function __construct()
    {
        /* middleware 'auth' defines that the user has to be logged in to view the pages. */
        $this->middleware('auth');
    }

    public function index() {
        return view('internal.start.index');
    }
}
