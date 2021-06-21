<?php

use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class AeroportoController extends BaseAuthController implements ResourceControllerInterface
{
    public function index()
    {
        $this->loginFilterByRole('admin');
        $aeroportos = Aeroporto::all();
        return View::make('aeroporto.index', ['aeroportos' => $aeroportos]);
    }

    public function show($id)
    {
        $this->loginFilterByRole('admin');
        return $this->index();
    }

    public function create()
    {
        $this->loginFilterByRole('admin');
        return View::make('aeroporto.create');
    }

    public function store()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields

        $this->loginFilterByRole('admin');
        $aeroporto = new Aeroporto(Post::getAll());

        if ($aeroporto->is_valid()) {
            $aeroporto->save();
            Redirect::toRoute('aeroporto/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('aeroporto/create', ['aeroporto' => $aeroporto]);
        }
    }

    public function edit($idaeroporto)
    {

        $this->loginFilterByRole('admin');
        $aeroporto = Aeroporto::find([$idaeroporto]);

        if (is_null($aeroporto)) {
            //TODO redirect to standard error page
        } else {
            return View::make('aeroporto.edit', ['aeroporto' => $aeroporto]);
        }
    }


    public function update($idaeroporto)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields

        $this->loginFilterByRole('admin');
        $aeroporto = Aeroporto::find([$idaeroporto]);
        $aeroporto->update_attributes(Post::getAll());

        if ($aeroporto->is_valid()) {
            $aeroporto->save();
            Redirect::toRoute('aeroporto/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('aeroporto/index', ['aeroporto' => $aeroporto]);
        }
    }


    public function destroy($idaeroporto)
    {
        $this->loginFilterByRole('admin');
        $aeroporto = Aeroporto::find([$idaeroporto]);
        $aeroporto->delete();
        Redirect::toRoute('aeroporto/index');
    }
}