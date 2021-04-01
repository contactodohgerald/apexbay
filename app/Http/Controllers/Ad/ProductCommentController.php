<?php

namespace App\Http\Controllers\Ad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\Generics;
use App\Models\ProductComment;
use App\Models\CvComment;
use Illuminate\Support\Facades\Auth;
use Exception;

class ProductCommentController extends Controller
{
    //
    Use Generics;

    protected function Validator($request)
    {

        $this->validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);
    }

    public function storeProductComment(Request $request, $product_id = null){
        $data = $request->all();

        try {
            $this->Validator($request); //validate fields

            $unique_id = $this->createUniqueId('product_comments', 'unique_id');

            $product_comment = new ProductComment();
            $product_comment->unique_id = $unique_id;
            $product_comment->user_unique_id =  Auth::user()->unique_id;
            $product_comment->product_unique_id = $product_id;
            $product_comment->comment = $data['comment'];

            if ($product_comment->save()) {
                return redirect()->back()->with('success', 'Comment was  Successfully posted');
            } else {
                return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return redirect()->back()->with('error', $errorsArray);
        }

    }

    public function storeCvComment(Request $request, $cv_id = null){
        $data = $request->all();

        try {
            $this->Validator($request); //validate fields

            $unique_id = $this->createUniqueId('cv_comments', 'unique_id');

            $cv_comment = new CvComment();
            $cv_comment->unique_id = $unique_id;
            $cv_comment->user_unique_id =  Auth::user()->unique_id;
            $cv_comment->cv_unique_id = $cv_id;
            $cv_comment->comment = $data['comment'];

            if ($cv_comment->save()) {
                return redirect()->back()->with('success', 'Comment was  Successfully posted');
            } else {
                return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return redirect()->back()->with('error', $errorsArray);
        }

    }
}
