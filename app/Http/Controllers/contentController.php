<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contentController extends Controller
{
    // View will be added

    public function getAbout(){
        return view('contents.about');
    }
    public function getContact(){
        return view('contents.contact');
    }
    public function getFaqs(){
        return "this is frequently asked questions";
    }
    public function getTerms(){
        return view('contents.terms');
    }
    public function getPolicy(){
        return "Learn about all our policies";
    }
    public function getHelp(){
        return "How can we help you";
    }
}
