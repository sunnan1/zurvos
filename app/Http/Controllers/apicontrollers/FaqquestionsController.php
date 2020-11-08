<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Traits\Faqtrait;
use App\models\Faqquestion;
use App\Http\Resources\FaqCollection;

class FaqquestionsController extends Controller
{
    use Faqtrait;

    public function index()
    {
         $result=$this->allquestions();

             if ($result->count() > 0) {

              return  FaqCollection::collection($result);
            
             }else{

              return response(['message' => 'Faq Questions Not Found','status' =>'error']);
           }
    }

    public function store(FaqRequest $request)
    {
         $result=$this->newquestion($request);

             if ($result == true) {

               return response(['message' => 'Question added successfully','status' =>'success']);
            
             }else{

              return response(['message' => 'Question Not added','status' =>'error']);
           }
    }

    public function updaterecord(FaqRequest $request)
    {
         $result=$this->editquestion($request);

             if ($result == true) {

               return response(['message' => 'Question Updated successfully','status' =>'success']);
            
             }else{

              return response(['message' => 'Question Not Updated','status' =>'error']);
           }
    }



    public function deleterecord(Request $request)
    {
        $data=Faqquestion::find($request->id);
        $file=$data->video;
        $filename = public_path().'/faqVideos/'.$file;
        \File::delete($filename);
        $data->delete();
    return response(['message' => 'Question Deleted successfully','status' =>'success']);
      
    }
}
