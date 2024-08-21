<?php

namespace App\Http\Controllers\web\sparePart;

use App\Http\Controllers\Controller;
use App\Models\sparepart;
use App\Models\device;
use Illuminate\Http\Request;

class listSparePartController extends Controller
{
    public function index (Request $request)
    {
        $listSparePart = sparepart::getAll();       
        return view('sparepart.listSparepart',['listSparePart' => $listSparePart]);
    } 

    public function NewSparePart(Request $request)
    {
        $listDevice = device::deviceAll();
        return view('sparepart.newSparePart',['listDevice' => $listDevice]);
    }

    public function saveNewSparePart(Request $request)
    {
        if($request->get('code') != null && $request->get('sparePartCode') != null
          && $request->get('sparePartName') != null && $request->get('serialNumber') != null
          && $request->get('replacementDate') != null && $request->get('numberOfStock') != null
          && $request->get('cycle') != null)
          {
            $code = $request->get('code');
            $sparePartCode = $request->get('sparePartCode');
            $sparePartName = $request->get('sparePartName');
            $serialNumber = $request->get('serialNumber');
            $replacementDate = $request->get('replacementDate');
            $numberOfStock = $request->get('numberOfStock');
            $cycle = $request->get('cycle');
            $deviceInfor = device::findOneDevice($code);
            sparepart::saveSparePart($deviceInfor[0]['deviceID'], $sparePartCode, $sparePartName, $serialNumber, $replacementDate, $numberOfStock, $cycle); 
            return redirect()->route('listSparePartView');                       
          }
    }

    public function updateTimeSparePart(Request $request)
    {
        if($request->get('sparePartID') != null && $request->get('cycle') != null
        && $request->get('replacementDate') != null)
        {
            $sparePartID = $request->get('sparePartID');   
            $cycle = $request->get('cycle');   
            $replacementDate = $request->get('replacementDate');   
            sparepart::updateSparePart($sparePartID, $cycle, $replacementDate);
            return "OK";
        }
        else
        {
            return "Error";
        }
    }

    public function editSparePart(Request $request)
    {
        if($request->get('sparePartID') != null)
        {
            $sparePartID = $request->get('sparePartID');
            $sparePartInfor =  sparepart::getSparePartByID($sparePartID);
            return view('sparePart.updateSparePart',['sparePartInfor' => $sparePartInfor[0]]);
        }
    }

    public function saveEditSparePart(Request $request)
    {
        if($request->get('code') != null && $request->get('sparePartCode') != null
        && $request->get('sparePartName') != null && $request->get('serialNumber') != null
        && $request->get('replacementDate') != null && $request->get('numberOfStock') != null
        && $request->get('cycle') != null && $request->get("sparePartID"))
        {
            $code = $request->get('code');
            $sparePartID = $request->get("sparePartID");
            $sparePartCode = $request->get('sparePartCode');
            $sparePartName = $request->get('sparePartName');
            $serialNumber = $request->get('serialNumber');
            $replacementDate = $request->get('replacementDate');
            $numberOfStock = $request->get('numberOfStock');
            $cycle = $request->get('cycle');
            $deviceInfor = device::findOneDevice($code);
            sparepart::saveEditSparePart($sparePartID, $deviceInfor[0]['deviceID'], $sparePartCode, $sparePartName, $serialNumber, $replacementDate, $numberOfStock, $cycle); 
            return redirect()->route('listSparePartView');                       
        }
    }

    public function deleteSparePart(Request $request)
    {
        if($request->get('sparePartID') != null)
        { 
            $sparePartID = $request->get('sparePartID'); 
            sparepart::deleteSparePartByID($sparePartID);
            return 'OK';
        }
        else
        {
            return 'Error';
        }
    }
}