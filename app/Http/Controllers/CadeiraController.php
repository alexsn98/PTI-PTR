<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cadeira;

class CadeiraController extends Controller
{
    public function getCadeira($id) {
        $cadeira = Cadeira::find($id);
        $turmas = Cadeira::find($id)->turmas;

        return view('cadeira')->with(['cadeira' => $cadeira,
                                    'turmas' => $turmas]);
    }
}
