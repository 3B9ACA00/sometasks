<?php

/*
orders
- id
- manager_id

managers
- id
- firstName
- lastName
*/


class Order extends Model
{
    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    
    public static function getOrdersWithManagers($limit = 50): Collection
    {
        return self::with('manager')->limit($limit)->get();
    }
}

class Manager extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getFullNameAttribute()
    {
        return $this->firstName . " " . $this->lastName;
    }
}

// пример
$orders = Order::getOrdersWithManagers();

foreach ($orders as $order) {
    //$order->manager->full_name;
}