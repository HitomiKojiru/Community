angular.module('communityApp', ['communityServices', 'communityControllers']).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[').endSymbol(']}');
});
