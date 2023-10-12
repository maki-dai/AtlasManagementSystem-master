<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

use App\Models\Users\User;

class Subjects extends Model
{
    const UPDATED_AT = null;


    protected $fillable = [
        'subject'
    ];

    public function users(){
<<<<<<< HEAD
        return $this->belongsToMany('App\Models\Users','subject_users','subject_id','user_id');// リレーションの定義
=======
        return;// リレーションの定義
>>>>>>> parent of fe68fac (SubjectとUserのリレーションまで完了)
    }
}