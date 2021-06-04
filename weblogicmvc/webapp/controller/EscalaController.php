<?php

use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class EscalaController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('gestorvoo');

        $escalas = Escala::all();
        return View::make('escala.index', ['escalas' => $escalas]);
    }

    public function show($id)
    {
        $this->loginFilterByRole('gestorvoo');

        return $this->index();
    }

    public function create()
    {
        $this->loginFilterByRole('gestorvoo');

        $aeroportos = Aeroporto::all();
        return View::make('escala.create', ['aeroportos' => $aeroportos]);
    }

    public function store()
    {
        $this->loginFilterByRole('gestorvoo');

        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $escala = new Escala(Post::getAll());
        if ($escala->is_valid()) {
            $escala->save();
            Redirect::toRoute('escala/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('escala/create', ['escala' => $escala]);
        }
    }

    public function edit($idescala)
    {
        $this->loginFilterByRole('gestorvoo');

        $escala = Escala::find([$idescala]);
        if (is_null($escala)) {
            //TODO redirect to standard error page
        } else {
            return View::make('escala.edit', ['escala' => $escala]);
        }
    }

    public function update($idescala)
    {
        $this->loginFilterByRole('gestorvoo');

        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $escala = Escala::find([$idescala]);
        $escala->update_attributes(Post::getAll());

        if ($escala->is_valid()) {
            $escala->save();
            Redirect::toRoute('escala/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('escala/edit', ['escala' => $escala]);
        }
    }

    public function destroy($idescala)
    {
        $this->loginFilterByRole('gestorvoo');

        $escala = Escala::find([$idescala]);
        $escala->delete();
        Redirect::toRoute('escala/index');
    }
}