<?php

namespace App\Models;

use DB;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Affiliations extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'logo',
        'link',
    ];

    protected $primaryKey = 'id';
    protected $table = 'affiliations';

    public function __construct()
    {

    }

    static public function getListDataTable($order_column, $order_column_by, $limit, $offset, $search): array
    {
        $query = DB::table((new Affiliations)->getTable());

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->Where('title', 'like', '%' . $search . '%');
                $query->orWhere('link', 'like', '%' . $search . '%');
            });
        }

        $query->select('*')->orderBy($order_column, $order_column_by);

        $recordsTotal = $query->count();

        $data = $query->skip($offset)->take($limit)->get()->toArray();

        return ['recordsTotal' => $recordsTotal, 'data' => $data];
    }
}
