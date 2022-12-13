<?php

namespace App\Models;

use DB;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class ResourcePerson extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'resource_person_type',
        'course',
        'name',
        'email',
        'mobile',
        'photo',
        'experience',
        'designation',
        'qualification',
        'salary',
        'bed',
        'dled',
    ];

    protected $primaryKey = 'id';
    protected $table = 'resource_people';

    public function __construct()
    {

    }

    static public function getListDataTable($order_column, $order_column_by, $limit, $offset, $search): array
    {
        $query = DB::table((new ResourcePerson)->getTable());

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->Where('resource_person_type', 'like', '%' . $search . '%');
                $query->orWhere('name', 'like', '%' . $search . '%');
                $query->orWhere('email', 'like', '%' . $search . '%');
                $query->orWhere('mobile', 'like', '%' . $search . '%');
//                $query->orWhere('experience', 'like', '%' . $search . '%');
//                $query->orWhere('designation', 'like', '%' . $search . '%');
//                $query->orWhere('qualification', 'like', '%' . $search . '%');
                $query->orWhere('salary', 'like', '%' . $search . '%');
            });
        }

        $query->select('*')->orderBy($order_column, $order_column_by);

        $recordsTotal = $query->count();

        $data = $query->skip($offset)->take($limit)->get()->toArray();

        return ['recordsTotal' => $recordsTotal, 'data' => $data];
    }
}
