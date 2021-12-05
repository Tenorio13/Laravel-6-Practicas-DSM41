<?php

namespace App\Http\Controllers;
/* Mandamos a llamar el modelo category */
use App\category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    } 
    use SoftDeletes;
    //
    /* vamos a obtener todas las categorua de nuestra base de datos ELOQUEN ORM
        Select * from categories  */
    public function index(){
        /* cambiamos la consulta all por patest paginate para la apginacion de nuestros registros */
        $categories = Category::latest()->paginate(20);
        //return $categories;
        return view('categories.index',[
        'categories'=> $categories
        ]);


    }
    /* insertar datos en la tabla category con el metodo create dentro de un array  */
    public function store(Request $request){
        Category::create([

            'name'=>$request->name
        ]);
        return redirect('/category')->with('mesage', 'la categoria se ha agregado exitosamente!');

    }

    /* Update Category */
        public function edit($id){
            $category = Category::findOrFaild($id);
            return view('/category');

        }

    /* eliminacion de */
    public function delete(Category $category){

        $category->delete();
        return redirect('/category')->with('mesageDelete', 'la categoria se ha eliminado exitosamente!');


    }
}
