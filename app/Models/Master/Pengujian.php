<?php
namespace App\Models\Master;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pengujian extends Model{
    
    protected $table="tbl_penguji";
    protected $primaryKey="id_penguji";
    protected $hidden =[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $appends = [
        'view_url',
        'delete_url'
    ];
    public function getDeleteUrlAttribute() {
        return route( 'pengujian.delete', [ 'id' => $this->id_penguji ] );
    }
    public function getViewUrlAttribute() {
        return route( 'pengujian.view', [ 'id' => $this->id_penguji ] );
    }
}