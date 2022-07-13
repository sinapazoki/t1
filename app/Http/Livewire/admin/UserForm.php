<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class UserForm extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;
    public $image , $first_name , $last_name , $email , $phone, $password , $user_id, $imageupdated , $role_id;

    protected $rules = [
        'first_name' => 'required|max:20',
        // 'image' => 'mimes:jpg,jpeg,png|max:1024|nullable', // 1MB Max
        'last_name' => 'required|max:20',
        'phone' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users',
        'email' => 'email|unique:users|nullable',
        'password' => 'required|min:8',
        'role_id' => 'required',

    ];
    protected $messages = [

    ];

    public $updateMode = false;


    protected function updated($input) {

        $this->validateOnly($input);

    }


    public function update()
    {

            $user = User::find($this->user_id);
            if($this->imageupdated)
            {
                $image = $this->imageupdated;
            }
            else
            {
                $image= $this->image;
            }
            $user->role()->associate($this->role_id);

            if(isset($this->password))
            {
                $user->update([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'password' => bcrypt($this->password),
                    'image' => $image,
                ]);
            }
            else
            {
                $user->update([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'phone' => $this->phone,
                    'email' => $this->email,
                    'image' => $image,
                ]);
            }

            $this->updateMode = false;
            $this->alert('success', 'تغییرات با موفقیت ثبت شد', [
                'position' => 'center'
            ]);
            $this->resetInputFields();


    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->resetValidation();
        $user = User::where('id',$id)->first();
        $this->user_id = $id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->role_id = $user->role_id;
        $this->image = $user->image;
    }
    
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function removeimage()
    {
        $this->image = '';
    }

    public function store() {
        $this->validate();
        $user = new User();
        $user->image = $this->image;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->phone = $this->phone;
        $user->password = bcrypt($this->password);
        $user->email = $this->email;
        $user->role_id = $this->role_id;
        $user->save();
        $this->alert('success', 'ثبت نام با موفقیت انجام شد .', [
            'position' => 'center'
        ]);
        $this->resetInputFields();
     }


    public function delete($id)
    {
       User::find($id)->delete();
       $this->resetInputFields();
       $this->alert('warning', 'کاربر مورد نظر حذف شد', [
        'position' => 'center'
    ]);

   }


   public function status($id)
   {
       $user = User::find($id);

       if($user->status == 1){
           $user->status = '0';
       }
           elseif ($user->status == 0)
           {
           $user->status = '1';
           }

       $user->save();
      }


      private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->phone = '';
        $this->password = '';
        $this->role_id = '';
        $this->email = '';
        $this->image = '';
    }



    public function render()
    {
        return view('livewire.admin.users.user-form' ,[
            'users' => User::all() ,
            'roles' => Role::all() ,

        ]);
    }

}
