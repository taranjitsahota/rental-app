<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;

class UserImport implements ToCollection , ToModel
{
    private $current = 0;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
    }
    public function model(array $row)
    {
        $this->current++;
        if($this->current > 1){
            // dd($row);
            $count = User::where('email','=',$row[1])->count();
            if(empty($count)){

                $user = new User;
                $user->email = $row[1];
                $user->password = $row[3];
                $user->save();
            }
        }
        
    }
}
