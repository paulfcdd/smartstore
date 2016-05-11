'use strict';

angular

    .module('cpanel', [
        'ngRoute'
    ])

    .config(['$routeProvider', function ($routeProvider) {

        $routeProvider.when('cpanel/:categoriy', {
                templateUrl: 'src/StoreBundle/Resources/views/Store/test.html',
                controller: 'AppCtrl'
        });

        //$routeProvider.when('/', {
        //    templateUrl: 'src/tpl/login.tpl.html',
        //    controller: 'AppCtrl'
        //}).when('/recovery', {
        //    templateUrl: 'src/tpl/recovery.tpl.html',
        //    controller: 'AppCtrl'
        //}).when('/:category', {
        //    templateUrl: 'src/tpl/category.tpl.html',
        //    controller: 'CategoryCtrl'
        //}).when('/:category/:subcategory', {
        //    templateUrl: 'src/tpl/subcategory.tpl.html',
        //    controller: 'SubcatCtrl'
        //}).when('/:category/:subcategory/:id', {
        //    templateUrl: 'src/tpl/singleProject.tpl.html',
        //    controller: 'singleProject'
        //}).when('/:category/:subcategory/:id/:detail', {
        //    templateUrl: 'src/tpl/baustelle/detail.tpl.html',
        //    controller: 'baustelleDet'
        //});

    }])

    .run(function run() {

    })


    .controller('AppCtrl', function AppCtrl($scope) {

    });