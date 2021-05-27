<?php
use ArmoredCore\WebObjects\Debug;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\View; 
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class AviaoController extends BaseAuthController implements ResourceControllerInterface
{
    public function index()
    {
        $this->loginFilterByRole('gestorvoo');
        return View::make('gestorvoo.index');
    }

    public function show($id)
    {
        return $this->index();
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
        $aviao = new Aviao(Post::getAll());

        if($aviao->is_valid()){
            $aviao->save();
            Redirect::toRoute('gestorvooapp/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('gestorvooapp/create', ['aviao' => $aviao]);
        }
    }
    
    public function edit($idaviao)
    {
        $this->loginFilterByRole('gestorvoo');
        $aviao = Aviao::find([$idaviao]);

        if (is_null($aviao)) {
            //TODO redirect to standard error page
        } else {
            return View::make('gestorvoo.edit', ['aviao' => $aviao]);
        }
    }

    public function update($idaviao)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $aviao = Aviao::find([$idaviao]);
        $aviao->update_attributes(Post::getAll());

        if($aviao->is_valid()){
            $aviao->save();
            Redirect::toRoute('gestorvooapp/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('gestorvooapp/edit', ['aviao' => $aviao]);
        }
    }

    public function destroy($idaviao)
    {
        $aviao = Aviao::find([$idaviao]);
        $aviao->delete();
        Redirect::toRoute('gestorvooapp/index');
    }
}

?>