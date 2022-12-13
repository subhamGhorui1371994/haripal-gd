<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MandatoryDisclosure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'description',
        'dled_md_format',
        'bed_md_format',
        'balance_sheet',
        'income_and_expenditure',
        'receipt_payment',
    ];

    protected $primaryKey = 'id';
    protected $table = 'mandatory_disclosures';

    public function __construct()
    {

    }
}
