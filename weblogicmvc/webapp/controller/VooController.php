<?php
use ArmoredCore\WebObjects\Debug;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\View; 
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class VooController extends BaseAuthController implements ResourceControllerInterface
{
    public function index()
    {
        $this->loginFilterByRole('gestorvoo');
        return View::make('gestorvoo.index');
    }

    public function create()
    {
        $this->loginFilterByRole('gestorvoo');
        return View::make('gestorvoo.create');
    }

    public function store()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $user = new User(Post::getAll());

        if($voo->is_valid()){
            $voo->save();
            Redirect::toRoute('gestorvooapp/gerirusers');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('gestorvooapp/create', ['voo' => $voo]);
        }
    }

    public function show($id)
    {
        return $this->index();
    }

    public function edit($idvoo)
    {
        $this->loginFilterByRole('gestorvoo');
        $voo = voo::find([$idvoo]);

        if (is_null($voo)) {
            //TODO redirect to standard error page
        } else {
            return View::make('gestorvoo.edit', ['voo' => $voo]);
        }
    }

    public function update($idvoo)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $voo = Voo::find([$idvoo]);
        $voo->update_attributes(Post::getAll());

        if($voo->is_valid()){
            $voo->save();
            Redirect::toRoute('gestorvooapp/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('gestorvooapp/edit', ['voo' => $voo]);
        }
    }

    public function destroy($id)
    {
        $voo = Voo::find([$id]);
        $voo->delete();
        Redirect::toRoute('gestorvooapp/index');
    }
}

?>