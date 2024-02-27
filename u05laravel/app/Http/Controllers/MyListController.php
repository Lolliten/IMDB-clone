<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\MyList;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyListController extends Controller
{
    /*
     * Display the specified resource.
     */
    public function show()
    {
        $user_id = Auth::user()->id; //Auth kommer gå genom middleware sen
        $myList = MyList::where('user_id', $user_id)->first();
        $movies = $myList->movies()->get();

        if (!$myList) {
            return abort(404); //Ändra till om listan är tom gå och lägg till filmer
        }
        return view('mylist', ['myList' => $myList, 'movies' => $movies]);
    }
}