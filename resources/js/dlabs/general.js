/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 5
Version: 5.3.2
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/
*/

var handleLogout = function () {
  $('.logout').on('click', () => {
    console.log("LOGOUT");
  })
};

var General = function () {
  "use strict";
  return {
    //main function
    init: function () {
      handleLogout();
    }
  };
}();

$(document).ready(function () {
  General.init();
});