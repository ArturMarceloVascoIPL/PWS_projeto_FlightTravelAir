<?php
use ArmoredCore\WebObjects\Debug;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;

class AdminAppController extends BaseAuthController
{
    /** @var UserController */
    private $userController;
    /** @var AeroportoController */
    private $aeroportoController;

    public function __construct()
    {
        $this->userController = new UserController($this);
        $this->aeroportoController = new AeroportoController($this);
    }

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
        return $this->userController->gerirUsers();
    }

    public function createUser()
    {
        return $this->userController->createUser();
    }

    public function storeUser()
    {
        $this->userController->storeUser();
    }

    public function editUser($id)
    {
        return $this->userController->editUser($id);
    }

    public function updateUser($id)
    {
        $this->userController->updateUser($id);
    }

    public function destroyUser($id)
    {
        $this->userController->destroyUser($id);
    }

    // ** Aeroportos **

    public function gerirAeroportos()
    {
        return $this->aeroportoController->gerirAeroportos();
    }

    public function createAeroporto()
    {
        return $this->aeroportoController->createAeroporto();
    }

    public function storeAeroporto()
    {
        $this->aeroportoController->storeAeroporto();
    }

    public function editAeroporto($idaeroporto)
    {
        return $this->aeroportoController->editAeroporto($idaeroporto);
    }

    public function updateAeroporto($idaeroporto)
    {
        $this->aeroportoController->updateAeroporto($idaeroporto);
    }

    public function destroyAeroporto($idaeroporto)
    {
        $this->aeroportoController->destroyAeroporto($idaeroporto);
    }
}