document.addEventListener("DOMContentLoaded", () => {
  const inputElement = byId('country');
  const searchButton = byId("lookup");
  const divElement = byId("result");
  //console.log(searchButton);
  searchButton.addEventListener('click', () => {
    //displayHeroesInDiv(divElement, inputElement.value);
    countrySearch(divElement, inputElement.value);
  });
})





function countrySearch (displayin, value) {
  // if(!value){
  //   displayin.innerHTML = "<h3>Search Parameter Was NOT Entered.</h3>";
  //   return;
  // }
  let url = `world.php?country=${encodeURIComponent(value)}`;
  console.log(url);
  fetch(url, () => {
    
  })
  .then(res => {
    if(res.ok){
      retVal = res.text();
      if(!retVal){
        displayin.innerHTML = "<h3>No Countries Matched the Search Paramater.</h3>";
        return;
      }
      return retVal;
    }
    else{
      throw new Error(`status: ${res.status}`);
    } 
  })
  .then(data => {
    console.log(data);
    displayin.innerHTML = data;
  })
  .catch(error => {
    console.error(error);
  })

}








function lazyQuery(objtoget){
  return document.querySelector(objtoget);
}
function byId(objtoget){
  return document.getElementById(objtoget);
}