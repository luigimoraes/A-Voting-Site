const passport = require('passport');
const localStrategy = require('passport-local').Strategy;
const db = require('../model/authModel.js');

exports.authCand = (req, res) => {
	/*passport.use(new localStrategy({
			usernameField: req.body.name;
			passwordField: req.body.pass;
		},
		function(name, pass, done){
			User.findOne({name: name}, (err, user) => {
				if(!user){
					return done(null, false);
		  		}else if(!user.validPassword(pass)){
					return done(null, false);
				}

				return done(null, user);
			});
		}
	));


	let id = req.body.candID;
	let pass = req.body.passCand;

	db.authCandidato(id, pass, (data) => {
		if(typeof(data) == 'object'){
			res.send('you are in');
		}else{
			res.send('YOU SHALL NO PASS');
		}
	});*/
	res.send('authentication');
}

exports.authVoter = (req, res) => {
	let titulo = req.body.titulo;

	db.authEleitor(titulo, () => {
		res.send('you are in')
	});
}

