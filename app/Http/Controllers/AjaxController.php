<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function eliminar_alumno(Request $request)
    {

        if ($request->ajax()) {
            if (empty($request->id) ) {
                return response()->json(['status' => 3], 200);
            }
            $alumno = Alumno::where('id', '=', $request->id)
                ->get();
            if (count($alumno) > 0) {
                $alumno[0]->flestado = 0;
                $alumno[0]->save();
            }else{
                return response()->json(['status' => 1, 'msg' => 'No se encontró al alumno'], 200);
            } 
            return response()->json(['status' => 1, 'msg' => 'El alumno fue eliminado'], 200);
        } else {
            abort(404);
        }
    }
}
