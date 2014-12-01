var detailsArr = new Array(),
    $detailsList = $('ul.details');

//Create array of all details in lists
$detailsList.find('li').each(function(){
    detailsArr.push($(this).html());
})

//Split the array at this point. The original array is altered.
var firstList = detailsArr.splice(0, Math.round(detailsArr.length / 2)),
    secondList = detailsArr,
    ListHTML = '';

function createHTML(list){
    ListHTML = '';
    for (var i = 0; i < list.length; i++) {
        ListHTML += '<li>' + list[i] + '</li>'
    };
}

//Generate HTML for first list
createHTML(firstList);
$detailsList.html(ListHTML);

//Generate HTML for second list
createHTML(secondList);
//Create new list after original one
$detailsList.after('<ul class="details"></ul>').next().html(ListHTML);