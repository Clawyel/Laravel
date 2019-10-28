<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\kategorilerInterface;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    protected $objInterface;
    public function __construct(kategorilerInterface $kategoriler)
    {
        $this->objInterface = $kategoriler;
    }
    public function fetchAll()
    {
        $obj = $this->objInterface->fetchAll();
        return $obj;
    }
    public function getById()
    {
        $obj = $this->objInterface->getById(request('id'));
        return $obj;
    }
    public function create()
    {
        $this->validate(request(),
            ["baslik" => "required"]);
        $newObj = $this->objInterface->create(request('baslik'));
        if($newObj)
        {
            return response()->json([
                'status' => 200,
                'message' => 'Success.'
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }
    }
    public function update()
    {

        $this->validate(request(),
            ["id" => "required"]);
        if(request('id') > 0)
        {
            $updateObj = $this->objInterface->update(request('id'),request('baslik'));
            if($updateObj)
            {
                return response()->json([
                    'status' => 200,
                    'message' => 'Success.'
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'Failed.'
                ]);
            }
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }

    }
    public function delete()
    {
        $this->validate(request(),
            ["id" => "required"]);
        if(request('id') > 0)
        {
            $deleteObj = $this->objInterface->delete(request('id'));
            if($deleteObj)
            {
                return response()->json([
                    'status' => 200,
                    'message' => 'Success.'
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'Failed.'
                ]);
            }
        }
        else
        {
            return response()->json([
                'message' => 'Failed.'
            ]);
        }
    }
}
