<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wishlist()
    {
        $wishlist = $this->orders()->where('status', 'wishlist')->first();
        if($wishlist == null) {
            $this->create_cart_or_wishlist('wishlist');
        }
        return $wishlist;
    }

    public function cart()
    {
        //выводит корзину в виде объекта Order,так легче
        $cart = $this->orders()->where('status', 'cart')->first();
        if($cart == null) {
            $this->create_cart_or_wishlist('cart');
        }
        return $cart;
    }

    public function create_cart_or_wishlist(string $cart_or_wishlist)
    {
        //этот метод нам нужен на случай если у юзера не будет корзины или желаемого
        //Чтобы сразу содать и вывести эти ордеры
        $this->orders()->create([
            'status' => 'cart',
        ]);


        return $this->orders()->where('status', $cart_or_wishlist)->first();
    }
}
