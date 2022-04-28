<?php

namespace App\Http\Controllers\Api;

use App\Events\LocationStoreEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\MainControllerRequest;
use App\Http\Resources\AddressesCollection;
use App\Models\Address;
use App\Models\Region;
use App\Services\GeoCodingHandler\GeoCodingHandlerinterface;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function findOutLocation(
        MainControllerRequest $request,
        GeoCodingHandlerinterface $geoCodingHandler
    ) {
        $response = $geoCodingHandler
            ->getLocationData($request->latitude, $request->longitude);
        event(new LocationStoreEvent($response, $request->latitude, $request->longitude));
        return response($response, 200);
    }

    public function index()
    {
        return AddressesCollection::collection(Address::all());
    }

    public function show($id)
    {
        $region = Region::find($id);
        return AddressesCollection::collection($region->addresses()->get());
    }
}
