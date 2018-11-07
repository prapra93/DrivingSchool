// angular js codes will be here
var app = angular.module('VehiculeAngularJSCRUD', []);
app.controller('vehiculesCtrl', function ($scope, $http) {
    // more angular JS codes will be here
    $scope.showCreateForm = function () {
        // clear form
        $scope.clearForm();

        // change modal title
        $('#modal-vehicule-title').text("Create New ");

        // hide update vehicule button
        $('#btn-update-vehicule').hide();

        // show create vehicule button
        $('#btn-create-vehicule').show();

    }
    // clear variable / form values
    $scope.clearForm = function () {
        $scope.id = "";
        $scope.make = "";
        $scope.model = "";
        $scope.plate = "";
    }
    // create new vehicule 
    $scope.createVehicule = function () {

        // fields in key-value pairs
        $http.post('vehicules/addAng.json', {
            'make': $scope.make,
            'model': $scope.model,
            'plate': $scope.plate
        }
        ).success(function (data, status, headers, config) {
            //console.log(data.response.result);
            // tell the user new vehicule was created
            Materialize.toast(data.response.result, 4000);

            // close modal
            $('#modal-vehicule-form').modal('close');

            // clear modal content
            $scope.clearForm();

            // refresh the list
            $scope.getAll();
        });
    }
    // read vehicules
    $scope.getAll = function () {
        $http.get("vehicules/index.json").success(function (response) {
            $scope.makes = response.vehicules;

        });
    }
    // retrieve record to fill out the form
    $scope.readOne = function (id) {

        // change modal title
        $('#modal-vehicule-title').text("Edit Vehicule");

        // show udpate vehicule button
        $('#btn-update-vehicule').show();

        // show create vehicule button
        $('#btn-create-vehicule').hide();

        // post id of vehicule to be edited
        $http.post('vehicules/viewAng.json', {
            'id': id
        })
                .success(function (data, status, headers, config) {

                    // put the values in form
                    $scope.id = data.vehicule.id;
                    $scope.make = data.vehicule.make;
                    $scope.model = data.vehicule.model;
                    $scope.plate = data.vehicule.plate;
                    // show modal
                    $('#modal-vehicule-form').modal('open');
                })
                .error(function (data, status, headers, config) {
                    Materialize.toast('Unable to retrieve record.', 4000);
                });
    }
    // update vehicule record / save changes
    $scope.updateVehicule = function () {
        $http.post('vehicules/editAng.json', {
            'id': $scope.id,
            'make': $scope.make,
            'model': $scope.model,
            'plate': $scope.plate
        })
                .success(function (data, status, headers, config) {
                    // tell the user vehicule record was updated
                    console.log(data.response.result);
                    Materialize.toast(data.response.result, 4000);

                    // close modal
                    $('#modal-vehicule-form').modal('close');

                    // clear modal content
                    $scope.clearForm();

                    // refresh the vehicule list
                    $scope.getAll();
                });
    }
    // delete vehicule
    $scope.deleteVehicule = function (id) {

        // ask the user if he is sure to delete the record
        if (confirm("Are you sure?")) {
            // post the id of vehicule to be deleted
            $http.post('vehicules/deleteAng.json', {
                'id': id
            }).success(function (data, status, headers, config) {

                // tell the user vehicule was deleted
                Materialize.toast(data.response.result, 4000);

                // refresh the list
                $scope.getAll();
            });
        }
    }
});

// jquery codes will be here
$(document).ready(function () {
    // initialize modal
    $('.modal').modal();
});





