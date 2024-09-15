<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingSupplier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Services\PoNumberGenerator;
use App\Models\PoTransport;
use App\Services\Helpers;
use DateTime;

class SettingSupplierController extends Controller
{
    //

    public function getSupplierById(Request $request): JsonResponse
    {
        // dd($request->id);
        $data = SettingSupplier::where("type", $request->id)->get();

        // dd($data);

        return response()->json($data, Response::HTTP_OK);
    }


    public function generatePoNumber(Request $request): JsonResponse
    {
        $prefix = $request->type . "-" . $request->code;

        // echo $prefix;

        $dataSS = SettingSupplier::where("code", $request->code)->first();

        $dataPoTransport = PoTransport::select('po_number')
            ->where("type", $request->type)
            ->where("po_number", "like", '%' . $prefix . '%')
            ->where("po_date", new DateTime())
            ->orderBy("po_number", "DESC")
            ->limit(1)->get();

        // dd($dataPoTransport->items[0]);
        // dump($dataPoTransport);

        if ($dataPoTransport->isEmpty()) {
            $numericPart = "0000";
        } else {
            $parts = explode('/', $dataPoTransport[0]->po_number);
            $numericPart = $parts[0]; // '0001'
        }
        // The first part contains the numeric value

        // dd($numericPart);

        $newPoNumber = Helpers::generatePoNumber($numericPart, $dataSS->format);
        return response()->json($newPoNumber, Response::HTTP_OK);
    }
}
