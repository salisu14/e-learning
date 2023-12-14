<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    /**
     * Get the instructors for the user.
     */
    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }

    // Custom method to generate staff Number
    protected static function generateStaffNumber()
    {
        $prefix = 'SS/A/';
        $year = date('y');

        // Get the current serial number
        $lastSerialNo = DB::table('instructors')->max('id') ?? 0;
        $serialNo = $lastSerialNo + 1;

        // Ensure the serial number is 4 digits
        $formattedSerialNo = str_pad($serialNo, 4, '0', STR_PAD_LEFT);

        // Format the staff Number
        return $prefix . $year . '/' . $formattedSerialNo;
    }

    // Custom method to generate staff Number
    protected static function generateStudentNumber()
    {
        $prefix = 'FCP/CSC/';
        $year = date('y');

        // Get the current id number
        $lastSerialNo = DB::table('students')->max('id') ?? 0;
        $serialNo = $lastSerialNo + 1;

        // Ensure the serial number is 4 digits
        $formattedSerialNo = str_pad($serialNo, 4, '0', STR_PAD_LEFT);

        // Format the staff Number
        return $prefix . $year . '/' . $formattedSerialNo;
    }
}
