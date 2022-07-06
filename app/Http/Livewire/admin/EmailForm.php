<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\EmailNotify;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class EmailForm extends Component
{
    public $title , $text , $email_id = [] , $time;
    use LivewireAlert;
    use WithPagination;


    protected $rules = [
        'title' => 'required|max:50',
        'text' => 'required',
        'email_id' => 'required',
        'time' => 'required',

    ];

    protected $messages = [
        'email_id.required' => 'انتخاب حداقل یک ایمیل الزامی است'
    ];

    protected function updated($input) {

        $this->validateOnly($input);

    }

    public function delete($id)
    {
        DB::table('emails')->where('id' , $id)->delete();
       $this->alert('warning', 'ایمیل مورد نظر حذف شد', [
        'position' => 'center'
    ]);

   }

   public function deletecron($order)
   {
        DB::table('email_notifies')->where('order' , $order)->delete();
        $this->alert('warning', 'ایمیل مورد نظر حذف شد', [
        'position' => 'center'
        ]);
   }


   public function SendEmailNotifies()
   {
       $this->validate();
       $emails = $this->email_id;
       $title = $this->title;
       $text = $this->text;
       $time = $this->time;
       $year = substr($time,0,4);
       $month = substr($time,5,2);
       $day = substr($time,8,2);

       $jDate = \Morilog\Jalali\CalendarUtils::toGregorian($year ,  $month, $day);
        $data =  implode("-", $jDate) ;
        $order = rand('0','900000');
        // dd($month);
       foreach ($emails as $key => $email_value) {
           $devicesS[] = EmailNotify::create( [
               'address' => $email_value,
               'title' => $title,
               'text' => $text,
               'status' => '1',
               'email_send_at' => $data,
               'order' => $order,
           ]);
       } 
       $this->alert('success', 'ایمیل ها وارد صف ارسال شدند', [
        'position' => 'center'
    ]);
    $this->resetInputFields();
  }


  private function resetInputFields(){
    $this->title = '';
    $this->text = '';
    $this->email_id = '';
    $this->time = '';

}
    public function render()
    {
        return view('livewire.admin.email.email-form' ,[
            'emails' => DB::table('emails')->paginate(4)  ,
            'email_lists' => DB::table('emails')->get() ,
            'crons' => DB::table('email_notifies')->get()->groupBy('order')  ,

        ]);
    }
}
