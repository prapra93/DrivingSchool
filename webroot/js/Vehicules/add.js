var app = angular.module('linkedlists', []);

app.controller('coursesController', function ($scope, $http) {
    var url = "http://localhost/DrivingSchool/courses/getCourses.json";

    $http.get(url).then(function (response) {
        $scope.courses = response.data;
    });
});



