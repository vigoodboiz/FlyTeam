<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class ShopDetailsController extends Controller
{


    public function index($id_pro)
    {
        if ($id_pro) {

            $product_detail = Products::where('id', $id_pro)->get();
            Products::where('id',$id_pro)->increment('view_count');

            // $image = Gallery::where('product_id' , $id_pro)->get();
            // $imagePro = $image->pluck('image_path')->toArray();
            // product same
            $id_cate = Products::where('id', $id_pro)->value('id_category');
            $product_same = Products::where('id_category', $id_cate)->where('id', '<>', $id_pro)->paginate(9);

            $currentDateTime = Carbon::now();
            $currentDateTimeGMTPlus7 = $currentDateTime->setTimezone('Asia/Ho_Chi_Minh');
            $comments = DB::table('comments')
                ->select('comments.*', 'products.name as product_name', 'users.name as user_name')
                ->join('products', 'comments.product_id', '=', 'products.id')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->where('comments.product_id', $id_pro)
                ->get();
        }
        return view('page.product-details',['currentDateTime' => $currentDateTimeGMTPlus7], compact('product_detail', 'product_same', 'comments'));
    }

    public function newComment(CommentRequest $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'Bạn phải đăng nhập để bình luận.');
        }

        Comment::create([
            'product_id' => $request->product_id,
            'user_id' => $user->id,
            'name' => $user->name,
            'content' => $request->input('content'),
            'date' => $request->input('date')
        ]);

        return redirect()->back()->with('success', 'Bình luận đã được tạo thành công.');
    }
    public function delete($id){
        Comment::where('id',$id)->delete();
        return back();
    }
}
