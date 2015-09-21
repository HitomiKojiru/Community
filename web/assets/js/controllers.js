var communityControllers = angular.module('communityControllers', []);

communityControllers.controller('CampaignListCtrl', ['$scope', 'Campaign', function($scope, Campaign) {
    $scope.limit = 10;
    $scope.page = 1;

    getCampaigns();

    function getCampaigns() {
        offset = $scope.page * $scope.limit - $scope.limit;

        Campaign.get({ limit: $scope.limit, offset: offset }, function(data) {
            $scope.campaigns = data.campaigns;
            $scope.limit = data.limit;
            $scope.offset = data.offset;
        });
    }

    $scope.pageChanged = function() {
        getCampaigns();
    };

}]);
