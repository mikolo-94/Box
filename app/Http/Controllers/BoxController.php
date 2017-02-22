<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Box;


use App\Http\Requests;
use App\Http\Requests\StoreBox;


class BoxController extends Controller
{
    //laddar alla boxar från db
    public function index() {

        $boxes = Box::all();
        $totalWeight = Box::sum('weight'); //summan av alla värden i kolumnen 'weight'
        $totalCost = Box::sum('shipping_cost'); //summan av alla värden i kolumnen 'shipping_cost'

        //om javascript använts borde det skickas med json
        return view('index', ['boxes' => $boxes, 'totalWeight' => $totalWeight, 'totalCost' => $totalCost]);

    }

    //sparar validerad data till db
    public function store(StoreBox $request) {

        try {
            //Använder inget default värde då validering redan skett och inget annat case är möjligt
            switch ($request->destination) {
                case "Sweden":
                    $cost = $request->weight * 1.3;
                    break;
                case "China":
                    $cost = $request->weight * 4;
                    break;
                case "Brazil":
                    $cost = $request->weight * 8.6;
                    break;
                case "Australia":
                    $cost = $request->weight * 7.2;
                    break;
            }

            $box = new Box;
            $box->receiver = $request->name;
            $box->weight = $request->weight;
            $box->box_color = $request->boxColor;
            $box->destination = $request->destination;
            $box->shipping_cost = $cost; //sparar kostnaden i databasen ifall att 'multipliers' ändras i framtiden
            $box->save();

            if(!$box)
            {
                throw new Exception("Something went wrong");
            }

            //Box skapas och retuneras som json, kod 201 skickas
            return response()->json(['result' => 'Success, box was created', 'data' => $box], 201);

        } catch (Exception $e) {

            //Om skapandet misslyckas skickas error 500 då felet är vårt. Är det error 400 skickas den av StoreBox-klassen
            return response()->json(['result' => $e->getMessage()], 500);
        }

    }
}
