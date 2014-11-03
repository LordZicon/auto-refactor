function paginate() {
    $("div.holder").jPages({
      containerID: "resultaat_listing",
         perPage: 6
    }); 
}

paginate();