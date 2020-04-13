<?php
namespace App\Models\Master;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Kota extends Model{
    
    protected $table="tbl_kota";
    protected $primaryKey="id_kota";
    protected $hidden =[
        'view_url',
        'delete_url'
    ];
    protected $appends = [
        'view_url',
        'delete_url'
    ];
    public function getDeleteUrlAttribute() {
        return route( 'kota.delete', [ 'id' => $this->id_kota ] );
    }
    public function getViewUrlAttribute() {
        return route( 'kota.view', [ 'id' => $this->id_kota ] );
    }
}