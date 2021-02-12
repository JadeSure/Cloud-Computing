$(document).ready(function(){
var item, title, author, publisher, bookLink, bookImg;
var outputList = document.getElementById("list-output");
var bookUrl = "https://www.googleapis.com/books/v1/volumes?q="
// some of the results do not have a image
var placeHldr = '<img src="https://via.placeholder.com/150">';
var searchData;


// listener for search button
$("#search").click(function(){
  // empty html output
  outputList.innerHTML = "";
  document.body.style.backgroundImage="url('')";
  // get the value input from the user
  searchData = $("#search-box").val();

  // handling empty search input field
  if(searchData === ""|| searchData === null){
    displayError();
  }else {
    $.ajax({
      url: bookUrl + searchData,
      dataType: "json",
      success: function(response){
        console.log(response)
        if(response.totalItem===0){
          alert("there is no resuls, please change a name and research again")
        }else {
          $("#title").animate({'margin-top': '5px'}, 1000);
          $(".book-list").css("visibility", "visible");
           displayResults(response);
        }
      },
      error: function(){
        alert("got sth wrong");
      }
    });
  }
  $("#search-box").val("");

})



function displayResults(res){
  for(var i=0; i< res.items.length; i+=2){
    item = res.items[i];
    title1 = item.volumeInfo.title;
    author1 = item.volumeInfo.author;
    publisher1 = item.volumeInfo.publisher;
    bookLink1 = item.volumeInfo.previewLink;
    bookIsbn1 = item.volumeInfo.industryIdentifiers[0].identifier;
    bookImg1 = (item.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail : placeHldr;

    item2 = res.items[i+1];
    title2 = item2.volumeInfo.title;
    author2 = item2.volumeInfo.author;
    publisher2 = item2.volumeInfo.publisher;
    bookLink2 = item2.volumeInfo.previewLink;
    bookIsbn2 = item2.volumeInfo.industryIdentifiers[0].identifier;
    bookImg2 = (item2.volumeInfo.imageLinks) ? item2.volumeInfo.imageLinks.thumbnail : placeHldr;

    // output to output list
    outputList.innerHTML += '<div class="row mt-4">'+
    formatOutput(bookImg1, title1, author1, publisher1, bookLink1, bookIsbn1) +
    formatOutput(bookImg2, title2, author2, publisher2, bookLink2, bookIsbn2) +
    '</div>';
  }
}

function incrementIndex() {
    count += 1;
}


function formatOutput(bookImg, title, author, publisher, bookLink, bookIsbn){
  var viewerUrl = 'book.html?isbn=' + bookIsbn;
  var btn = document.querySelectorAll("button");
  // var i = 0;
  // var count = 0;
  //
  // for(i=0;i<btn.length;i++){
  //      btn[i].onclick = function(){
  //          count++;
  //          console.log(count);
  //      }
  //  }


  var htmlCard = `<div class = "col-lg-6">
                    <div class="card" style="">
                      <div class = "row no-gutters">
                        <div class= "col-md-4">
                          <img src="${bookImg}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">${title}</h5>
                        <p class="card-text">Author: ${author}</p>
                        <p class="card-text">Publisher: ${publisher}</p>
                        <a target="_blank" href="${viewerUrl}" class="btn btn-secondary">Read Book</a>
                        <input type="button" id="button1" value="Like it" onclick="addref()"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>`
  return htmlCard;
}
// handling error displaying empty search box
function displayError(){
  alert("search should not be empty");
}

})


var ref =0;
function addref()
{
ref++;
if (ref>1){
ref=1;
}
alert("you liked this book "+ref+" times");
}
