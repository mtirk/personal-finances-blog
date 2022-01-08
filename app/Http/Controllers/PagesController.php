<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

    public function getIndex() {
        #process variable data or params
        #talk to the model
        #recieve from the model
        #compile or process data from the model if needed
        #pass the data to the correct view
        return view('pages\welcome');
    }
}