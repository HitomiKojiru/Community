var communityServices = angular.module('communityServices', ['ngResource']);

communityServices.factory('Campaign', ['$resource',
    function($resource){
        return $resource('/api/v1/campaigns.json', {}, {
            query: {method:'GET', params:{}, isArray:false}
        });
    }]);
