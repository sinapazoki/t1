<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Email;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Emailnotifyform extends Component
{
    use LivewireAlert;

    public $email;

    protected $rules = [
        'email' => 'required|unique:emails',
    ];
    protected $messages = [
        'email.required' => 'وارد کردن ایمیل الزامی میباشد' ,
    ];
    public function render()
    {
        return view('livewire.emailnotifyform');
    }

    protected function updated($input) {

        $this->validateOnly($input);

    }
    private function resetInputFields(){
        $this->email = '';
    }
    public function store() {

        $this->validate();
        Email::create([
            'email' => $this->email,

        ]);

        $this->alert('success', 'ایمیل شما با موفقیت ثبت شد');

        $this->resetInputFields();

    }
}
