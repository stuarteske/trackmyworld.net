<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 17/07/2014
 * Time: 18:43
 */

use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrganisationController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array(
            'except' => array(
                'activation',
            ),
        ));

        $this->beforeFilter('csrf', array('on' => 'post'));

        // Register the 404
        App::error(function(ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        });
    }

    public function view($organisation)
    {

        return View::make(
            'backend.organisation.view',
            array(
                'organisation' => 'something'
            )
        );
    }

    public function organisationList()
    {
        $user = User::find(Auth::id());
        $organisations = Organisation::all();

        return View::make(
            'backend.organisation.list',
            array(
                'user' => $user,
                'organisations' => $organisations
            )
        );
    }
}