<?php

namespace App\Http\Controllers\CVs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cv;
use App\Models\CvCategory;
use App\Traits\Generics;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CVControllerHandler extends Controller
{
    //
    Use Generics;
    function __construct(
        CvCategory $cvCategory, Cv $cv
        ){
        $this->cvCategory = $cvCategory;
        $this->cv = $cv;
    } 

    public function createCvCategory(){
        return view('admin_dashboard.cv_category');
    }  

    public function allCvCategory(){
        $cvCategory = $this->cvCategory->getAllCvCategory([
            ['status', '=', 'confirm'],
        ]);
        return view('admin_dashboard.list_cv_category', ['cvCategory'=>$cvCategory]);
    } 

    public function singleCvCategory($unique_id = null){

        if($unique_id != null){
            $cvCategory = $this->cvCategory->getSingleCvCategory([
                ['unique_id', '=', $unique_id],
            ]);
            return view('admin_dashboard.edit_cv_category', ['cvCategory'=>$cvCategory]);
        }else{
            exit(404);
        }
    }

    protected function Validator($request)
    {

        $this->validator = Validator::make($request->all(), [
            'category_title' => 'required',
            'description' => 'required',
        ]);
    }

    public function storeCvCategory(Request $request){
        $data = $request->all();

        try {
            $this->Validator($request); //validate fields

            $unique_id = $this->createUniqueId('cv_categories', 'unique_id');

            $cvCategory = new CvCategory();
            $cvCategory->unique_id = $unique_id;
            $cvCategory->cv_category_title = $data['category_title'];
            $cvCategory->cv_desc = $data['description'];

            if ($cvCategory->save()) {
                return redirect('/create-cv-category')->with('success', 'Cv Category Was Successfully Created');
            } else {
                return redirect('/create-cv-category')->with('error', 'An Error occurred, Please try Again Later');
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect('/create-cv-category')->with('error', $errorsArray);
        }

    }

    protected function Validators($request)
    {

        $this->validator = Validator::make($request->all(), [
            'category_title' => 'required',
            'description' => 'required',
        ]);
    }

    public function updateCvCategory(Request $request, $unique_id = null){
        $data = $request->all();

        try {
            $this->Validators($request); //validate fields

            if($unique_id != null){
                $cvCategory = $this->cvCategory->getSingleCvCategory([
                    ['unique_id', '=', $unique_id],
                ]);
                
                $cvCategory->cv_category_title = $data['category_title'];
                $cvCategory->cv_desc = $data['description'];

                if ($cvCategory->save()) {
                    return redirect()->back()->with('success', 'Cv Category Was Successfully Updated');
                } else {
                    return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
                }
            }else{
                exit(404);
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect()->back()->with('error', $errorsArray);
        }

    }
}
