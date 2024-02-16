<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {

    public function rules() {
        return [
            'title'       => 'required|max:191',
            'description' => 'required|max:191',
            'admin_id'    => 'required|exists:admins,id',
            'user_id'     => 'required|exists:users,id',
        ];
    }

}
