@extends('Layout/app')
    @section('content')
    <div class="panel-body">
      @if (session('mesage'))
      <div class="alert alert-info alert-dismissible text-white" role="alert">
        <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>. {{ session('mesage') }}.</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if (session('mesageDelete'))
      <div class="alert alert-danger alert-dismissible text-white" role="alert">
        <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>. {{ session('mesageDelete') }}.</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Lista De Categorias</h6>
                  <div class="float-end">  
                    {{-- Button del modal --}}                
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus-circle"></i>
                      </button>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
    <div class="container">
            <!-- Modal ADD  STAR-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">  
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingresa  Una Categoria  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label=""></button>
        </div>
        <div class="modal-body">
          <div class="container">
          <div class="row">
            <form action="{{ route('category.store') }}" method="POST">
              {{-- generar el token para el envio de dato csrf --}}
              {{ csrf_field() }} 
                <label class= "col" for="">Nombre Categoria:</label>
                <input class="col from-control" type="text" name="name" placeholder="Deportes">
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
      </div>
    </div>
  </div>
              <!-- Modal ADD  END  -->
          
      <div class="row">
        <table class="table align-items-center mb-0">    
            <thead>
                  <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Clave</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nombre</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opciones</th>
                  </tr>  
              </thead>
              <tbody>
                  @foreach($categories as $category)
                  <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->name}}</td>
                      <td>
                        <button type='button' class="btn btn-sm btn-primary"><i class="far fa-eye"></i></button>
                        <a type="button" href="{{route('category.edit',$category->id) }}" class="btn btn-sm  btn-success" 
                          data-bs-toggle="modal" data-bs-target="#modalUpdate"><i class="fas fa-pen-square"></i></a>
                        <form action="{{ route('category.destroy', $category) }}" method="POST">
                          @method('DELETE')
                          @csrf
                        <button type='submit' class="btn btn-sm btn-danger"                  
                        onClick="return confirm('estas seguro  a eliminar el registro?')">
                        <i class="far fa-trash-alt"></i>
                      </button>           
                    </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>

          </table>
          {{-- renderear  el metodo paginate --}}
          {{$categories->links()}}         <!-- Modal edit  STAR-->
          <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">  
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label=""></button>
                </div>
                <div class="modal-body">
                  <div class="container">
                  <div class="row">
                    <form action="{{ route('category.store') }}" method="POST">
                      {{-- generar el token para el envio de dato csrf --}}
                      {{ csrf_field() }} 
                        <label class= "col" for="">Nombre Categoria:</label>
                        <input class="col from-control" type="text" name="name" placeholder="Deportes" value={{$category->name}}>
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
              </div>
            </div>
          </div>
                      <!-- Modal edit  END  -->
      </div>
  </div> 

    @endsection