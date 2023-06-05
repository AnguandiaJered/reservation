<?php

namespace Modules\Auth\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $data = $this->resource->toArray();
        
        $data = array_merge($data,$this->getRoles());

        $data = array_merge($data,[
            'unreadNotificationsCount' => $this->unreadNotifications->count(),
            // 'unreadNotifications' => $this->unreadNotifications
        ]);

        return $data;
    }

    public function getRoles(): array
    {
        return [
            'roles' => $this->getRoleNames(),
            'permissions' => $this->getAllPermissions()->pluck('name')
        ];
    }
}
