<?php 
    $this->Html->script('app', ['block' => 'scriptBottom']); 
    $this->Html->css('materialize/css/materialize.min.css', ['block' => 'scriptBottom']);


?>

<!-- page content and controls will be here -->
<div class="container" ng-app="VehiculeAngularJSCRUD" ng-controller="vehiculesCtrl">
    <div class="row">
        <div class="col s12">
            <h4>Vehicules</h4>
            <!-- used for searching the current list -->
            <input type="text" ng-model="search" class="form-control" placeholder="Search vehicule..." />

            <!-- table that shows vehicule record list -->
            <table class="hoverable bordered">

                <thead>
                    <tr>
                        <th class="text-align-center">ID</th>
                        <th class="width-30-pct">Make</th>
                        <th class="width-30-pct">Model</th>
                        <th class="width-30-pct">Plate</th>
                        <th class="text-align-center">Action</th>
                    </tr>
                </thead>

                <tbody ng-init="getAll()">
                    <tr ng-repeat="d in makes| filter:search">
                        <td class="text-align-center">{{ d.id}}</td>
                        <td>{{ d.make}}</td>
                        <td>{{ d.model}}</td>
                        <td>{{ d.plate}}</td>
                        <td>
                            <a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">edit</i>Edit</a>
                            <a ng-click="deleteVehicule(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">delete</i>Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- modal for for creating new vehicule -->
            <div id="modal-vehicule-form" class="modal">
                <div class="modal-content">
                    <h4 id="modal-vehicule-title">Create New Vehicule</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="make">Make</label>
                            <input ng-model="make" type="text" class="validate" id="form-make" placeholder="Type make here..." />
                            <label for="model">Model</label>
                            <input ng-model="model" type="text" class="validate" id="form-model" placeholder="Type model here..." />
                            <label for="plate">Plate</label>
                            <input ng-model="plate" type="text" class="validate" id="form-plate" placeholder="Type plate here..." />
                        </div>

                        <div class="input-field col s12">
                            <a id="btn-create-vehicule" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createVehicule()"><i class="material-icons left">add</i>Create</a>

                            <a id="btn-update-vehicule" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateVehicule()"><i class="material-icons left">edit</i>Save Changes</a>

                            <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
</div> <!-- end container -->
<!-- floating button for creating vehicule -->
<div class="fixed-action-btn" style="bottom:45px; right:24px;">
    <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-vehicule-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a>
</div>


