<?php
use ArmoredCore\WebObjects\Debug;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\View; 
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class EscalaController extends BaseAuthController implements ResourceControllerInterface
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

        if($escala->is_valid()){
            $escala->save();
            Redirect::toRoute('gestorvooapp/gerirusers');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('gestorvooapp/create', ['escala' => $escala]);
        }
    }

    public function show($id)
    {
        return $this->index();
    }

    public function edit($idescala)
    {
        $this->loginFilterByRole('gestorvoo');
        $escala = Escala::find([$idescala]);

        if (is_null($escala)) {
            //TODO redirect to standard error page
        } else {
            return View::make('gestorvoo.edit', ['escala' => $escala]);
        }
    }

    public function update($idescala)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $escala = Escala::find([$idescala]);
        $escala->update_attributes(Post::getAll());

        if($escala->is_valid()){
            $escala->save();
            Redirect::toRoute('gestorvooapp/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('gestorvooapp/edit', ['escala' => $escala]);
        }
    }

    public function destroy($idescala)
    {
        $escala = Escala::find([$idescala]);
        $escala->delete();
        Redirect::toRoute('gestorvooapp/index');
    }
}

?>