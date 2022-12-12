<?php

namespace App\Http\Controllers;


use App\Services\HorasService;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function getHorasNoturnas(Request $request) {
        $inicio = $request->inicio;
        $fim = $request->fim;
        
        $horasService = new HorasService();
        return $horasService->horasService($inicio, $fim);
       
         
    }
}
