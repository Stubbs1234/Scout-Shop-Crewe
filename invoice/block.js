window.onload = function() {
    var blockArray = new Array;

Parse.initialize("5uHe6i4aZsLeX0XScouI6lHiPQ2nMeWkzieKMgj7", "wZH4mQq7uK1HpmgWI5lGCXTwDwrvJ8syTC01UGjN");
Parse.serverURL = 'https://parseapi.back4app.com';   
var block = Parse.Object.extend("blockAccounts");
var blockQuery = new Parse.Query(block);
blockQuery.equalTo("block",true);
blockQuery.find({
  success: function(results) {
    blockArray.get("group");
  },
  error: function(error) {
    alert("Error: " + error.code + " " + error.message);
  }
}); }