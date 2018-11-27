<?php
namespace App\Http\Controllers;

use Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
use App\Note;
use App\User;

class NotesController extends Controller {

	public function __construct(){
	    $this->middleware('auth');
	}

    public function show() { 
        $notes = Auth::user()->notes;
        return view('notes', ['notes' => $notes]);
    }

    public function add(Request $request) {
        $note = new Note;
        $note->note = $request->note;
        $note->user()->associate(Auth::user());
        $note->save();
		return redirect('/');
    }

    public function delete($id) {
        $notes = Auth::user()->notes->where('id', '=', $id)->first();
        $notes->delete();
    	return redirect('/');
    }

    public function patch(Request $request) {
        $id = $request->input('update_id');
        $note = $request->input('update_note');
        $req = Auth::user()->notes->where('id', '=', $id)->first();
        $req->updated_at = now();
        $req->note = $note;
        $req->update();
    	return redirect('/');
    }
}