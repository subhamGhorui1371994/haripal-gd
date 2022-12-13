<?php

namespace App\Models;

use DB;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'image',
    ];

    protected $primaryKey = 'id';
    protected $table = 'galleries';

    public function __construct()
    {

    }

    static public function getGalleryData($galleryCategory = '')
    {
        $query = DB::table((new Gallery)->getTable());

        if($galleryCategory) {
            $query->Where('gallery_categories.name', $galleryCategory);
        }

        $query->leftJoin('gallery_categories', function ($join) {
            $join->on('gallery_categories.id', '=', 'galleries.category_id');
        })->select('galleries.*', 'gallery_categories.name as category_name')
            ->orderBy('gallery_categories.name', 'asc');

        return $query->get()->toArray();
    }

    static public function getListDataTable($order_column, $order_column_by, $limit, $offset, $search): array
    {
        $query = DB::table((new Gallery)->getTable());

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->Where('gallery_categories.name', 'like', '%' . $search . '%');
            });
        }

        $query->leftJoin('gallery_categories', function ($join) {
            $join->on('gallery_categories.id', '=', 'galleries.category_id');
        })->select('galleries.*', 'gallery_categories.name as category_name')
            ->orderBy($order_column, $order_column_by);

        $recordsTotal = $query->count();

        $data = $query->skip($offset)->take($limit)->get()->toArray();

        return ['recordsTotal' => $recordsTotal, 'data' => $data];
    }
}
