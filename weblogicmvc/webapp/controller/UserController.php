<?php
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Post;


class UserController extends BaseAuthController implements \ArmoredCore\Interfaces\ResourceControllerInterface
{

    public function show($id)
    {
        return $this->index();
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields

        $this->loginFilterByRole('admin');
        $user = User::find([$id]);
        $user->update_attributes(Post::getAll());

        if ($user->is_valid()) {
            $user->save();
            Redirect::toRoute('user/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('user/edit', ['user' => $user]);
        }
    }

    public function destroy($id)
    {
        $this->loginFilterByRole('admin');
        $user = User::find([$id]);
        $user->delete();
        Redirect::toRoute('user/index');
    }

    public function store()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields

        $this->loginFilterByRole('admin');
        $user = new User(Post::getAll());

        if ($user->is_valid()) {
            $user->save();
            Redirect::toRoute('user/index');
        } else {
            //redirect to form with data and errors
            \ArmoredCore\WebObjects\Redirect::flashToRoute('user/create', ['user' => $user]);
        }
    }

    public function edit($id)
    {

        $this->loginFilterByRole('admin');
        $user = User::find([$id]);

        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            return View::make('user.edit', ['user' => $user]);
        }
    }

    public function create()
    {
        $this->loginFilterByRole('admin');
        return View::make('user.create');
    }

    public function index()
    {
        $this->loginFilterByRole('admin');
        $users = User::all(array('conditions' => array('role != ?', 'passageiro')));
        return View::make('user.index', ['users' => $users]);
    }
}