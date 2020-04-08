var express = require("express");
var bodyParser = require("body-parser")
var parser = bodyParser.urlencoded({extended: false})
var app = express();
app.use(express.static("public"));
app.set("view engine", "ejs");
app.set("views", "./views");
app.listen(3000);

app.get("/", function(req, res){
    res.render("trangchu");
});

var array = ["PHP", "JavaScript", "Python"];

app.post('/getNotes', function(req, res){
    res.send(array)
})

app.post('/add', parser, function(req, res){
    var Note = req.body.note;
    array.push(Note)
    res.send(array)
})