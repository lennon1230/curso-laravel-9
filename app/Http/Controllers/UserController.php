<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;   
    }
    //
    public function index(Request $request)
    {   
        //pegando a pesquisa do campo Pesquisa no index
        //$search = $request->search;
        //pegando a lista de usuários do BD
        //$users = User::get();

        //Pegando a pesquisa do campo Pesquisa no index
        //getUsers é o método criado em app/Http/Models/User.php
        //search: é parâmetro nomeado, recurso do PHP 8
        //$request->get() pega a pesquisa no form do index.blade.php
        $users = $this->model->getUsers(search: $request->
                                    get('search', ''));

        //Faz a mesma coisa de cima, com a verificação de valor NULL
        //$users = $this->model->getUsers(search: $request->search ?? '');
        
        //users.index ou users/index são a mesma coisa. Indicam o caminho da View
        return view('users.index', compact('users')); 
    }

    public function show($id)
    {
        //$user = User::where('id', $id)->first();
        if(!$user = $this->model->find($id)){
            //return redirect()->back();
            return redirect()->route('users.index');
        }
        //dd($user);

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $this->model->create($data);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        //$user = User::where('id', $id)->first();
        if(!$user = $this->model->find($id)){
            //return redirect()->back();
            return redirect()->route('users.index');
        }
        //dd($user);

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        //$user = User::where('id', $id)->first();
        if(!$user = $this->model->find($id)){
            //return redirect()->back();
            return redirect()->route('users.index');
        }
        
        $data = $request->only('name', 'email');
        if($request->password)
            //Adiciona o campo PASSWORD e insere o dado da senha, se inserida.
            $data['password'] = bcrypt($request->password);
        
        //Faz a atualização dos dados do usuário
        $user->update($data);

        //Redireciona para a view de listagem de usuários
        return redirect()->route('users.index');

    }

    public function delete($id)
    {
        //$user = User::where('id', $id)->first();
        if(!$user = $this->model->find($id)){
            //return redirect()->back();
            return redirect()->route('users.index');
        }
        
        $user->delete();

        return redirect()->route('users.index');
    }

}
