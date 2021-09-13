<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserFeedbackController extends Controller
{


    public function index($feedback){
       // $MessageFeedback= User::getFeedbacks();
        $UserFeedback=Feedback::find($feedback);
        //dd($UserFeedback);
        return view('admin.cardFeedback',compact('UserFeedback'));
    }

    public function feedbackforms(){
        return view('feedback.index');
    }

    public function view($UserFeedback)
    {
        $feedback =app(Feedback::class);
        //Feedback::table('feedback')->where('id',$UserFeedback)->update(['viewed' => 1]);
        $feedback->where('id',$UserFeedback)->update([
            'viewed' => 1
        ]);
        return redirect()
            ->back()
            ->with('success', 'Сообщение #' . $feedback->id . ' было успешно просмотрено');
    }
    public function destroy($UserFeedback)
    {
        $feedback =app(Feedback::class);
        $feedback->where('id',$UserFeedback)->delete([
            'viewed' => 1
        ]);

        Storage::delete($feedback->file);

        return redirect()
            ->route('feedbacks')
            ->with('success', 'Сообщение #' . $feedback->id . ' было успешно удалено');
    }

}
