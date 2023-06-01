<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyPostRequest;
use App\Models\CompanyModel;
use App\Models\SectorModel;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $companyModel;
    private $sectorModel;
    public function __construct()
    {
        $this->companyModel = new CompanyModel();
        $this->sectorModel = new SectorModel();
    }
    public function index(Request $request)
    {
        $title = "Master Company";
        $breadcrumb = [
            ["url"=>route("cpanel_admin.master.company.list"), "val"=>"Company"]
        ];
        $data = $this->companyModel;
        if($request->keyword){
            $data = $data->where(function($query) use($request){
                foreach ($this->companyModel->getFillable() as $item => $value) {
                    if($item==0){
                        $query = $query->where($value, 'LIKE', "%".$request->keyword."%");
                    }else{
                        $query = $query->orWhere($value, 'LIKE', "%".$request->keyword."%");
                    }
                }
            });
        }
        $data = $data->paginate(10);
        return view('cpanel_admin.pages.company.index',compact("title","breadcrumb","data"));
    }

    public function form(Request $request, $id=0)
    {
        $title = (!$id?"Add":"Edit")." Master Company";
        $breadcrumb = [
            ["url"=>route("cpanel_admin.master.company.list"), "val"=>"Company"],
            ["url"=>"#", "val"=>(!$id?"Add":"Edit")." Company"],
        ];
        $data = [];
        if($id)
            $data = $this->companyModel->find($id);
        $sector = $this->sectorModel->all();
        $modalMedia = true;
        return view('cpanel_admin.pages.company.form',compact("title","breadcrumb","data","id","sector","modalMedia"));
    }
    
    public function post(CompanyPostRequest $request, $id = 0)
    {
        $save = $id ? $this->companyModel->find($id) : $this->companyModel;
        $save->sector_id = $request->sector_id;
        $save->logo = $request->logo;
        $save->name = $request->name;
        $save->owner_name = $request->owner_name;
        if($save->save())
            return redirect()->route("cpanel_admin.master.company.list")->with("success",$id ? __("messages.update_success") : __("messages.insert_success"));
        else
            return redirect()->back()->with("error",$id ? __("messages.update_fail") : __("messages.insert_fail"));   
    }

    public function delete($id)
    {
        try {
            $save = $this->companyModel->find($id);
            if($save->delete())
                return redirect()->back()->with("success",__("messages.delete_success"));
            else
                return redirect()->back()->with("error",__("messages.delete_fail"));
        } catch (\Throwable $th) {
            return redirect()->back()->with("error",__("messages.data_relate"));
        }   
    }
}
