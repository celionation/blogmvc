// USING GET
//_____________________________________
//If you want to $_GET['x'], you need to send the data in the querystring:
var url = '/your/url?x=hello';

fetch(url)
.then(function (response) {
    return response.text();
})
.then(function (body) {
    console.log(body);
});
// USING POST
//___________________________________________
//If you want to $_POST['x'], you need to send the data as FormData:

var url = '/your/url';
var formData = new FormData();
formData.append('x', 'hello');

fetch(url, { method: 'POST', body: formData })
.then(function (response) {
    return response.text();
})
.then(function (body) {
    console.log(body);
});