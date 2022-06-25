<?php

namespace App\Http\Controllers;
use Image;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Articale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {

        //
        $articles = Articale::join( 'users', 'users.id', '=', 'articales.user_id' )->select( 'articales.*', 'users.name' )->orderBy( 'id', 'asc' )->get();
        return view( 'articale.index', [ 'articles' => $articles ] );

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return View( 'articale.create' );

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
        // dd( Auth::id() );
        $image = $request->file( 'image' );
        $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make( $image )->resize( 500, 300 )->save( 'blogImages/' . $image_name );
        $final = 'blogImages/' . $image_name;
        $date = Carbon::now();
        $articale = new Articale();
        $articale->title = $request->title;
        $articale->content = $request->content;
        $articale->user_id = Auth::id();
        $articale->pu_date = $date;
        $articale->image = $final;
        $articale->save();

        return redirect()->route( 'articales.index' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //

        $data = DB :: table( 'articales' )->find( $id );

        return view( 'articale.edit', [ 'data' => $data ] );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
        $image = $request->file( 'image' );
        $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make( $image )->resize( 500, 300 )->save( 'blogImages/' . $image_name );
        $final = 'blogImages/' . $image_name;
        $date = Carbon::now();

        $articale = Articale::find( $id );
        $articale->title = $request->title;
        $articale->content = $request->content;
        $articale->user_id = Auth::id();
        $articale->pu_date = $date;
        $articale->image = $final;
        $articale->save();

        return redirect()->route( 'articales.index' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        $articale = Articale::find( $id )->delete();
        return redirect()->route( 'articales.index' );

    }
}
