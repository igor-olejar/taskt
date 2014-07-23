<?php

class ClientController extends BaseController {
    
    private $rules = array(
        'name'      =>  'required',
    );
    
    private $errors;
    
    public function showClients()
    {
        // get existing clients
        $clients = Client::orderBy('name')->get();
        
        // show them
        return View::make('clients', array('clients' => $clients))->withTitle('Clients');
    }
    
    public function editClient($id)
    {
        // get project data
        $client = Client::find($id);
        
        return View::make('edit_client', array(
            'client'        =>  $client,
        ))->withTitle('Edit Client ' . $client->name)->withRoute('client.update');
    }
    
    public function updateClient($id)
    {
        $client = Client::find($id);
        
        if (!$this->_saveClient($client)) {
            return Redirect::to('clients/' . $id . '/edit')->withInput()->withErrors($this->errors);
        };
        
        Session::flash('msg', 'Client updated successfully.');
        
        return Redirect::to('clients');
    }
    
    public function addClient()
    {
        
        return View::make('add_client', array('client' => new Client))->withTitle('Add New Client ')->withRoute('client.add');
    }
    
    public function saveClient()
    {
        $client = new Client;
        
        if (!$this->_saveClient($client)) {
            return Redirect::to('clients/add')->withInput()->withErrors($this->errors);
        }
        
        Session::flash('msg', 'Client added successfully');
        
        return Redirect::to('clients');
    }
    
    public function deleteClient($id)
    {
        $client = Client::find($id);
        $client->delete();
        
        Session::flash('msg', 'Client deleted successfully.');
        
        return Redirect::to('clients');
    }
    
    private function _saveClient($client)
    {
        $validation = Validator::make(Input::all(), $this->rules);
        
        if ($validation->fails()) {
            Session::flash('msg_errors', 'There were errors saving the client. Please review.');
            $this->errors = $validation;
            return false;
        }
        
        $client->name = Input::get('name');
        $client->description = Input::get('description');
        $client->website = Input::get('website');
        
        return $client->save();
    }
}