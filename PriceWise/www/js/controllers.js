angular.module('starter.controllers', ['ionic'])
.controller('TabsCtrl', function($scope, $timeout,$ionicLoading) {

  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //$scope.$on('$ionicView.enter', function(e) {
  //});
  $scope.cart = [];
  // Setup the loader
   $ionicLoading.show({
    templateUrl:'templates/intro.html',
    animation: 'fade-in',
    showBackdrop: false,
    maxWidth: 10,
    showDelay: 0
  });
   // Set a timeout to clear loader, however you would actually call the $ionicLoading.hide(); method whenever everything is ready or loaded.
  $timeout(function () {
    $ionicLoading.hide();
  }, 2000);

  $scope.getCartPrice = function () {
    var total = 0;
    $scope.cart.forEach(function (product) {
      total += product.price * product.quantity;
    });
    return total;
  };

}) 




.controller('DashCtrl', function($scope,$http,$timeout,$ionicPopup) {

$scope.provincelist = $http.get('http://localhost/ElectiveThesisProject/productprice/place').
    then(function(response) { 
      console.log(response);
      $scope.provinces = response.data;

    }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });

  $scope.provinceSelect = {};

  // An elaborate, custom popup
  var myPopup = $ionicPopup.show({
    template: '<select  name="provinceSelect" id="provinceSelect" ng-model="provinceSelect.ID"><option ng-repeat="province in provinces"  ng-model="selectedprovince" value="{{province.ID}}">{{ province.placeNAME }}</option></select>',
    title: 'Where are you from?',
    subTitle: 'Only for Region 10',
    scope: $scope,
    buttons: [
      {
        text: '<b>Save</b>',
        type: 'button-positive',
        onTap: function(e) {
          if (!$scope.provinceSelect.ID) {
            //don't allow the user to close unless he enters wifi password
            e.preventDefault();
            console.log('ayu');
          } else {
            return $scope.provinceSelect.ID;
            console.log('guba');
          }
        }
      }
    ]
  });
  
  myPopup.then(function(res) {
     $scope.uploaddata = $http.get('http://localhost/prisewise(web)/productprice/uploaddata/'+res).
    then(function(response) { 
      console.log(response);
      $scope.updata = response.data;

    }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });
     $scope.uploaddata = $http.get('http://localhost/prisewise(web)/productprice/placeid/'+res).
    then(function(response) { 
      console.log(response);
      $scope.places = response.data;

    }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });
    $scope.pricelist = $http.get('http://localhost/prisewise(web)/productprice/pricebyplace/'+res).
    then(function(response) { 
      console.log(response);
      $scope.list = response.data;

    }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });

  });

 $scope.addToCart = function (product) {
    var found = false;
    $scope.cart.forEach(function (item) {
      if (item.name === product.name) {
        item.quantity++;
        found = true;
      }
    });
    if (!found) {
      $scope.cart.push(angular.extend({quantity: 1}, product));
    }
  };


 
  
})

.controller('ChatsCtrl', function($scope, Chats) {
  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //
 
  $scope.purchased = function(product) {
    console.log($scope.cart);
    $scope.cart.splice($scope.cart.indexOf(product), 1);
    console.log($scope.cart);
  };

})

.controller('ChatDetailCtrl', function($scope, $stateParams, Chats) {
  $scope.chat = Chats.get($stateParams.chatId);
})





.controller('AccountCtrl', function($scope,$http,$ionicPopup) {


// // showpopup method code

// $scope.showPopup = function() {

//    $scope.data = {}

//    var myPopup = $ionicPopup.show({
//       template: ' Username<input type="text" ng-model="data.userName" required><br>Password  <input type="password" ng-model="data.userPassword" required> ',
//       title: 'Sign Up',
//       scope: $scope,
//       buttons: [{
//          text: 'Cancel'
//       }, {
//          text: '<b>Login</b>',
//          type: 'button-positive',
//          onTap: function(e) {
//             if (!$scope.data.userPassword && !$scope.data.userName ) {
//                //don't allow the user to close unless he enters wifi password
//                e.preventDefault();
//                console.log('error be like');
//             } 
//             else if (!$scope.data.userPassword) {
//                e.preventDefault();
//             }
//             else if (!$scope.data.userName) {
//                e.preventDefault();
//             }
//             else {
//                return $scope.data;
//             }
//          }
//       }, ]
//    });
//    myPopup.then(function(res) {
//       if (res) {
//          if (res.userPassword == res.confirmPassword) {
//             console.log('Password Is Ok');
//          } else {
//             console.log('Password not matched');
//          }
//       } else {
//          console.log('Enter password');
//       }
//    });
// };
  
        
})


.controller('RegisterCtrl', function($scope,$http,$ionicPopup) {


  
        
})
