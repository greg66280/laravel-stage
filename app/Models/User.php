<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public static function hasUser($email) {
        return self::where("email", $email)->first();
    }

    public static function getInvoiceStatus($status) {
        $message = "";
        switch ($status) {
            case 0: {
                $message = "Brouillon";
                break;
            }

            case 1: {
                $message = "Impayée";
                break;
            }
            
            case 2: {
                $message = "Payée / Payée partiellement";
                break;
            }

            default: {
                $message = "Statut inconnu";
                break;
            }
        }
        return $message;
    }
}
