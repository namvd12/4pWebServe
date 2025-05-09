<?php

namespace App\Http\Controllers\web\categories;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\device;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function saveNewCategories(Request $request)
    {
        $response['status'] = "Error";
        if($request->get('name') != null && $request->get('action') != null &&
        $request->get('status') != null)
        {
            $nameCategories = $request->get('name');
            $actionCategories = $request->get('action');
            $statusCategories = $request->get('status');
            $description = $request->get('description');
            $listCodeDevice = $request->get('listCodeDevice');
            
            //save new categories
            $catID = categories::addNewCategories($nameCategories, $actionCategories, $statusCategories, $description);
            if((int)$catID < 0)
            {
                $response['status'] = "Duplicate category";
                return $response;
            }
            // save categories in devices
            if($listCodeDevice  != null)
            {
                foreach($listCodeDevice as $deviceCode)
                {
                    device::editCategoriOnDeviceByCode($deviceCode, $catID);
                }
            }
            $response['status'] = "OK";
        }
        return $response;
    }

    public function editNewCategories(Request $request)
    {
        $response['status'] = "Error";
        if($request->get('id') != null && $request->get('name') != null && $request->get('action') != null &&
        $request->get('status') != null)
        {
            $catID = $request->get('id');
            $nameCategories = $request->get('name');
            $actionCategories = $request->get('action');
            $statusCategories = $request->get('status');
            $description = $request->get('description');
            $listCodeDevice = $request->get('listCodeDevice');
            
            //save new categories
            categories::editCategories($catID, $nameCategories, $actionCategories, $statusCategories, $description);
            // save categories in devices
            // clear old category
            device::deleteCatOnDevice($catID);
            if($listCodeDevice  != null)
            {
                foreach($listCodeDevice as $deviceCode)
                {
                    device::editCategoriOnDeviceByCode($deviceCode, $catID);
                }
            }
            $response['status'] = "OK";
        }
        return $response;
    }

    public function deleteCategory(Request $request) {
        $response['status'] = "Error";
        if($request->get('categoryID') != null)
        {
            $id = $request->get('categoryID');
            categories::deleteByID($id);
            device::deleteCatOnDevice($id);
            $response['status'] = "OK";           
        }
        return $response;
    }

    public function editCategory(Request $request)
    {
        $response['status'] = "Error";
        if($request->get('categoryID') != null)
        {
            $id = $request->get('categoryID');
            $cat = categories::getCategoryByID($id);
            
            $listDevice = device::getListdeviceByCategory($id);   
            return view('user.categoriesEditTab',['category' => $cat,
            'listDevice' => $listDevice]); 
        }
        return $response;
    }
}