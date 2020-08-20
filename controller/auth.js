const db = require('../model/authModel.js');

exports.authCand = (req, res) => {
	let id = req.body.candID;
	let pass = req.body.passCand;

	db.authCandidato(id, pass, (data) => {
		if(typeof(data) == 'object'){
			res.send('you are in');
		}else{
			res.send('YOU SHALL NO PASS');
		}
	});
}

exports.authVoter = (req, res) => {
	let titulo = req.body.titulo;

	db.authEleitor(titulo, () => {
		res.send('you are in')
	});
}
