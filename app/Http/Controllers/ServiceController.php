<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function addService()
    {
        return view('admin.service.add');
    }

    public function newService(Request $request)
    {
        Service::saveService($request);
        return redirect()->back()->with('message','Service Created Successfully');
    }
    public function manageService()
    {
        return view('admin.service.manage',[
            'services'=>Service::all(),
        ]);
    }
    public function editService($id)
    {
        return view('admin.service.edit',[
            'service'=>Service::find($id),
        ]);
    }
    public function updateService(Request $request,$id)
    {
        Service::updateService($request,$id);
        return redirect('/manage-service')->with('message','Service Updated Successfully');
    }
    public function deleteService($id)
    {
        Service::deleteService($id);
        return redirect('/manage-service')->with('message','Service Deleted Successfully');
    }
    public function serviceDetails($id)
    {

        return view('admin.service.details',[
            'service'=>Service::find($id)]
        );
    }
    public function changeServiceStatus($id)
    {

        $service = Service::find($id);
        $service->status = $service->status ==1? '0':'1';
        $service->save();
        return redirect('/manage-service')->with('message','Service Status Change Successfully');
    }

}
