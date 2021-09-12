<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class Search extends Controller
{
    public function search(Request $request) {
        // Prends la chaine de caractère et renvoie un tableau de string
        $searchValues = preg_split('/\s+/', $request->search, -1, PREG_SPLIT_NO_EMPTY);

        // Boucler sur le tableau de string et renvoyer les resultats trouvés
        $notes = Note::where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
                $q->orWhere('title', 'LIKE', "%" . $value . "%");
            }
        })->get();
        return response()->json($notes);
    }
}
