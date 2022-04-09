<?php

namespace App\Http\Controllers;
use Validator;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    function list()
    {
        return Device::all();

    }
    function single_data($id)
    {
        return Device::find($id);
    }
    function find_data_optional($id =null)
    {
        return $id?Device::find($id):Device::all();
    }
    // function find_data_withparam($id =null)
    // {
    //     return Device::find($id);
    // }

    function add(Request $req)
    {
        $device =new Device;
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if($result)
        {
            return ["Result" =>"Data has been saved"];
        }
        else
        {
            return ["Result" =>"Operation failed"];
        }
    }

    function update(Request $req)
    {
        $device =Device::find($req->id);
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if($result)
        {
            return ["Result" =>"Data has been updated"];
        }
        else
        {
            return ["Result" =>"Operation failed"];
        }
    }

    function search($name)
    {
        // return Device::where("name",$name)->get();
        return Device::where("name","like","%".$name."%")->get();
    }

    function delete($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if($result)
        {
            return ["Result" =>"Record has been deleted"];
        }
        else
        {
            return ["Result" =>"Operation failed"];
        }
    }

    function add_form_validation(Request $req)
    {
        $rules = array(
            "member_id"=>"required|min:2|max:4"
        );
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails())
        {
            // return $validator->errors();
            return responce()->json($validator->errors(),401);

        }
        else{

            $device =new Device;
            $device->name = $req->name;
            $device->member_id = $req->member_id;
            $result = $device->save();
            if($result)
            {
                return ["Result" =>"Data has been updated"];
            }
            else
            {
                return ["Result" =>"Operation failed"];
            }
        }
    }


}
