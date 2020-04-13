<?php
namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Karyawan;
class KaryawanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        // return $request->all();
        $model=Karyawan::with(
            [
                'agama',
                'kota'
            
            ])->where('status',1);
        if(!empty($request->input('search'))){
            $model=$model->where('nama','like','%'.$request->input('search').'%');
        }
        if(!empty($request->input('martial'))){
            $model=$model->where('status_nikah','like','%'.$request->input('martial').'%');
        }
        if(!empty($request->input('gender'))){
            $model=$model->where('jenis_kelamin','like','%'.$request->input('gender').'%');
        }
        if(!empty($request->input('religion'))){
            $model=$model->where('id_agama','like',$request->input('religion'));
        }
        $model=$model->paginate(20);
        
        return response()->json($model);
    }
    public function show(Request $request,$id)
    {
        $model=Karyawan::with(
            [
                'agama',
                'kota'
            
            ])->where('id_karyawan',$id)->get();
        return response()->json($model);
    }
    public function destroy($id)
    {
        $model=Karyawan::find($id);
        $del=$model->delete();
        if($del){
            $data=array(
                'success'=>true,
                'message'=>'Data deleted'
            );
        }else{
            $data=array(
                'success'=>false,
                'message'=>'Data failed to deleted'
            );
        }
        return response()->json($data);
    }
}