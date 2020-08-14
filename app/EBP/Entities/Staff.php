<?php

namespace App\EBP\Entities;

use App\EBP\Constants\DBTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mpociot\Firebase\SyncsWithFirebase;

class Staff extends Model
{
    use SoftDeletes;
    use SyncsWithFirebase;

    /**
     * Specifies the custom table name.
     *
     * @var string
     */
    protected $table = DBTable::STAFF;

    protected $fillable = [
        'name',
        'order',
        'designation',
        'address',
        'email',
        'personal_phone',
        'office_phone',
        'appointment_date',
        'image',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function histories()
    {
        return $this->morphMany(History::class, 'history');
    }

    /**
     * Returns N/A if null.
     *
     * @param $email
     * @return string
     */
    public function getEmailAttribute($email)
    {
        return $email ?? 'N/A';
    }

    /**
     * Returns N/A if null.
     *
     * @param $email
     * @return string
     */
    public function getDesignationAttribute($designation)
    {
        return $designation ?? 'N/A';
    }

    /**
     * Returns N/A if null.
     *
     * @param $email
     * @return string
     */
    public function getPersonalPhoneAttribute($phone)
    {
        return $phone ?? 'N/A';
    }
}
