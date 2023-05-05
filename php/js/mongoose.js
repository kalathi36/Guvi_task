const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const mongoose = require('mongoose');

// Set up body parser middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Set up Mongoose connection
mongoose.connect('mongodb://localhost:27017/test', { useNewUrlParser: true, useUnifiedTopology: true });

// Define the user schema
const userSchema = new mongoose.Schema({
    name: String,
    mobile: String,
    dob: Date,
    gender: String,
    address: String,
    country: String
});


// Define the user model
const User = mongoose.model('User', userSchema);

// Serve the HTML file
app.get('/', function(req, res) {
    res.sendFile(__dirname + './index.html');
});

// Handle the AJAX request
app.post('/saveUser', function(req, res) {
    var user = new User({
        name: req.body.name,
        mobile: req.body.mobile,
        dob: req.body.dob,
        gender: req.body.gender,
        address: req.body.address,
        country: req.body.country,
        email: req.body.email,
        password: req.body.password
    });
    

    user.save(function(err) {
        if (err) {
            res.status(500).send('Error saving user');
        } else {
            res.status(200).send('User saved successfully');
        }
    });
});

// Start the server
app.listen(3000, function() {
    console.log('Server listening on port 3000');
});

// AJAX code
jQuery(document).ready(function() {
    jQuery('#save-button').click(function() {
        var name = $('#name').val();
        var mobile = $('#mobile').val();
        var dob = $('#dob').val();
        var gender = $('#gender').val();
        var address = $('#address').val();
        var country = $('#country').val();
        var email = $('#email').val();
        var password = $('#password').val();

        jQuery.ajax({
            url: '/saveUser',
            method: 'POST',
            data: { name: name, mobile: mobile, dob: dob, gender: gender, address: address, country: country, email: email, password: password },
            success: function(response) {
                alert(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
