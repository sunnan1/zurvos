<?php
namespace App\Traits;
use DB;
use App\models\Feedback;

trait Feedbacktrait
{
    public function userFeedback(){
      
        return DB::table('customers')
               ->join('feedbacks','customers.id','=','feedbacks.customer_id')
               ->select('feedbacks.*','customers.full_name','customers.street_address')->get();
    }

    public function deleteFeedback($id){

    	$found=Feedback::find($id);

    	if ($found) {
    		
    		$result=$found->delete();

    		if ($result) {
    			
    			return true;
    		}else{

    			return false;
    		}
    	}else{
    		return false;
    	}
    	
    }
}
