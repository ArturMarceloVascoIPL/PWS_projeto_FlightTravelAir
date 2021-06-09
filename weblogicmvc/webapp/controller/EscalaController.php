<?php

use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class EscalaController extends BaseAuthController
{
    public function index($idvoo)
    {
        $this->loginFilterByRole('gestorvoo');

        $escalas = Escala::all(array('conditions' => array('idvoo = ?', $idvoo)));
        return View::make('escala.index', ['escalas' => $escalas, 'idvoo' => $idvoo]);
    }

    public function show($id)
    {
        $this->loginFilterByRole('gestorvoo');

        return $this->index();
    }

    public function create($idvoo)
    {
        $this->loginFilterByRole('gestorvoo');

        $aeroportos = Aeroporto::all();
        return View::make('escala.create', ['aeroportos' => $aeroportos, 'idvoo' => $idvoo]);
    }

    public function store($idvoo)
    {
        $this->loginFilterByRole('gestorvoo');

        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $escala = new Escala(Post::getAll());

        if ($escala->is_valid()) {
            $escala->save();

            $escalas = Escala::all(array('conditions' => array('idvoo = ?', $idvoo)));
            Redirect::toRoute('escala/index', ['idvoo' => $idvoo]);
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('escala/create', ['escala' => $escala, 'idvoo' => $idvoo]);
        }
    }

    public function edit($idescala, $idvoo)
    {
        $this->loginFilterByRole('gestorvoo');

        $aeroportos = Aeroporto::all();
        $escala = Escala::find([$idescala]);
        if (is_null($escala)) {
            //TODO redirect to standard error page
        } else {
            return View::make('escala.edit', ['aeroportos' => $aeroportos, 'escala' => $escala, 'idvoo' => $idvoo]);
        }
    }

    public function update($idescala, $idvoo)
    {
        $this->loginFilterByRole('gestorvoo');

        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $escala = Escala::find([$idescala]);
        $escala->update_attributes(Post::getAll());

        if ($escala->is_valid()) {
            $escala->save();
            Redirect::toRoute('escala/index', ['idvoo' => $idvoo]);
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('escala/edit', ['escala' => $escala]);
        }
    }

    public function destroy($idescala, $idvoo)
    {
        $this->loginFilterByRole('gestorvoo');

        $escala = Escala::find([$idescala]);
        $escala->delete();
        Redirect::toRoute('escala/index', ['idvoo' => $idvoo]);
    }
}