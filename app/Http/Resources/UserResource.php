<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $auth_params;
    
    public function auth($value){
        $this->auth_params = $value;
        return $this;
    }

    public function toArray($request)
    {
        // dd($request);
        // dd($this);
        return [
          'id' => $this->id,
          'name' => $this->name,
          'email' => $this->email,
          'employee' => new EmployeeResource($this->employee),
          'roles' => RoleResource::collection($this->roles),
          'auth_params' => $this->auth_params
        ];
    }
}
