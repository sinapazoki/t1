<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MenuForm extends Component
{
    use LivewireAlert;

    public $iteration = 0;

    public $url , $menu_id, $name , $parent_id ;

    protected $rules = [
        'name' => 'required|max:40',
        'url' => 'required',

    ];
    protected $messages = [

    ];


    public function updateMenuOrder($items)
    {
        foreach($items as $item)
        {
            Menu::find( $item['value'] )->update(['order' => $item['order']]);
        }
        $this->alert('success', 'تغییرات با موفقیت انجام شد', [
            'position' => 'center'
        ]);
    }
    
    public $updateMode = false;
    protected function updated($input) {

        $this->validateOnly($input);

    }


    public function store() {
        $this->validate();
        try {
            $menu = new Menu();
            $menu->url = $this->url;
            $menu->name = $this->name;
            $menu->parent_id = $this->parent_id ? $this->parent_id : null;
            $menu->save();
            $this->alert('success', 'ایجاد منو با موفقیت انجام شد', [
                'position' => 'center'
            ]);
            $this->resetInputFields();
            $this->iteration++;
            $this->emit('reset');


          } catch (\Exception $e) {
          
            $this->alert('warning', 'خطایی در هنگام ارسال اطلاعات رخ داده است', [
                'position' => 'center'
            ]);
          }     
         
     }

     private function resetInputFields(){
        $this->url = '';
        $this->name = '';
        $this->parent_id = '';
        $this->order = '';

    }
    


    public function delete($id)
    {
       

        $menus = Menu::where('parent_id' , $id)->get();
        if(count($menus) > 0)
        {
            foreach($menus as $menu){
                $menu->update([
                    'parent_id' => null,
                ]);
            }
        }
        $remove_menu = Menu::find($id);
        $remove_menu->delete();


        $this->resetInputFields();
        $this->alert('warning', 'دسته مورد نظر حذف شد', [
        'position' => 'center'
    ]);

   }

   public function edit($id)
   {
       $this->updateMode = true;
       $this->resetValidation();
       $menu = Menu::where('id',$id)->first();
       $this->menu_id = $id;
       $this->name = $menu->name;
       $this->url = $menu->url;
       $this->parent_id = $menu->parent_id;
   }

   public function update()
   {

           $menu = Menu::find($this->menu_id);
           
            $menu->update([
                'url' => $this->url,
                'name' => $this->name,
                'parent_id' => $this->parent_id,
            ]);
         
           $this->updateMode = false;
           $this->alert('success', 'تغییرات با موفقیت ثبت شد', [
               'position' => 'center'
           ]);
           $this->resetInputFields();
           $this->emit('reset');


   }


   public function cancel()
   {
       $this->updateMode = false;
       $this->resetInputFields();
       $this->emit('reset');

   }

   public function status($id)
   {
       $menu = Menu::find($id);

       if($menu->status == 1){
           $menu->status = '0';
       }
           elseif ($menu->status == 0)
           {
           $menu->status = '1';
           }

       $menu->save();
      }



    public function render()
    {
        return view('livewire.admin.menu.menu-form' ,[
            'menus' => Menu::orderBy('order','ASC')->get(),
            'parents' => Menu::where('parent_id' , null)->get(),

        ]);
    }
}

