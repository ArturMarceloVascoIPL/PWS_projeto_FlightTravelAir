<?php
use ArmoredCore\WebObjects\Debug;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;

class AdminAppController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('admin');
        $users = User::all(array('conditions' => array('role != ?','passageiro')));
        $aeroportos = Aeroporto::all();
        return View::make('admin.index', ['users' => $users, 'aeroportos' => $aeroportos]);
    }

    // ** Users **

    public function gerirUsers()
    {
        $this->loginFilterByRole('admin');
        //return View::make('admin.gerirusers');
        $users = User::all(array('conditions' => array('role != ?','passageiro')));
        return View::make('admin.gerirusers', ['users' => $users]);
    }

    public function createUser()
    {
        $this->loginFilterByRole('admin');
        return View::make('admin.createuser');
    }

    public function storeUser()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $user = new User(Post::getAll());

        if($user->is_valid()){
            $user->save();
            Redirect::toRoute('adminapp/gerirusers');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('adminapp/createuser', ['user' => $user]);
        }
    }

    public function editUser($id)
    {
        $this->loginFilterByRole('admin');
        $user = User::find([$id]);

        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            return View::make('admin.edituser', ['user' => $user]);
        }
    }

    public function updateUser($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $user = User::find([$id]);
        $user->update_attributes(Post::getAll());

        if($user->is_valid()){
            $user->save();
            Redirect::toRoute('adminapp/gerirusers');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('adminapp/edituser', ['users' => $user]);
        }
    }

    public function destroyUser($id)
    {
        $user = User::find([$id]);
        $user->delete();
        Redirect::toRoute('adminapp/gerirusers');
    }

    // ** Aeroportos **

    public function gerirAeroportos()
    {
        $this->loginFilterByRole('admin');
        $aeroportos = Aeroporto::all();
        return View::make('admin.geriraeroportos', ['aeroportos' => $aeroportos]);
    }

    public function createAeroporto()
    {
        $this->loginFilterByRole('admin');
        return View::make('admin.createaeroporto');
    }

    public function storeAeroporto()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $aeroporto = new Aeroporto(Post::getAll());

        if($aeroporto->is_valid()){
            $aeroporto->save();
            Redirect::toRoute('adminapp/geriraeroportos');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('adminapp/createaeroporto', ['aeroporto' => $aeroporto]);
        }
    }

    public function editAeroporto($idaeroporto)
    {
        $this->loginFilterByRole('admin');
        $aeroporto = Aeroporto::find([$idaeroporto]);

        if (is_null($aeroporto)) {
            //TODO redirect to standard error page
        } else {
            return View::make('admin.editaeroporto', ['aeroporto' => $aeroporto]);
        }
    }

    public function updateAeroporto($idaeroporto)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $aeroporto = Aeroporto::find([$idaeroporto]);
        $aeroporto->update_attributes(Post::getAll());

        if($aeroporto->is_valid()){
            $aeroporto->save();
            Redirect::toRoute('adminapp/geriraeroportos');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('adminapp/editaeroportos', ['aeroporto' => $aeroporto]);
        }
    }

    public function destroyAeroporto($idaeroporto)
    {
        $aeroporto = Aeroporto::find([$idaeroporto]);
        $aeroporto->delete();
        Redirect::toRoute('adminapp/geriraeroportos');
    }
}