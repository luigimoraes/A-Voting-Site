const db = require('../model/voteModel.js');

exports.vote = (req, res) => {
	db.vote(req.body.candID);
	res.send('congrats u voted');
}

exports.votePage = (req, res) => {
//	res.redirect(/*algum lugar*/);
}
