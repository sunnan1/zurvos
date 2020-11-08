<?php
namespace App\Traits;
use App\models\Faqquestion;
trait Faqtrait
{

	public function allquestions(){

		return Faqquestion::all();
	}
        // add new question
        public function newquestion($request){

    	    	$faq=new Faqquestion();
    	        $faq->type = $request->type;
    	        $faq->question = $request->question;       
    	        $faq->answer = $request->answer;

    	        if($request->hasFile('video')){
    	          $extension=$request->video->extension();
    	          $filename=time()."_.".$extension;
    	          $request->video->move(public_path('faqVideos'),$filename);
    	          $faq->video=$filename;
    	        }

    	        $result=$faq->save();
                
    	        if ($result) {
    	             
    	             return true;
    	        }

        }

    public function editquestion($request){


    	$faq=Faqquestion::find($request->id);
    	$faq->type = $request->type;
    	$faq->question = $request->question;       
    	$faq->answer = $request->answer;

    	if($request->hasFile('video')){

    	    $fileName=$faq->video;
    	    $filenamePath = public_path().'/faqVideos/'.$fileName;
    	    \File::delete($filenamePath);
    	    $faq->delete();

    	  $extension=$request->video->extension();
    	  $filename=time()."_.".$extension;
    	  $request->video->move(public_path('faqVideos'),$filename);
    	  $faq->video=$filename;
    	}

    	$result=$faq->save();

    	if ($result) {
    	             
    	    return true;
    	}
    }    


}
