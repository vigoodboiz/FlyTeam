<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function index(Request $request){
        $productId = 1;
        $userId = 1;

        $comments = DB::table('comments')
            ->select('comments.*', 'products.name as product_name', 'users.name as user_name')
            ->join('products', 'comments.product_id', '=', 'products.id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.product_id', $productId)
            ->where('comments.user_id', $userId)
            ->get();
        return view('comment.index',compact('comments'));
        // $comments = Comment::all();

        // $comments = Comment::where('column_name', 'value')->get();

        // return response()->json($comments);
    }
    public function add(CommentRequest $request){
        // Lấy id người dùng từ session
//        $userId = auth()->user()->id;
        $userId = 1;

        if ($request->isMethod('post')) {
            // Lấy id sản phẩm từ URL
//            $productId = $request->route('product_id');
            $productId = 1;
            $commentData = array_merge($request->except('_token'), [
                'user_id' => $userId,
                'product_id' => $productId,
            ]);

            $comment = Comment::create($commentData);

            if ($comment->id) {
                Session::flash('success', 'Add comment successfully');
                return redirect()->route('route_comment_index');
            }
        }
        $currentDateTime = Carbon::now();
        $currentDateTimeGMTPlus7 = $currentDateTime->setTimezone('Asia/Ho_Chi_Minh');
        return view('comment.add', ['currentDateTime' => $currentDateTimeGMTPlus7]);
    }
    public function update(CommentRequest $request, $id){
        $comment = DB::table('comments')->where('id','=',$id)->first();
        if ($request->isMethod('POST')){
            $result = Comment::where('id',$id)->update($request->except('_token'));
            if ($result){
                Session::flash('success','successfully update the comment');
                return redirect()->route('route_comment_index',['id'=>$id]);
            }
        }
        return view('comment.update',compact('comment'));
    }
    public function delete($id){
        Comment::where('id',$id)->delete();
        Session::flash('success','successfully deleted the comment whose id is '.$id);
        return redirect()->route('route_comment_index');
    }
}
