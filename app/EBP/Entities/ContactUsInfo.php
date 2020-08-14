<?php

namespace App\EBP\Entities;

use App\EBP\Constants\DBTable;
use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class ContactUsInfo extends Model
{
    use SyncsWithFirebase;

    protected $table = DBTable::CONTACT_US_INFO;

    protected $fillable = [
        'title',
        'address',
        'phone1',
        'phone2',
        'fax',
        'website',
        'email',
        'facebook',
        'twitter',
        'google_plus',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function histories()
    {
        return $this->morphMany(History::class, 'history');
    }
}
